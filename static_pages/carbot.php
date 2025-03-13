<?php
    require ('library.php');

    $data = file_get_contents('php://input');
    writeLog($data);

    $data = json_decode($data, true);

    writeLog("Старт обработки");

    $chatId = "";
    $message = "";
    $messageId = "";
    $callbackId = "";
    $username = "";

    // если это просто объект message (текстовое сообщение или команда из меню)
    if (array_key_exists('message', $data))
    {
        $chatId = $data['message']['chat']['id'];                                              // id чата
        $username = $data['message']['chat']['username'];                                      // имя пользователя
        $userUrl = "https://t.me/" . $data['message']['chat']['username'];                     // url чата с пользователем
        $message = $data['message']['text'];                                                   // текст сообщения
        $botName = $data['message']['from']['username'];                                       // имя бота
        $isPhoto = !empty($data['message']['photo']);                                          // флаг, что прислали фото
    }
    // если это объект callback_query (контекстные кнопки)
    else if (array_key_exists('callback_query', $data))
    {
        $chatId = $data['callback_query']['message']['chat']['id'];                            // id чата
        $username = $data['callback_query']['message']['chat']['username'];                    // имя пользователя
        $userUrl = "https://t.me/" . $data['callback_query']['message']['chat']['username'];   // url чата с пользователем
        $message = $data['callback_query']['data'];                                            // текст сообщения/callback-а нажатой кнопки
        $messageId = $data['callback_query']['message']['message_id'];                         // id сообщения
        $callbackId = $data['callback_query']['id'];                                           // id отклика
        $botName = $data['callback_query']['message']['from']['username'];                     // имя бота
    }

    // Если не пришел id чата - запрос не от АПИ бота
    if (!$chatId)
    {
        header('Location: /');
        die();
    }

    // добавляем к username символ '@'
    if ($username)
        $username = "@" . $username;

    writeLog("Чат id: " . $chatId);

    $userInfoArray = getUserInfoByChatId($chatId);             // получение информации о пользователе по id чата
    writeLog("Данные пользователя: " . count($userInfoArray));

    $userRole = $userInfoArray[0]['role_id'] ?: false;         // роль пользователя
    writeLog("Роль: " . $userRole);

    $isAdmin = checkUserRole($userRole, 1);              // проверяем, что пользователь админ
    writeLog("Является админом: " . $isAdmin);

    // массив для хранения кнопок
    $buttons = array();

    // Функция вызова методов API. Отправка сообщения
    function sendTelegram($method, $response)
    {
        $ch = curl_init('https://api.telegram.org/bot' . TOKEN . '/' . $method);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $retryCount = 1;

        writeLog("Отправка сообщения в бота");

        $res = curl_exec($ch);

        // пытаемся отправить сообщение снова пока не получим ответ об успехе, максимум 5 раз и только если включен флаг в настройках
        while (USE_SEND_RETRY && !$res && $retryCount <= 5)
        {
            $res = curl_exec($ch);
            $retryCount++;

            writeLog("($retryCount) Отправка сообщения в бота");
        }

        curl_close($ch);

        return $res;
    }

    // Обертка над sendTelegram для отправки сообщения об ошибке
    function sendFailMessage($chatId)
    {
        writeLog("Отправка сообщения об ошибке пользователю с chat_id: $chatId");

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $chatId,
                'text' => "Внутренняя ошибка в работе сервиса. Попробуйте еще раз или начните заново",
            )
        );
    }

    // Прислали файл.
    // if (!empty($data['message']['document'])) {
    //    $res = sendTelegram(
    //        'getFile',
    //        array(
    //            'file_id' => $data['message']['document']['file_id']
    //        )
    //    );
    //
    //    $res = json_decode($res, true);
    //    if ($res['ok']) {
    //        $src = 'https://api.telegram.org/file/bot' . TOKEN . '/' . $res['result']['file_path'];
    //        $dest = __DIR__ . '/' . time() . '-' . $data['message']['document']['file_name'];
    //
    //        if (copy($src, $dest)) {
    //            sendTelegram(
    //                'sendMessage',
    //                array(
    //                    'chat_id' => $data['message']['chat']['id'],
    //                    'text' => 'Файл сохранён'
    //                )
    //            );
    //        }
    //    }
    //
    //    exit();
    //}

    // Ответ на текстовые сообщения. Или если прислали фото
    if ($message || $isPhoto)
    {
        $str_arr = explode(' ', $message, 2);

        writeLog("Сообщение: " . $message);

        if ($str_arr[0][0] == '/')
        {
            $command = array_shift($str_arr);
            $spacePosition = mb_strpos($message, " ", 0, "UTF-8");

            if ($spacePosition)
                $text = mb_substr($message, $spacePosition, null, "UTF-8");
        }

        else
            $text = $message;

        writeLog("text: $text");
        writeLog("Получение последней команды");

        $chat_res = getBotLastCommand($chatId)[0];
        $lastComm = $chat_res['last_comm'];

        writeLog("Посл. команда: " . $lastComm);

        if ($command === '/start' || $command === '/s')
        {
            writeLog("Обработка команды start:");

            // обнуляем данные по используемым командам и тексту в БД
            addBotLastText($chatId, " ");
            addBotLastCommand($chatId, " ");

            writeLog("текст и команда добалены");

            // получаем доступные регионы из базы данных
            $regions = getRegions();

            writeLog("Кол-во регионов: " . count($regions));

            // обход названий регионов. Добавляем в кнопки
            foreach ($regions as $region)
            {
                // id и название региона
                $regionId = $region["id"];
                $regionName = $region["name"];

                // добавляем кнопку
                $buttons[][] = addInlineButton($regionName, $regionId);
            }

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Обратите внимание! Все отправленные через бота объявления проходят обязательную модерацию и после ее успешного прохождения, размещаются в паблике региона",
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "\nВыберите свой регион для размещения объявления",
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            addBotLastCommand($chatId, "/chooseRegion");
            writeLog("Записана команда: /chooseRegion");

            return true;
        }

        else if ($lastComm === '/chooseRegion')
        {
            writeLog("Обработка команды chooseRegion");

            $comm = '/chooseAction';

            $regionId = $text;                               // id региона

            // получение telegram-групп региона
            $groups = getGroupsByRegionId($regionId);
            $groupUrl = $groups[0]['url'];                   // возьмем url первой telegram-группы/канала

            // добавляем кнопки
            $buttons[0][] = addInlineButton("Хочу купить", "/buy");
            $buttons[0][] = addInlineButton("Хочу продать", "/sell");
            $buttons[][] = addInlineButton("Связь с администратором", "/contact");
            $buttons[][] = addInlineButton("Перейти в канал", "/channel", $groupUrl);

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => 'Выберите действие',
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            addBotLastCommand($chatId, $comm);
            addBotLastText($chatId, $text);

            writeLog("Записана команда: " . $comm . ", текст: " . $text);
        }

        else if ($lastComm === '/chooseAction')
        {
            writeLog("Обработка команды chooseAction");

            $lastComm = $command;

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            writeLog("Переопределение на команду: " . $lastComm . ", текст: " . $text);
        }

        else if ($lastComm === '/userMessage')
        {
            writeLog("Обработка команды userMessage");

            // добавляем в базу последний введенный текст
            addBotLastText($chatId, $text);

            // получаем введенные данные юзера из БД
            $textResult = getBotLastText($chatId)[0];
            $lastText = $textResult['last_text'];
            $textArray = explode('~', $lastText, 2);

            // данные
            $regionId = array_shift($textArray);
            $userMessage = array_shift($textArray);

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            $regionName = $region['name'];

            // получаем chat_id модераторов, закрепленных за группой конкретного региона
            $moderators = getGroupModeratorsChatId($regionId);
            $moderatorChatId = $moderators[0]['chat_id'];          // берем chat_id первого из списка

            // добавляем кнопки
            $buttons[][] = addInlineButton("Перейти в чат", "/openChat", $userUrl);

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение модератору
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $moderatorChatId,
                    'text' => "Новое сообщение:\n---\nРегион: $regionName\nПользователь: $username\nСообщение: $userMessage",
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Сообщение отправлено. Скоро мы свяжемся с Вами",
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            addBotLastCommand($chatId, " ");
            addBotLastText($chatId, " ");

            writeLog("Команда и текст очищены");
        }

        if ($lastComm === '/contact')
        {
            writeLog("Обработка команды contact");

            $comm = "/userMessage";

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => 'Введите текст с описанием Вашего вопроса или проблемы',
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: " . $comm);
        }

        if ($lastComm === '/sell')
        {
            writeLog("Обработка команды sell");

            $comm = "/enterCarNumber";

            // получаем буквы из БД
            $letters = getLetters();

            $index = 1;
            $letterCounter = 0;

            $buttons[][] = addInlineButton("Введенный номер: ", "label-number-");

            // получаем доступные символы и коды регионов из БД, для записи номера машины
            $letters = getLetters();

            $index = 1;
            $letterCounter = 0;

            // обход букв. Добавляем в кнопки
            foreach ($letters as $letter)
            {
                // название буквы и значение callback-а
                $letterName = $letter["name"];
                $callbackValue = "key-" . $letterName . "-";

                // добавляем кнопку
                $buttons[$index][] = addInlineButton($letterName, $callbackValue);

                // увеличиваем счетчик букв
                $letterCounter++;

                // для вывода по 6 кнопок в ряд
                if ($letterCounter == 6)
                {
                    $letterCounter = 0;
                    $index++;
                }
            }

            $index = count($buttons);

            $buttons[$index][] = addInlineButton("*", "key-*-");
            $buttons[$index][] = addInlineButton("Удалить", "key-delOne-");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => 'Введите автомобильный номер, используя представленные ниже кнопки',
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: " . $comm);
        }

        else if ($lastComm === '/enterCarNumber')
        {
            writeLog("Обработка команды enterCarNumber");

            if (!preg_match('/^key/', $text)) return false;

            // разбиваем сообщение с callback-ом по разделителю "-". Формируем итоговое значение номера, введенное юзером
            $params = explode("-", $text);
            $keyName = $params[1];
            $oldValue = $params[2];

            // кнопка удаления 1 символа. Удаляем 1 символ из номера
            if ($keyName === "delOne")
            {
                if ($oldValue)
                {
                    $start = 0;
                    $end = -1;
                    $length = mb_strlen($oldValue, 'UTF-8');

                    if ($length > 6)
                        $end = 6;

                    $value = mb_substr($oldValue, $start, $end, 'UTF-8');
                }
            }

            else if ($keyName === "nextStep")
            {
                $comm = "/enterPrice";

                $buttons[][] = addInlineButton("Введенная цена (руб): ", "label-price-");

                $index = 1;
                $counter = 0;

                // клавиатура с цифрами
                // получаем доступные цифры из БД, для ввода цены
                $numbers = getNumbers();

                // обход цифр. Добавляем в кнопки
                foreach ($numbers as $number)
                {
                    // цмфра и значение callback-а
                    $numberName = $number["name"];
                    $callbackValue = "key-" . $numberName . "-";

                    // добавляем кнопку
                    $buttons[$index][] = addInlineButton($numberName, $callbackValue);

                    // увеличиваем счетчик кодов
                    $counter++;

                    // для вывода по 6 кнопок в ряд
                    if ($counter == 5)
                    {
                        $counter = 0;
                        $index++;
                    }
                }

                $buttons[][] = addInlineButton("Удалить", "key-delOne-");

                // получаем клавиатуру из кнопок
                $inlineKeyboard = getInlineKeyBoard($buttons);

                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => 'Укажите желаемую стоимость',
                        'reply_markup' => $inlineKeyboard,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                $buttons = [];
                $buttons[][] = addInlineButton("Введенный номер: " . $oldValue, "label-number-" . $oldValue);

                // получаем клавиатуру из кнопок
                $inlineKeyboard = getInlineKeyBoard($buttons);

                // редактируем клавиатуру пользователю
                if (!sendTelegram(
                    'editMessageReplyMarkup',
                    array(
                        'chat_id' => $chatId,
                        'reply_markup' => $inlineKeyboard,
                        'message_id' => $messageId,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                addBotLastText($chatId, $oldValue);
                addBotLastCommand($chatId, $comm);

                writeLog("Записана команда: " . $comm . ", текст: " . $oldValue);

                return true;
            }

            else
                $value = $oldValue . $keyName;

            $length = mb_strlen($value, 'UTF-8');

            writeLog("value: " . $value . ", length: " . $length);

            $buttons[][] = addInlineButton("Введенный номер: " . $value, "label-number-" . $value);

            $index = 1;
            $counter = 0;

            // клавиатура с буквами
            if ($length === 0 || $length === 4 || $length === 5)
            {
                // получаем доступные буквы из БД, для записи номера машины
                $letters = getLetters();

                // обход букв. Добавляем в кнопки
                foreach ($letters as $letter)
                {
                    // название буквы и значение callback-а
                    $letterName = $letter["name"];
                    $callbackValue = "key-" . $letterName . "-" . $value;

                    // добавляем кнопку
                    $buttons[$index][] = addInlineButton($letterName, $callbackValue);

                    // увеличиваем счетчик букв
                    $counter++;

                    // для вывода по 6 кнопок в ряд
                    if ($counter == 6) {
                        $counter = 0;
                        $index++;
                    }
                }
            }

            // клавиатура с цифрами
            else if ($length >= 1 && $length <= 3)
            {
                // получаем доступные числа из БД, для записи номера машины
                $numbers = getNumbers();

                // обход цифр. Добавляем в кнопки
                foreach ($numbers as $number)
                {
                    // цифра и значение callback-а
                    $numberName = $number["name"];
                    $callbackValue = "key-" . $numberName . "-" . $value;

                    // добавляем кнопку
                    $buttons[$index][] = addInlineButton($numberName, $callbackValue);

                    // увеличиваем счетчик кодов
                    $counter++;

                    // для вывода по 6 кнопок в ряд
                    if ($counter == 5)
                    {
                        $counter = 0;
                        $index++;
                    }
                }
            }

            // клавиатура с кодами регионов
            else if ($length >= 6)
            {
                $textResult = getBotLastText($chatId)[0];
                $lastText = $textResult['last_text'];

                $textArray = explode('~', $lastText, 2);
                $regionId = array_shift($textArray);

                // получаем доступные коды регионов из БД, согласно выбранному ранее региону, для записи номера машины
                $codes = getCodesByRegionId($regionId);

                // обход кодов. Добавляем в кнопки
                foreach ($codes as $code)
                {
                    // код региона и значение callback-а
                    $codeName = $code["name"];
                    $callbackValue = "key-" . $codeName . "-" . $value;

                    // добавляем кнопку
                    $buttons[$index][] = addInlineButton($codeName, $callbackValue);

                    // увеличиваем счетчик кодов
                    $counter++;

                    // для вывода по 6 кнопок в ряд
                    if ($counter == 6)
                    {
                        $counter = 0;
                        $index++;
                    }
                }
            }

            $index = count($buttons);

            // выводим кнопку "*" если кол-во звездочек в номере меньше двух
            if (mb_substr_count($value, "*", 'UTF-8') < 2 && $length < 6)
                $buttons[$index][] = addInlineButton("*", "key-*-" . $value);

            $buttons[$index][] = addInlineButton("Удалить", "key-delOne-" . $value);

            // выводим кнопку "К след. шагу" если весь номер введен
            if ($length > 6)
            {
                $buttons = [];

                $buttons[][] = addInlineButton("Введенный номер: " . $value, "label-number-" . $value);
                $buttons[1][] = addInlineButton("Удалить", "key-delOne-" . $value);
                $buttons[1][] = addInlineButton("К след. шагу", "key-nextStep-" . $value);
            }

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            sendTelegram(
                'editMessageReplyMarkup',
                array(
                    'chat_id' => $chatId,
                    'reply_markup' => $inlineKeyboard,
                    'message_id' => $messageId,
                )
            );
        }

        else if ($lastComm === '/enterPrice')
        {
            writeLog("Обработка команды enterPrice");

            if (!preg_match('/^key/', $text)) return false;

            // разбиваем сообщение с callback-ом по разделителю "-". Формируем итоговое значение цены, введенное юзером
            $params = explode("-", $text);
            $keyName = $params[1];
            $oldValue = $params[2];

            // кнопка удаления 1 символа. Удаляем 1 цифру из цены
            if ($keyName === "delOne")
            {
                if ($oldValue)
                {
                    $start = 0;
                    $end = -1;

                    $value = mb_substr($oldValue, $start, $end, 'UTF-8');
                }
            }

            else if ($keyName == "0" && (!$oldValue || $oldValue == "0")) return false;

            else if ($keyName === "nextStep")
            {
                $comm = "/isOverweight";

                $buttons[0][] = addInlineButton("Да", "key-Да");
                $buttons[0][] = addInlineButton("Нет", "key-Нет");

                // получаем клавиатуру из кнопок
                $inlineKeyboard = getInlineKeyBoard($buttons);

                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => 'Включен ли перевес?',
                        'reply_markup' => $inlineKeyboard,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                $buttons = [];
                $buttons[][] = addInlineButton("Введенная цена (руб): " . $oldValue, "label-price-" . $oldValue);

                // получаем клавиатуру из кнопок
                $inlineKeyboard = getInlineKeyBoard($buttons);

                // редактируем клавиатуру пользователю
                sendTelegram(
                    'editMessageReplyMarkup',
                    array(
                        'chat_id' => $chatId,
                        'reply_markup' => $inlineKeyboard,
                        'message_id' => $messageId,
                    )
                );

                addBotLastText($chatId, $oldValue);
                addBotLastCommand($chatId, $comm);

                writeLog("Записана команда: " . $comm . ", текст: " . $oldValue);

                return true;
            }

            else
                $value = $oldValue . $keyName;

            $length = mb_strlen($value, 'UTF-8');

            writeLog("value: " . $value . ", length: " . $length);

            $buttons[][] = addInlineButton("Введенная цена (руб): " . $value, "label-price-" . $value);

            $index = 1;
            $counter = 0;

            // клавиатура с цифрами
            // получаем доступные цифры из БД, для ввода цены
            $numbers = getNumbers();

            // обход кодов. Добавляем в кнопки
            foreach ($numbers as $number)
            {
                // код региона и значение callback-а
                $numberName = $number["name"];
                $callbackValue = "key-" . $numberName . "-" . $value;

                // добавляем кнопку
                $buttons[$index][] = addInlineButton($numberName, $callbackValue);

                // увеличиваем счетчик кодов
                $counter++;

                // для вывода по 6 кнопок в ряд
                if ($counter == 5)
                {
                    $counter = 0;
                    $index++;
                }
            }

            $index = count($buttons);

            $buttons[$index][] = addInlineButton("Удалить", "key-delOne-" . $value);

            // выводим кнопку "К след. шагу" если цена введена
            if ($length > 0 && $value > 0)
                $buttons[$index][] = addInlineButton("К след. шагу", "key-nextStep-" . $value);

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            sendTelegram(
                'editMessageReplyMarkup',
                array(
                    'chat_id' => $chatId,
                    'reply_markup' => $inlineKeyboard,
                    'message_id' => $messageId,
                )
            );
        }

        else if ($lastComm === '/isOverweight')
        {
            writeLog("Обработка команды isOverweight");

            if (!preg_match('/^key/', $text)) return false;

            $comm = "/addPhoto";

            // разбиваем сообщение с callback-ом по разделителю "-". Берем значение кнопок
            $params = explode("-", $text);
            $keyName = $params[1];

            $buttons[][] = addInlineButton("Пропустить", "key-skip");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => 'Добавьте фото автомобильного номера (не обязательно)',
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            addBotLastText($chatId, $keyName);
            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: " . $comm . ", текст: " . $keyName);
        }

        else if ($lastComm === '/addPhoto')
        {
            writeLog("Обработка команды addPhoto");

            // если не нажата кнопка "пропустить" - сохраним фотки на сервер и запишем их названия
            if (!preg_match('/^key-skip/', $text))
            {
                // не прислали фото
                if (!$isPhoto)
                {
                    // отправляем сообщение пользователю
                    sendTelegram(
                        'sendMessage',
                        array(
                            'chat_id' => $chatId,
                            'text' => "Ожидается добавление фотографии",
                        )
                    );

                    return false;
                }

                // прислали фото
                $fileName = getPhoto($data['message']['photo'], $chatId);

                // отправляем сообщение пользователю
                if (!$fileName)
                {
                    if (!sendTelegram(
                        'sendMessage',
                        array(
                            'chat_id' => $chatId,
                            'text' => "Что-то пошло не так, попробуйте еще раз",
                        )
                    ))
                    {
                        sendFailMessage($chatId);    // сообщение пользователю об ошибке
                        return true;
                    }

                    return false;
                }

                // записываем команду и текст в БД
                $photoSaved = addBotLastText($chatId, $fileName);

                writeLog("Записан текст: $fileName");
            }

            $comm = "/addCommentary";

            $buttons[][] = addInlineButton("Пропустить", "key-skip");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => 'Введите доп. информацию (не обязательно)',
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            // записываем команду и текст в БД
            if (!$photoSaved)
            {
                addBotLastText($chatId, "~", "");
                writeLog("Записан текст: ~");
            }

            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: $comm");

            return true;
        }

        else if ($lastComm === '/addCommentary')
        {
            writeLog("Обработка команды addCommentary");

            $comm = "/showPreview";

            // если не нажата кнопка "пропустить" - запишем введенный текст комментария
            if (!preg_match('/^key-skip/', $text))
                addBotLastText($chatId, $text);
            else
                addBotLastText($chatId, "~", "");

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            // отправляем сообщение пользователю, если у него не указан username
            if (!$username)
            {
                $comm = "/addPhoneNumber";

                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "У вас не указано имя пользователя в настройках профиля Telegram!\nЧтобы пользователи могли с Вами связаться по поводу объявления - напишите свой номер телефона.\nОн будет отображаться в Вашем объявлении вместо имени пользователя\n\nВведите номер в формате: +7XXXXXXXXXX или 8XXXXXXXXXX",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                // записываем команду в БД
                addBotLastCommand($chatId, $comm);

                return false;
            }

            // получаем все записанные за пользователем данные из БД для вывода на превью
            $textResult = getBotLastText($chatId)[0];
            $lastText = $textResult['last_text'];
            $textArray = explode('~', $lastText, 6);

            // данные
            $regionId = array_shift($textArray);             // id выбранного региона
            $carNumber = array_shift($textArray);            // автомобильный номер
            $price = array_shift($textArray);                // цена
            $isOverweight = array_shift($textArray);         // перевес
            $photoFileName = array_shift($textArray);        // название фото с расширением
            $commentary = array_shift($textArray);           // доп. информация / комментарий
            $commentary = $commentary ? "Доп. информация: $commentary\n" : "";

            // ссылка на сохраненную фотографию
            $photoLink = createImageLink($photoFileName);

            writeLog("photoFileName: $photoFileName, photoLink: $photoLink");

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            $regionName = $region['name'];

            // кнопки
            $buttons[][] = addInlineButton("Да", "key-saveOrder");
            $buttons[][] = addInlineButton("Нет", "key-cancelOrder");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // если есть фотка
            if ($photoLink)
            {
                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendPhoto',
                    array(
                        'chat_id' => $chatId,
                        'caption' => "Продавец: $username\nРегион: $regionName\nАвтомобильный номер: $carNumber\nЦена: $price руб.\nВключен перевес: $isOverweight\n$commentary---\nЖелаете разместить данное объявление?",
                        'parse_mode' => 'html',
                        'reply_markup' => $inlineKeyboard,
                        'photo' => $photoLink,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }
            }
            else
            {
                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Продавец: $username\nРегион: $regionName\nАвтомобильный номер: $carNumber\nЦена: $price руб.\nВключен перевес: $isOverweight\n$commentary---\nЖелаете разместить данное объявление?",
                        'reply_markup' => $inlineKeyboard,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }
            }

            // записываем команду в БД
            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: $comm");
        }

        else if ($lastComm === '/addPhoneNumber')
        {
            writeLog("Обработка команды addPhoneNumber");

            $comm = "/showPreview";

            // проверка валидности номера телефона
            if (!preg_match('/^\s?(\+\s?7|8)([- ()]*\d){10}$/', $text))
            {
                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Номер телефона не соответствует формату. Попробуйте еще раз",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                return false;
            }

            // сохраняем номер телефона в БД
            addBotLastText($chatId, $text);

            // получаем все записанные за пользователем данные из БД для вывода на превью
            $textResult = getBotLastText($chatId)[0];
            $lastText = $textResult['last_text'];
            $textArray = explode('~', $lastText, 7);

            // данные
            $regionId = array_shift($textArray);             // id выбранного региона
            $carNumber = array_shift($textArray);            // автомобильный номер
            $price = array_shift($textArray);                // цена
            $isOverweight = array_shift($textArray);         // перевес
            $photoFileName = array_shift($textArray);        // название фото с расширением
            $commentary = array_shift($textArray);           // доп. информация / комментарий
            $commentary = $commentary ? "Доп. информация: $commentary\n" : "";
            $phoneNumber = array_shift($textArray);          // номер телефона

            // ссылка на сохраненную фотографию
            $photoLink = createImageLink($photoFileName);

            writeLog("photoFileName: $photoFileName, photoLink: $photoLink");

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            $regionName = $region['name'];

            // кнопки
            $buttons[][] = addInlineButton("Да", "key-saveOrder");
            $buttons[][] = addInlineButton("Нет", "key-cancelOrder");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // если есть фотка
            if ($photoLink)
            {
                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendPhoto',
                    array(
                        'chat_id' => $chatId,
                        'caption' => "Продавец: $phoneNumber\nРегион: $regionName\nАвтомобильный номер: $carNumber\nЦена: $price руб.\nВключен перевес: $isOverweight\n$commentary---\nЖелаете разместить данное объявление?",
                        'parse_mode' => 'html',
                        'reply_markup' => $inlineKeyboard,
                        'photo' => $photoLink,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }
            }
            else
            {
                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Продавец: $phoneNumber\nРегион: $regionName\nАвтомобильный номер: $carNumber\nЦена: $price руб.\nВключен перевес: $isOverweight\n$commentary---\nЖелаете разместить данное объявление?",
                        'reply_markup' => $inlineKeyboard,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }
            }

            // записываем команду в БД
            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: $comm");
        }

        else if ($lastComm === '/showPreview')
        {
            writeLog("Обработка команды showPreview");

            // если не нажата кнопка - не обрабатываем
            if (!preg_match('/^key/', $text)) return true;

            // разбиваем сообщение с callback-ом по разделителю "-"
            $params = explode("-", $text);
            $keyName = $params[1];

            // если пользователь отменил размещение объявления
            if ($keyName === "cancelOrder")
            {
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Публикация объявления отменена успешно",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                // удаляем сообщение с кнопками у пользователя
                sendTelegram(
                    'deleteMessage',
                    array(
                        'chat_id' => $chatId,
                        'message_id' => $messageId,
                    )
                );

                addBotLastCommand($chatId, " ");
                addBotLastText($chatId, " ");

                return true;
            }

            // получаем все записанные за пользователем данные из БД для сохранения объявления
            $textResult = getBotLastText($chatId)[0];
            $lastText = $textResult['last_text'];
            $textArray = explode('~', $lastText, 7);

            // данные
            $regionId = array_shift($textArray);             // id выбранного региона
            $carNumber = array_shift($textArray);            // автомобильный номер
            $price = array_shift($textArray);                // цена
            $isOverweight = array_shift($textArray);         // перевес
            $photoFileName = array_shift($textArray);        // название фото с расширением
            $commentary = array_shift($textArray);           // доп. информация (комментарий)
            $phoneNumber = array_shift($textArray);          // номер телефона

            $orderTypeId = 2;                                       // тип объявления "продажа"

            writeLog("$chatId | $orderTypeId | $regionId | $carNumber | $price | $isOverweight | $photoFileName | $commentary | $phoneNumber");

            // создаем массив с данными для сохранения объявления
            $data = compact('chatId', 'orderTypeId', 'regionId', 'carNumber', 'price', 'isOverweight', 'photoFileName', 'commentary', 'phoneNumber');

            writeLog("count: " . count($data));

            // сохраняем объявление в БД со статусом "Создано"
            $orderId = createOrder($data);

            // если не удалось отправить сообщение модератору
            if (!$orderId)
            {
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Возникла ошибка при создании объявления. Попробуйте позже",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                return false;
            }

            // ссылка на сохраненную фотографию
            $photoLink = createImageLink($photoFileName);

            writeLog("photoFileName: $photoFileName, photoLink: $photoLink");

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            $regionName = $region['name'];

            // получаем chat_id модераторов, закрепленных за группой конкретного региона
            $moderators = getGroupModeratorsChatId($regionId);
            $moderatorChatId = $moderators[0]['chat_id'];          // берем chat_id первого из списка

            // получаем информацию о типе объявления
            $orderType = getOrderTypeInfo($orderTypeId);
            $orderTypeName = $orderType['name'];                   // название типа объявления

            writeLog("$moderatorChatId | count: " . count($moderators));

            // кнопки
            $buttons[0][] = addInlineButton("Да", "mod-accept-$orderId-$username");
            $buttons[0][] = addInlineButton("Нет", "mod-decline-$orderId-$username");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // заменяем на "-", если пустое
            $commentary = $commentary ? "Доп. информация: $commentary\n" : "";

            // определяем что использовать для связи с пользователем
            $contact = $username ?:$phoneNumber;

            // если есть фотка
            if ($photoLink)
            {
                // отправляем сообщение модератору
                $sendResult = sendTelegram(
                    'sendPhoto',
                    array(
                        'chat_id' => $moderatorChatId,
                        'caption' => "Объявление #$orderId ($orderTypeName)\n\nПродавец: $contact\nРегион: $regionName\nАвтомобильный номер: $carNumber\nЦена: $price руб.\nВключен перевес: $isOverweight\n$commentary---\nРазрешить публикацию объявления?",
                        'parse_mode' => 'html',
                        'reply_markup' => $inlineKeyboard,
                        'photo' => $photoLink,
                    )
                );
            }
            else
            {
                // отправляем сообщение модератору
                $sendResult = sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $moderatorChatId,
                        'text' => "Объявление #$orderId ($orderTypeName)\n\nПродавец: $contact\nРегион: $regionName\nАвтомобильный номер: $carNumber\nЦена: $price руб.\nВключен перевес: $isOverweight\n$commentary---\nРазрешить публикацию объявления?",
                        'reply_markup' => $inlineKeyboard,
                    )
                );
            }

            // если не удалось отправить сообщение модератору
            if (!$sendResult)
            {
                sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Не удалось отправить объявление на модерацию.\nНомер объявления: #$orderId\n\nПопробуйте еще раз",
                    )
                );

                return false;
            }

            $changed = changeOrderStatus($orderId, 2);  // смена статуса объявления на "Отправлен на модерацию"

            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Объявление успешно отправлено на модерацию.\nНомер объявления: #$orderId\n\nМы сообщим Вам о результатах в этом чате",
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            // сброс текста и команд в БД
            addBotLastCommand($chatId, " ");
            addBotLastText($chatId, " ");

            writeLog("Команды и текст сброшены");
        }

        else if ($isAdmin && $lastComm === '/declineReason')
        {
            writeLog("Обработка команды declineReason");

            // запишем введенный текст причины отказа
            addBotLastText($chatId, $text);

            // получаем все записанные за модератором данные из БД
            $textResult = getBotLastText($chatId)[0];
            $lastText = $textResult['last_text'];
            $textArray = explode('~', $lastText, 2);

            // данные
            $orderId = array_shift($textArray);                          // id объявления
            $reasonText = array_shift($textArray);                       // причина отказа в публикации

            // смена статуса объявления на "Не опубликован" с записью причины отказа
            $changed = changeOrderStatus($orderId, 4, $reasonText);

            // отправляем сообщение модератору
            if (!$changed)
            {
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Ошибка в работе сервиса. Не удалось изменить статус объявления #$orderId. Попробуйте еще раз",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                return false;
            }

            // получаем информацию по объявлению и id чата пользователя из него
            $order = getOrderById($orderId);
            $orderChatId = $order->chat_id;

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $orderChatId,
                    'text' => "Отказ в публикации объявления #$orderId\nПричина: $reasonText",
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // отправляем сообщение модератору
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Успешно выполнен отказ в публикации объявления #$orderId",
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // очищаем команду и текст в БД
            addBotLastCommand($chatId, " ");
            addBotLastText($chatId, " ");

            writeLog("Текст и команды очищены");

            return true;
        }

        // обработка кнопок (Да/Нет) модератора
        if ($isAdmin && preg_match('/^mod/', $text))
        {
            writeLog("Обработка команды mod");

            // разбиваем сообщение с callback-ом по разделителю "-"
            $params = explode("-", $text);
            $action = $params[1];
            $orderId = $params[2];
            $orderUserName = $params[3];

            if ($action === "decline")
            {
                writeLog("Обработка действия decline");

                $comm = "/declineReason";

                // отправляем сообщение модератору
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Введите причину отказа для объявления #$orderId",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                // удаляем сообщение с кнопками у пользователя
                sendTelegram(
                    'deleteMessage',
                    array(
                        'chat_id' => $chatId,
                        'message_id' => $messageId,
                    )
                );

                // запись команды в БД
                addBotLastCommand($chatId, $comm);
                addBotLastText($chatId, $orderId);

                writeLog("Записана команда: " . $comm . ", текст: " . $text);

                return true;
            }

            // смена статуса объявления на "Опубликован"
            $changed = changeOrderStatus($orderId, 3);

            // получаем информацию по объявлению
            $order = getOrderById($orderId);

            // данные
            $orderChatId = $order->chat_id;                    // id чата пользователя
            $orderTypeId = $order->type_id;                    // id типа объявления
            $regionId = $order->region_id;                     // id региона
            $carNumber = $order->car_number;                   // автомобильный номер
            $price = $order->price;                            // цена
            $isOverweight = $order->is_overweight;             // включен ли перевес
            $orderText = $order->text;                         // текст объявления (для покупки)
            $photoFileName = $order->photo;                    // название фото с расширением
            $phoneNumber = $order->phone_number;               // номер телефона
            $commentary = $order->commentary;                  // доп. информация / комментарий
            $commentary = $commentary ? "\nДоп. информация: $commentary" : "";

            // ссылка на сохраненную фотографию
            $photoLink = createImageLink($photoFileName);

            writeLog("photoFileName: $photoFileName, photoLink: $photoLink");

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            $regionName = $region->name;

            // получаем информацию о telegram-группах региона
            $groups = getGroupsByRegionId($regionId);
            $groupName = $groups[0]['name'];                   // возьмем название первой telegram-группы

            // получаем информацию о типе объявления
            $orderType = getOrderTypeInfo($orderTypeId);
            $orderTypeName = $orderType['name'];               // название типа объявления

            // определяем что использовать для связи с пользователем
            $contact = $orderUserName ?: $phoneNumber;

            // для покупки
            if ($orderTypeId == 1)
                $messageText = "Объявление #$orderId ($orderTypeName)\n\nПокупатель: $contact\nРегион: $regionName\nТекст объявления: $orderText";

            // для продажи
            if ($orderTypeId == 2)
                $messageText = "Объявление #$orderId ($orderTypeName)\n\nПродавец: $contact\nРегион: $regionName\nАвтомобильный номер: $carNumber\nЦена: $price руб.\nВключен ли перевес: $isOverweight $commentary";

            // если есть фотка
            if ($photoLink)
            {
                // отправляем сообщение в канал
                if (!sendTelegram(
                    'sendPhoto',
                    array(
                        'chat_id' => $groupName,
                        'caption' => $messageText,
                        'parse_mode' => 'html',
                        'photo' => $photoLink,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }
            }
            else
            {
                // отправляем сообщение в канал
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $groupName,
                        'text' => $messageText,
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }
            }

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $orderChatId,
                    'text' => "Объявление #$orderId успешно опубликовано в канале $groupName",
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // отправляем сообщение модератору
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Объявление #$orderId успешно опубликовано в канале $groupName",
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у модератора
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            // очищаем команду и текст в БД
            addBotLastCommand($chatId, " ");
            addBotLastText($chatId, " ");

            writeLog("Текст и команды очищены");

            return true;
        }

        if ($lastComm === '/buy')
        {
            writeLog("Обработка команды buy");

            $comm = "/questionBuy";

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => 'Напишите текст объявления (для предпросмотра нажмите отправить)'
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            addBotLastCommand($chatId, $comm);
            addBotLastText($chatId, $text);

            writeLog("Записана команда: " . $comm . ", текст: " . $text);
        }

        else if ($lastComm === '/questionBuy')
        {
            writeLog("Обработка команды questionBuy");

            // отправляем сообщение пользователю, если у него не указан username
            if (!$username)
            {
                $comm = "/addPhoneNumberBuy";

                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "У вас не указано имя пользователя в настройках профиля Telegram!\nЧтобы пользователи могли с Вами связаться по поводу объявления - напишите свой номер телефона.\nОн будет отображаться в Вашем объявлении вместо имени пользователя\n\nВведите номер в формате: +7XXXXXXXXXX или 8XXXXXXXXXX",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                // записываем команду и текст в БД
                addBotLastText($chatId, $text);
                addBotLastCommand($chatId, $comm);

                return false;
            }

            $comm = '/closeBuy';

            addBotLastText($chatId, $text);

            $textResult = getBotLastText($chatId)[0];
            $last_text = $textResult['last_text'];

            $textArray = explode('~', $last_text, 2);
            $regionId = array_shift($textArray);
            $orderText = array_shift($textArray);

            writeLog("regionId: " . $regionId . ", orderText: " . $orderText);

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            writeLog("region: " . $region);

            $regionName = $region['name'];
            writeLog("regionName: " . $regionName);

            // добавляем кнопки
            $buttons[0][] = addInlineButton("Да", "yes");
            $buttons[0][] = addInlineButton("Нет", "no");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Покупатель: $username\nРегион: $regionName\nТекст объявления: $orderText\n---\nЖелаете разместить данное объявление?",
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: " . $comm . ", текст: " . $text);
        }

        else if ($lastComm === '/addPhoneNumberBuy')
        {
            writeLog("Обработка команды addPhoneNumberBuy");

            // проверка валидности номера телефона
            if (!preg_match('/^\s?(\+\s?7|8)([- ()]*\d){10}$/', $text))
            {
                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Номер телефона не соответствует формату. Попробуйте еще раз",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                return false;
            }

            // сохраняем номер телефона в БД
            addBotLastText($chatId, $text);

            $comm = '/closeBuy';

            $textResult = getBotLastText($chatId)[0];
            $last_text = $textResult['last_text'];

            $textArray = explode('~', $last_text, 3);
            $regionId = array_shift($textArray);
            $orderText = array_shift($textArray);
            $phoneNumber = array_shift($textArray);          // номер телефона

            writeLog("regionId: " . $regionId . ", orderText: " . $orderText . "phoneNumber: $phoneNumber");

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            writeLog("region: " . $region);

            $regionName = $region['name'];
            writeLog("regionName: " . $regionName);

            // добавляем кнопки
            $buttons[0][] = addInlineButton("Да", "yes");
            $buttons[0][] = addInlineButton("Нет", "no");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Покупатель: $phoneNumber\nРегион: $regionName\nТекст объявления: $orderText\n---\nЖелаете разместить данное объявление?",
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            addBotLastCommand($chatId, $comm);

            writeLog("Записана команда: " . $comm . ", текст: " . $text);
        }

        else if ($lastComm === '/closeBuy')
        {
            writeLog("Обработка команды closeBuy");

            if ($text === "no")
            {
                addBotLastCommand($chatId, " ");
                addBotLastText($chatId, " ");

                // отправляем сообщение пользователю
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => 'Размещение объявления отменено'
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                // удаляем сообщение с кнопками у пользователя
                sendTelegram(
                    'deleteMessage',
                    array(
                        'chat_id' => $chatId,
                        'message_id' => $messageId,
                    )
                );

                return true;
            }

            $textResult = getBotLastText($chatId)[0];
            $last_text = $textResult['last_text'];

            $textArray = explode('~', $last_text, 3);
            $regionId = array_shift($textArray);
            $orderText = array_shift($textArray);
            $phoneNumber = array_shift($textArray);          // номер телефона

            // id типа объявления "покупка"
            $orderTypeId = 1;

            writeLog("$chatId | $orderTypeId | $regionId | $orderText | $phoneNumber");

            // создаем массив с данными для сохранения объявления
            $data = compact('chatId', 'orderTypeId', 'regionId', 'orderText', 'phoneNumber');

            writeLog("count: " . count($data));

            // сохраняем объявление в БД со статусом "Создано"
            $orderId = createOrder($data);

            // если не удалось создать объявление
            if (!$orderId)
            {
                if (!sendTelegram(
                    'sendMessage',
                    array(
                        'chat_id' => $chatId,
                        'text' => "Возникла ошибка при создании объявления. Попробуйте позже",
                    )
                ))
                {
                    sendFailMessage($chatId);    // сообщение пользователю об ошибке
                    return true;
                }

                return false;
            }

            // получаем информацию о регионе из базы данных
            $region = getRegionInfo($regionId);
            $regionName = $region['name'];

            // получаем chat_id модераторов, закрепленных за группой конкретного региона
            $moderators = getGroupModeratorsChatId($regionId);
            $moderatorChatId = $moderators[0]['chat_id'];          // берем chat_id первого из списка

            // получаем информацию о типе объявления
            $orderType = getOrderTypeInfo($orderTypeId);
            $orderTypeName = $orderType['name'];                   // название типа объявления

            // кнопки
            $buttons[0][] = addInlineButton("Да", "mod-accept-$orderId-$username");
            $buttons[0][] = addInlineButton("Нет", "mod-decline-$orderId-$username");

            // получаем клавиатуру из кнопок
            $inlineKeyboard = getInlineKeyBoard($buttons);

            // определяем что использовать для связи с пользователем
            $contact = $username ?:$phoneNumber;

            // отправляем сообщение модератору
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $moderatorChatId,
                    'text' => "Новое объявление ($orderTypeName) #$orderId:\n---\nПокупатель: $contact\nРегион: $regionName\nТекст объявления: $orderText\n---\nРазрешить публикацию объявления?",
                    'reply_markup' => $inlineKeyboard,
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // отправляем сообщение пользователю
            if (!sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chatId,
                    'text' => "Объявление успешно отправлено на модерацию.\nНомер объявления: #$orderId\n\nМы сообщим Вам о результатах в этом чате"
                )
            ))
            {
                sendFailMessage($chatId);    // сообщение пользователю об ошибке
                return true;
            }

            // удаляем сообщение с кнопками у пользователя
            sendTelegram(
                'deleteMessage',
                array(
                    'chat_id' => $chatId,
                    'message_id' => $messageId,
                )
            );

            addBotLastCommand($chatId, " ");
            addBotLastText($chatId, " ");

            writeLog("Команда и текст сброшены");
        }

        //  Отправка фото.
        //  if (mb_stripos($text, 'фото') !== false) {
        //      sendTelegram(
        //          'sendPhoto',
        //          array(
        //              'chat_id' => $data['message']['chat']['id'],
        //              'photo' => curl_file_create(__DIR__ . '/torin.jpg')
        //          )
        //      );
        //
        //      exit();
        //  }

        //  Отправка файла.
        //  if (mb_stripos($text, 'файл') !== false) {
        //      sendTelegram(
        //          'sendDocument',
        //          array(
        //              'chat_id' => $data['message']['chat']['id'],
        //              'document' => curl_file_create(__DIR__ . '/example.xls')
        //          )
        //      );
        //
        //      exit();
        //  }
    }

    function addInlineButton($text, $callbackData = "", $url = "")
    {
        $array = array(
            'text' => $text,
        );

        if ($callbackData)
            $array['callback_data'] = $callbackData;

        if ($url)
            $array['url'] = $url;

        return $array;
    }

    function getInlineKeyBoard($data)
    {
        $inlineKeyboard = array(
            "inline_keyboard" => $data,
        );

        return json_encode($inlineKeyboard);
    }

    function addButton($text)
    {
        return array(
            'text' => $text,
        );
    }

    function getKeyBoard($data)
    {
        $keyboard = array(
            "keyboard" => $data,
            "one_time_keyboard" => false,
            "resize_keyboard" => true
        );

        return json_encode($keyboard);
    }

    // общая функция загрузки картинки
    function getPhoto($data, $chatId)
    {
        writeLog("метод getPhoto");

        if (!$data || !$chatId)
            return false;

        writeLog("data count: " . count($data));

        // берем последнюю картинку в массиве
        $fileId = $data[count($data) - 1]['file_id'];
        writeLog("fileId: $fileId");

        // получаем file_path
        $filePath = getPhotoPath($fileId);
        writeLog("filePath: $filePath");

        // возвращаем название загруженного фото
        $fileName = copyPhoto($filePath, $chatId);
        writeLog("saved Filename: $fileName");

        return $fileName;
    }

    // функция получения метонахождения файла
    function getPhotoPath($fileId)
    {
        writeLog("метод getPhotoPath");

        if (!$fileId)
            return false;

        writeLog("fileId: $fileId");

        // получаем объект File
        $res = sendTelegram(
            'getFile',
            array(
                'file_id' => $fileId,
            )
        );

        writeLog("res: $res");

        // декодируем из JSON в ассоциативный массив
        $array = json_decode($res,true);
        writeLog("array count: " . count($array));

        // возвращаем file_path
        return $array['result']['file_path'];
    }

    // копируем фото к себе
    function copyPhoto($filePath, $chatId)
    {
        writeLog("метод copyPhoto");

        if (!$filePath || !$chatId)
            return false;

        writeLog("filePath: $filePath");

        // ссылка на файл в телеграме
        $fileFromTelegram = "https://api.telegram.org/file/bot" . TOKEN . "/" . $filePath;
        writeLog("fileFromTelegram: $fileFromTelegram");

        // достаем расширение файла
        $array = explode(".", $filePath);
        $ext = end($array);
        writeLog("array count: " . count($array) . ", ext: $ext");

        // назначаем свое имя здесь "id_чата_время_в_секундах.расширение_файла"
        $newFileName = $chatId . time() . "." . $ext;
        writeLog("newFileName: $newFileName, newPath: " . IMAGES_PATH . $newFileName);

        // ВАЖНО! На момент выполнения копирования все каталоги из пути IMAGES_PATH должны быть уже созданы. Иначе, копирование не будет работать
        $isCopy = copy($fileFromTelegram, IMAGES_PATH . $newFileName);

        if (!$isCopy)
            return false;

        return $newFileName;
    }