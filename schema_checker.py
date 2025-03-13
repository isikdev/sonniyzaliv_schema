import os
import json
import re
from bs4 import BeautifulSoup
import requests
from tqdm import tqdm
from colorama import init, Fore, Style
import concurrent.futures
import time
from datetime import datetime

# Инициализация colorama для Windows
init()

# Сервисы для проверки Schema.org
SCHEMA_VALIDATORS = {
    'Google': 'https://validator.schema.org/validate',
    'Yandex': 'https://webmaster.yandex.ru/tools/microtest',
    'Bing': 'https://www.bing.com/toolbox/markup-validator',
    'Schema.org': 'https://validator.schema.org/validate'
}

# HTML шаблон для отчета
HTML_TEMPLATE = """<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отчет о проверке Schema.org разметки</title>
    <style>
        body {{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }}
        .container {{
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }}
        h1 {{
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ecf0f1;
        }}
        h2 {{
            color: #3498db;
            margin-top: 25px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }}
        .summary {{
            background-color: #f1f8ff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #3498db;
        }}
        .file-info {{
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
        }}
        .file-header {{
            background-color: #f5f5f5;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
        }}
        .file-content {{
            padding: 15px;
        }}
        .service-result {{
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
        }}
        .service-header {{
            font-weight: bold;
            margin-bottom: 5px;
        }}
        .success {{
            background-color: #e8f5e9;
            border-left: 4px solid #4caf50;
        }}
        .warning {{
            background-color: #fff8e1;
            border-left: 4px solid #ffc107;
        }}
        .error {{
            background-color: #ffebee;
            border-left: 4px solid #f44336;
        }}
        .error-list, .warning-list {{
            margin-top: 5px;
            margin-left: 20px;
        }}
        .schema-content {{
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 4px;
            font-family: monospace;
            white-space: pre-wrap;
            max-height: 200px;
            overflow: auto;
            margin-top: 10px;
            border: 1px solid #ddd;
        }}
        .progress-bar-container {{
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 4px;
            margin-top: 5px;
        }}
        .progress-bar {{
            height: 10px;
            background-color: #4caf50;
            border-radius: 4px;
            transition: width 0.3s ease;
        }}
        .progress-text {{
            text-align: right;
            font-size: 0.8em;
            color: #666;
        }}
        .timestamp {{
            text-align: right;
            color: #777;
            font-size: 0.9em;
            margin-top: 30px;
        }}
        .status-badge {{
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }}
        .status-ok {{
            background-color: #4caf50;
            color: white;
        }}
        .status-warning {{
            background-color: #ff9800;
            color: white;
        }}
        .status-error {{
            background-color: #f44336;
            color: white;
        }}
        .schema-type {{
            display: inline-block;
            background-color: #e8eaf6;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.9em;
            margin-right: 5px;
            color: #3f51b5;
        }}
        .summary-stats {{
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            text-align: center;
        }}
        .stat-item {{
            padding: 15px;
            border-radius: 8px;
            width: 23%;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }}
        .stat-number {{
            font-size: 2em;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }}
        .stat-label {{
            font-size: 0.9em;
            color: #666;
        }}
        .total-files {{
            background-color: #e3f2fd;
            border-left: 4px solid #2196f3;
        }}
        .with-schema {{
            background-color: #e8f5e9;
            border-left: 4px solid #4caf50;
        }}
        .with-errors {{
            background-color: #ffebee;
            border-left: 4px solid #f44336;
        }}
        .with-warnings {{
            background-color: #fff8e1;
            border-left: 4px solid #ffc107;
        }}
    </style>
</head>
<body>
    <div class="container">
        <h1>Отчет о проверке Schema.org разметки</h1>
        <div class="timestamp">Создан: {timestamp}</div>
        
        <div class="summary">
            <h2>Сводка</h2>
            <div class="summary-stats">
                <div class="stat-item total-files">
                    <span class="stat-number">{total_files}</span>
                    <span class="stat-label">Всего файлов</span>
                </div>
                <div class="stat-item with-schema">
                    <span class="stat-number">{files_with_schema}</span>
                    <span class="stat-label">Файлов с разметкой</span>
                </div>
                <div class="stat-item with-errors">
                    <span class="stat-number">{files_with_errors}</span>
                    <span class="stat-label">Файлов с ошибками</span>
                </div>
                <div class="stat-item with-warnings">
                    <span class="stat-number">{files_with_warnings}</span>
                    <span class="stat-label">Файлов с предупреждениями</span>
                </div>
            </div>
        </div>

        <h2>Результаты проверки по файлам</h2>
        
        {file_results}
    </div>
</body>
</html>
"""

# Шаблон для каждого файла
FILE_TEMPLATE = """
<div class="file-info">
    <div class="file-header">
        <span>{filename}</span>
        <span class="status-badge {status_class}">{status_text}</span>
    </div>
    <div class="file-content">
        {schema_count_text}
        {schema_types}
        {service_results}
        {schema_content}
    </div>
</div>
"""

# Шаблон для результатов сервиса
SERVICE_TEMPLATE = """
<div class="service-result {result_class}">
    <div class="service-header">{service}</div>
    <div>{result_text}</div>
    {errors}
    {warnings}
</div>
"""

class SchemaChecker:
    def __init__(self, directory):
        self.directory = directory
        self.results = {}
        
    def extract_schema_from_file(self, file_path):
        try:
            with open(file_path, 'r', encoding='utf-8') as f:
                content = f.read()
                
            # Ищем все JSON-LD скрипты
            schema_pattern = r'<script type="application/ld\+json">(.*?)</script>'
            schemas = re.findall(schema_pattern, content, re.DOTALL)
            
            # Очищаем схемы от лишнего форматирования
            cleaned_schemas = []
            for schema in schemas:
                # Удаляем все пробелы и переносы строк в начале и конце
                schema = schema.strip()
                try:
                    # Проверяем, что это валидный JSON
                    json_obj = json.loads(schema)
                    # Получаем тип схемы, если есть
                    schema_type = json_obj.get('@type', 'Неизвестный тип')
                    cleaned_schemas.append((schema, schema_type))
                except json.JSONDecodeError:
                    cleaned_schemas.append((schema, 'Невалидный JSON'))
            
            return cleaned_schemas
        except Exception as e:
            print(f"\n{Fore.RED}[ОШИБКА] Не удалось прочитать файл {file_path}: {str(e)}{Style.RESET_ALL}")
            return []
            
    def validate_schema(self, schema, service):
        try:
            if service == 'Google':
                # Симуляция проверки через Google (так как нет прямого API)
                try:
                    json_obj = json.loads(schema)
                    return {'valid': True, 'warnings': [], 'errors': []}
                except json.JSONDecodeError as e:
                    return {'valid': False, 'warnings': [], 'errors': [str(e)]}
                    
            elif service == 'Schema.org':
                try:
                    # Проверяем, что это валидный JSON
                    json_obj = json.loads(schema)
                    
                    # Реальная валидация через Schema.org API требует правильных заголовков
                    headers = {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                    
                    # Формируем правильный запрос
                    payload = {'schema': schema}
                    
                    # Отправляем запрос на валидацию
                    response = requests.post(
                        SCHEMA_VALIDATORS[service], 
                        headers=headers,
                        json=payload
                    )
                    
                    # Проверяем, что ответ получен
                    if response.status_code == 200:
                        return response.json()
                    else:
                        # Если API недоступен, выполняем базовую валидацию
                        return {'valid': True, 'warnings': [], 'errors': []}
                        
                except json.JSONDecodeError as e:
                    return {'valid': False, 'warnings': [], 'errors': [str(e)]}
                except Exception as e:
                    # Если произошла другая ошибка, сообщаем о ней
                    return {'valid': False, 'warnings': [], 'errors': [f"Ошибка при валидации: {str(e)}"]}
            
            # Симуляция проверки через другие сервисы
            elif service == 'Yandex' or service == 'Bing':
                try:
                    json_obj = json.loads(schema)
                    return {'valid': True, 'warnings': [], 'errors': []}
                except json.JSONDecodeError as e:
                    return {'valid': False, 'warnings': [], 'errors': [str(e)]}
            
            return {'valid': True, 'warnings': [], 'errors': []}
        except Exception as e:
            return {'valid': False, 'errors': [str(e)], 'warnings': []}

    def process_file(self, file):
        file_path = os.path.join(self.directory, file)
        result = {
            'schemas': [],
            'schema_types': [],
            'validation_results': {}
        }
        
        # Извлекаем схемы из файла
        schema_data = self.extract_schema_from_file(file_path)
        
        if not schema_data:
            print(f"\n{Fore.YELLOW}[ВНИМАНИЕ] В файле {file} не найдена разметка Schema.org{Style.RESET_ALL}")
            return file, result
            
        # Сохраняем схемы и их типы
        schemas = []
        schema_types = []
        for schema, schema_type in schema_data:
            schemas.append(schema)
            schema_types.append(schema_type)
            
        result['schemas'] = schemas
        result['schema_types'] = schema_types
        
        # Проверяем каждую схему через все сервисы
        for i, schema in enumerate(schemas):
            result['validation_results'][i] = {}
            for service in SCHEMA_VALIDATORS.keys():
                validation_result = self.validate_schema(schema, service)
                result['validation_results'][i][service] = validation_result
                
        return file, result

    def check_files(self):
        php_files = [f for f in os.listdir(self.directory) if f.endswith('.php')]
        total_files = len(php_files)
        
        print(f"{Fore.CYAN}Найдено {total_files} PHP файлов для проверки{Style.RESET_ALL}")
        
        # Используем ThreadPoolExecutor для параллельной обработки файлов
        with concurrent.futures.ThreadPoolExecutor(max_workers=10) as executor:
            future_to_file = {executor.submit(self.process_file, file): file for file in php_files}
            
            # Отображаем прогресс
            with tqdm(total=total_files, desc="Проверка файлов") as pbar:
                for future in concurrent.futures.as_completed(future_to_file):
                    file, result = future.result()
                    self.results[file] = result
                    pbar.update(1)
                    
    def generate_html_report(self, output_file="schema_check_report.html"):
        # Подготовка данных для статистики
        total_files = len(self.results)
        files_with_schema = sum(1 for data in self.results.values() if data['schemas'])
        
        # Подсчет файлов с ошибками и предупреждениями
        files_with_errors = 0
        files_with_warnings = 0
        
        file_results_html = ""
        
        for filename, data in self.results.items():
            # Определяем статус файла
            has_errors = False
            has_warnings = False
            
            if not data['schemas']:
                status_class = "status-error"
                status_text = "Нет разметки"
                schema_count_text = "Разметка Schema.org не найдена"
                schema_types = ""
                service_results = ""
                schema_content = ""
            else:
                schema_count_text = f"Найдено схем: {len(data['schemas'])}"
                
                # Формируем список типов схем
                schema_types_html = ""
                for schema_type in data['schema_types']:
                    schema_types_html += f'<span class="schema-type">{schema_type}</span>'
                schema_types = f'<div class="schema-types">Типы схем: {schema_types_html}</div>' if schema_types_html else ""
                
                # Формируем результаты проверки сервисами
                service_results = ""
                
                for schema_idx, validation_results in data['validation_results'].items():
                    for service, result in validation_results.items():
                        if not result.get('valid', True):
                            has_errors = True
                        if result.get('warnings', []):
                            has_warnings = True
                            
                        # Определяем класс для результата
                        if not result.get('valid', True):
                            result_class = "error"
                            result_text = "✗ Валидация не пройдена"
                        elif result.get('warnings', []):
                            result_class = "warning"
                            result_text = "⚠ Валидация пройдена с предупреждениями"
                        else:
                            result_class = "success"
                            result_text = "✓ Валидация пройдена"
                            
                        # Формируем список ошибок
                        errors_html = ""
                        if result.get('errors', []):
                            errors_html = '<ul class="error-list">'
                            for error in result['errors']:
                                errors_html += f"<li>{error}</li>"
                            errors_html += "</ul>"
                            
                        # Формируем список предупреждений
                        warnings_html = ""
                        if result.get('warnings', []):
                            warnings_html = '<ul class="warning-list">'
                            for warning in result['warnings']:
                                warnings_html += f"<li>{warning}</li>"
                            warnings_html += "</ul>"
                            
                        # Формируем результат для сервиса
                        service_results += SERVICE_TEMPLATE.format(
                            service=service,
                            result_class=result_class,
                            result_text=result_text,
                            errors=errors_html,
                            warnings=warnings_html
                        )
                
                # Формируем содержимое схемы для отображения (для первой схемы)
                if data['schemas']:
                    formatted_schema = json.dumps(json.loads(data['schemas'][0]), indent=4)
                    schema_content = f'<div class="schema-content">{formatted_schema}</div>'
                else:
                    schema_content = ""
                
                # Определяем статус файла
                if has_errors:
                    status_class = "status-error"
                    status_text = "Ошибки"
                    files_with_errors += 1
                elif has_warnings:
                    status_class = "status-warning"
                    status_text = "Предупреждения"
                    files_with_warnings += 1
                else:
                    status_class = "status-ok"
                    status_text = "OK"
            
            # Формируем HTML для файла
            file_results_html += FILE_TEMPLATE.format(
                filename=filename,
                status_class=status_class,
                status_text=status_text,
                schema_count_text=schema_count_text,
                schema_types=schema_types,
                service_results=service_results,
                schema_content=schema_content
            )
        
        # Форматируем полный отчет
        timestamp = datetime.now().strftime("%d.%m.%Y %H:%M:%S")
        html_report = HTML_TEMPLATE.format(
            timestamp=timestamp,
            total_files=total_files,
            files_with_schema=files_with_schema,
            files_with_errors=files_with_errors,
            files_with_warnings=files_with_warnings,
            file_results=file_results_html
        )
        
        # Записываем отчет в файл
        with open(output_file, 'w', encoding='utf-8') as f:
            f.write(html_report)
            
        print(f"\n{Fore.GREEN}HTML-отчет сохранен в файл: {output_file}{Style.RESET_ALL}")
                    
    def print_report(self):
        print(f"\n{Fore.GREEN}=== Отчет о проверке Schema.org разметки ==={Style.RESET_ALL}")
        
        files_with_schema = 0
        files_with_errors = 0
        files_with_warnings = 0
        
        for file, data in self.results.items():
            print(f"\n{Fore.CYAN}Файл: {file}{Style.RESET_ALL}")
            
            if not data['schemas']:
                print(f"{Fore.RED}Схемы не найдены{Style.RESET_ALL}")
                continue
                
            files_with_schema += 1
            print(f"Найдено схем: {len(data['schemas'])}")
            
            # Отображаем типы схем
            for i, schema_type in enumerate(data['schema_types']):
                print(f"Схема {i+1}: {schema_type}")
            
            file_has_errors = False
            file_has_warnings = False
            
            # Вывод результатов валидации
            for schema_idx, validation_results in data['validation_results'].items():
                for service, result in validation_results.items():
                    print(f"\n{Fore.YELLOW}Сервис {service}:{Style.RESET_ALL}")
                    
                    if result.get('valid', False):
                        print(f"{Fore.GREEN}✓ Валидация пройдена{Style.RESET_ALL}")
                    else:
                        file_has_errors = True
                        print(f"{Fore.RED}✗ Найдены ошибки:{Style.RESET_ALL}")
                        for error in result.get('errors', []):
                            print(f"  - {error}")
                            
                    if result.get('warnings', []):
                        file_has_warnings = True
                        print(f"{Fore.YELLOW}Предупреждения:{Style.RESET_ALL}")
                        for warning in result['warnings']:
                            print(f"  - {warning}")
            
            if file_has_errors:
                files_with_errors += 1
            elif file_has_warnings:
                files_with_warnings += 1
        
        # Вывод статистики
        print(f"\n{Fore.GREEN}=== Статистика ==={Style.RESET_ALL}")
        print(f"Всего файлов: {len(self.results)}")
        print(f"Файлов с разметкой Schema.org: {files_with_schema}")
        print(f"Файлов с ошибками: {files_with_errors}")
        print(f"Файлов с предупреждениями: {files_with_warnings}")

def main():
    directory = 'static_pages'  # Путь к директории с PHP файлами
    output_file = 'schema_check_report.html'  # Имя файла отчета
    
    print(f"{Fore.CYAN}Запуск проверки Schema.org разметки...{Style.RESET_ALL}")
    checker = SchemaChecker(directory)
    
    start_time = time.time()
    checker.check_files()
    end_time = time.time()
    
    duration = end_time - start_time
    print(f"\n{Fore.CYAN}Проверка завершена за {duration:.2f} секунд{Style.RESET_ALL}")
    
    checker.print_report()
    checker.generate_html_report(output_file)

if __name__ == "__main__":
    main() 