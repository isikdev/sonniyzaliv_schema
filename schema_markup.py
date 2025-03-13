#!/usr/bin/env python
# -*- coding: utf-8 -*-

import os
import re
import json
import requests
from bs4 import BeautifulSoup
import argparse
from urllib.parse import urljoin

# Папка с PHP-файлами
STATIC_PAGES_DIR = 'static_pages'

# Сервисы для проверки разметки schema.org
VALIDATORS = {
    'Google Rich Results Test': 'https://search.google.com/test/rich-results/result',
    'Schema.org Validator': 'https://validator.schema.org/',
    'Structured Data Testing Tool Alternative': 'https://jsonld.com/json-ld-validator/',
    'Yandex Validator': 'https://webmaster.yandex.ru/tools/microtest/'
}

def extract_php_variables(content):
    """Извлекает значения PHP переменных из файла"""
    variables = {}
    
    # Извлечение заголовка
    title_match = re.search(r'\$title\s*=\s*[\'"](.+?)[\'"]', content)
    if title_match:
        variables['title'] = title_match.group(1)
    
    # Извлечение описания
    descr_match = re.search(r'\$descr\s*=\s*[\'"](.+?)[\'"]', content)
    if descr_match:
        variables['description'] = descr_match.group(1)
    
    # Извлечение ключевых слов
    keywords_match = re.search(r'\$keywords\s*=\s*[\'"](.+?)[\'"]', content)
    if keywords_match:
        variables['keywords'] = keywords_match.group(1)
    
    return variables

def extract_canonical_url(content):
    """Извлекает канонический URL из файла"""
    canonical_match = re.search(r'<link\s+rel="canonical"\s+href="([^"]+)"', content)
    if canonical_match:
        return canonical_match.group(1)
    return None

def extract_images(content, base_url='https://sonniyzaliv.ru/'):
    """Извлекает URL изображений из файла"""
    images = []
    
    # Поиск всех тегов img
    img_tags = re.findall(r'<img\s+[^>]*src="([^"]+)"[^>]*>', content)
    for img in img_tags:
        if not img.startswith(('http://', 'https://')):
            img = urljoin(base_url, img)
        images.append(img)
    
    return images[:5]  # Ограничиваем количество изображений для разметки

def create_schema_markup(variables, canonical_url, images, file_name):
    """Создает разметку schema.org на основе извлеченных данных"""
    
    # Основная информация о странице
    markup = {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "url": canonical_url if canonical_url else f"https://sonniyzaliv.ru/{file_name}",
        "name": variables.get('title', ''),
        "description": variables.get('description', ''),
        "inLanguage": "ru-RU"
    }
    
    # Определяем тип страницы на основе имени файла и содержимого
    if 'index.php' in file_name:
        # Для главной страницы
        markup["@type"] = "WebSite"
        markup["potentialAction"] = {
            "@type": "SearchAction",
            "target": "https://sonniyzaliv.ru/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    elif any(x in file_name for x in ['dom', 'siniy-dom', 'zeleniy-dom', 'relaks', 'sonniy-zaliv']):
        # Для страниц домов/гостевых домов
        markup["@type"] = "Product"
        markup["offers"] = {
            "@type": "Offer",
            "priceCurrency": "RUB",
            "availability": "https://schema.org/InStock"
        }
        if images:
            markup["image"] = images
    
    # Добавляем информацию об организации
    markup["publisher"] = {
        "@type": "Organization",
        "name": "Сонный Залив",
        "logo": {
            "@type": "ImageObject",
            "url": "https://sonniyzaliv.ru/images/logo.png"
        },
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Нукутталахти",
            "postalCode": "186790",
            "streetAddress": "Центральная, 52"
        },
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+7 981 187-80-02",
                "contactType": "Александр"
            },
            {
                "@type": "ContactPoint",
                "telephone": "+7 981 750-44-89",
                "contactType": "Юлия"
            }
        ]
    }
    
    return markup

def add_schema_to_file(file_path, dry_run=False):
    """Добавляет разметку schema.org в PHP-файл"""
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Извлекаем информацию из файла
    variables = extract_php_variables(content)
    canonical_url = extract_canonical_url(content)
    images = extract_images(content)
    file_name = os.path.basename(file_path)
    
    # Создаем разметку schema.org
    schema_markup = create_schema_markup(variables, canonical_url, images, file_name)
    
    # Преобразуем разметку в JSON-LD
    json_ld = json.dumps(schema_markup, ensure_ascii=False, indent=4)
    script_tag = f'<script type="application/ld+json">{json_ld}</script>'
    
    # Проверяем, есть ли уже разметка schema.org в файле
    existing_schema = re.search(r'<script\s+type="application/ld\+json">.*?</script>', content, re.DOTALL)
    
    if existing_schema:
        # Заменяем существующую разметку
        new_content = content.replace(existing_schema.group(0), script_tag)
    else:
        # Добавляем новую разметку перед закрывающим тегом body
        new_content = re.sub(r'</body>', f'{script_tag}\n</body>', content)
    
    if dry_run:
        print(f"[Dry run] Добавлена/обновлена разметка schema.org в файле {file_path}")
        print(f"Разметка: {json_ld}")
    else:
        # Сохраняем обновленный файл
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Добавлена/обновлена разметка schema.org в файле {file_path}")
    
    return schema_markup

def validate_schema(schema_markup, url=None):
    """Проверяет разметку schema.org с помощью онлайн-сервисов"""
    print("\nДоступные сервисы для проверки разметки schema.org:")
    for i, (name, url) in enumerate(VALIDATORS.items(), 1):
        print(f"{i}. {name}: {url}")
    
    print("\nДля проверки разметки:")
    print("1. Скопируйте JSON-LD разметку:")
    print(json.dumps(schema_markup, ensure_ascii=False, indent=4))
    print("\n2. Вставьте её в один из указанных выше сервисов")

def process_all_files(dry_run=False, validate=False):
    """Обрабатывает все PHP-файлы в папке static_pages"""
    processed = 0
    skipped = 0
    
    for file_name in os.listdir(STATIC_PAGES_DIR):
        if file_name.endswith('.php'):
            file_path = os.path.join(STATIC_PAGES_DIR, file_name)
            try:
                schema_markup = add_schema_to_file(file_path, dry_run)
                processed += 1
                
                if validate and processed == 1:  # Проверяем только первый файл для примера
                    validate_schema(schema_markup)
            except Exception as e:
                print(f"Ошибка при обработке файла {file_path}: {e}")
                skipped += 1
    
    print(f"\nОбработка завершена. Обработано файлов: {processed}, пропущено файлов: {skipped}")

def main():
    parser = argparse.ArgumentParser(description='Добавление разметки schema.org в PHP-файлы')
    parser.add_argument('--dry-run', action='store_true', help='Симуляция без внесения изменений в файлы')
    parser.add_argument('--validate', action='store_true', help='Показать инструкции по валидации разметки')
    parser.add_argument('--file', help='Обработать только указанный файл')
    
    args = parser.parse_args()
    
    if args.file:
        file_path = os.path.join(STATIC_PAGES_DIR, args.file)
        if os.path.exists(file_path):
            schema_markup = add_schema_to_file(file_path, args.dry_run)
            if args.validate:
                validate_schema(schema_markup)
        else:
            print(f"Файл {file_path} не найден")
    else:
        process_all_files(args.dry_run, args.validate)

if __name__ == "__main__":
    main() 