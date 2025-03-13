<?php
require ('functions.php');

$data = file_get_contents('php://input');
$data = json_decode($data, true);

$access = [];

$closeDatesCommands = ['/chooseHouse', '/closeStartDate', '/closeEndDate', '/close'];
$openDatesCommands = ['/chooseHouse', '/openStartDate', '/openEndDate', '/open'];
$showOpenedDatesCommands = ['/chooseHouse', '/chooseMonth', '/show'];
$showClosedDatesCommands = ['/chooseHouse_cl', '/chooseMonth_cl', '/show_cl'];

$chat_ids_arr = getChatIds();

if ($chat_ids_arr)
{
    foreach ($chat_ids_arr as $item)
    {
        $c_id = $item['chat_id'];

        if (!in_array($c_id, $access))
            $access[] = $c_id;
    }
}

if (empty($data['message']['chat']['id']))
{
    header('Location: /');
    die();
}

define('TOKEN', '5170401453:AAFt2mZE6FmEnUpjf9t4LgEBR7CSFYjeC1Q');

// Функция вызова методов API.
function sendTelegram($method, $response)
{
    $ch = curl_init('https://api.telegram.org/bot' . TOKEN . '/' . $method);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
}

//// Прислали фото.
//if (!empty($data['message']['photo'])) {
//    $photo = array_pop($data['message']['photo']);
//    $res = sendTelegram(
//        'getFile',
//        array(
//            'file_id' => $photo['file_id']
//        )
//    );
//
//    $res = json_decode($res, true);
//    if ($res['ok']) {
//        $src = 'https://api.telegram.org/file/bot' . TOKEN . '/' . $res['result']['file_path'];
//        $dest = __DIR__ . '/' . time() . '-' . basename($src);
//
//        if (copy($src, $dest)) {
//            sendTelegram(
//                'sendMessage',
//                array(
//                    'chat_id' => $data['message']['chat']['id'],
//                    'text' => 'Фото сохранено'
//                )
//            );
//
//        }
//    }
//
//    exit();
//}

//// Прислали файл.
//if (!empty($data['message']['document'])) {
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

// Ответ на текстовые сообщения.
if (!empty($data['message']['text']))
{
    $chat_id = $data['message']['chat']['id'];

    $str_arr = explode(' ', $data['message']['text'], 2);

    if ($str_arr[0][0] == '/')
        $command = array_shift($str_arr);

    $text = array_shift($str_arr);

    $chat_res = getLastCommand($chat_id)[0];
    $lastComm = $chat_res['last_comm'];

    if (in_array($chat_id, $access))
    {
        $house_id = getHouseId($chat_ids_arr, $chat_id);

        if ($command === '/start' || $command === '/s')
        {
            addLastText($chat_id, " ");
            addLastCommand($chat_id, " ");

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chat_id,
                    'text' => 'Поздравляю с успешным прохождением идентификации!'
                )
            );

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chat_id,
                    'text' => 'Теперь я помогу Вам управлять Вашей информацией на нашем сайте. Для управления, нажимайте соответствующие команды из списка меню (синяя кнопка)'
                )
            );

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chat_id,
                    'text' => 'Или вводите вручную, следуя шаблону: "/название_команды"'
                )
            );

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chat_id,
                    'text' => 'Для показа доступных команд нажмите или напишите /help или /h'
                )
            );
        }

        else if ($command === '/reset' || $command === '/r')
        {
            addLastText($chat_id, " ");
            addLastCommand($chat_id, " ");

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $chat_id,
                    'text' => 'Сброс бота произведен'
                )
            );
        }

        else if ($command === '/showodates' || $command === '/sod' || in_array($lastComm, $showOpenedDatesCommands))
        {
            foreach ($showOpenedDatesCommands as $comm)
            {
                if (!$lastComm || $lastComm == " " || $lastComm == "")
                {
                    if ($chat_id == 647066308 || $chat_id == 1063725677)
                        $lastComm = '/chooseHouse';
                    else
                    {
                        $lastComm = '/chooseMonth';
                        $text = $house_id;
                    }
                }

                if ($comm === $lastComm)
                {
                    if ($comm === '/chooseHouse')
                    {
                        $comm = '/chooseMonth';

                        $houses = getHouses();
                        $housesStrList = formatHousesToListStrBotFormat($houses);

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => "Укажите цифру дома:\n\n1 - Все дома\n" . $housesStrList
                            )
                        );
                    }

                    else if ($comm === '/chooseMonth')
                    {
                        $comm = '/show';

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => "Укажите цифру месяца"
                            )
                        );
                    }

                    else if ($comm === '/show')
                    {
                        addLastText($chat_id, $text);

                        $text_res = getLastText($chat_id)[0];
                        $l_text = $text_res['last_text'];

                        $text_arr = explode(' ', $l_text, 2);

                        $house_id = array_shift($text_arr);

                        $start_month = array_shift($text_arr);
                        $end_month = $start_month;

                        if ($house_id == 1)
                            $houses = getHouses();

                        else
                            $houses = getHouseInfo($house_id);

                        $showText = "";

                        foreach ($houses as $house)
                        {
                            $house_name = $house['name'];
                            $house_id = $house['id'];
                            $page_url = $house['page_url'];

                            $bookingData = getBookingDataForMonth($start_month, $end_month, $house_id);
                            $booking_dates = getFormatBookingCalendarDates($bookingData);
                            $cur_dates_arr = createDatesArrOnMonth($start_month, $end_month);

                            $openedDates = getOpenedDates($cur_dates_arr, $booking_dates['dates']);

                            $datesStrList = formatDatesToListStrBot($openedDates, $booking_dates['oneDayRange'], 2);

                            if (!$datesStrList)
                            {
                                $showText = "- Дом: " . $house_name . "\n\nСвободные даты отсутствуют";
                                continue;
                            }

                            if (empty($showText))
                                $showText = "- Дом: " . $house_name . "\n" . $datesStrList;

                            else
                                $showText .= "\n\n- Дом: " . $house_name . "\n" . $datesStrList;

                            $showText .= "\n- Страница дома: " . $page_url;
                        }

                        if (!empty($showText))
                        {
                            sendTelegram(
                                'sendMessage',
                                array(
                                    'chat_id' => $chat_id,
                                    'text' => "Список доступных дат:\n" . $showText
                                )
                            );
                        }

                        else
                        {
                            sendTelegram(
                                'sendMessage',
                                array(
                                    'chat_id' => $chat_id,
                                    'text' => 'Нет свободных дат'
                                )
                            );
                        }


                        $comm = " ";
                        $text = " ";
                    }

                    addLastCommand($chat_id, $comm);
                    addLastText($chat_id, $text);

                    break;
                }
            }
        }

        else if ($command === '/showcdates' || $command === '/scd' || in_array($lastComm, $showClosedDatesCommands))
        {
            foreach ($showClosedDatesCommands as $comm)
            {
                if (!$lastComm || $lastComm == " " || $lastComm == "")
                {
                    if ($chat_id == 647066308 || $chat_id == 1063725677)
                        $lastComm = '/chooseHouse_cl';
                    else
                    {
                        $lastComm = '/chooseMonth_cl';
                        $text = $house_id;
                    }
                }

                if ($comm === $lastComm)
                {
                    if ($comm === '/chooseHouse_cl')
                    {
                        $comm = '/chooseMonth_cl';

                        $houses = getHouses();
                        $housesStrList = formatHousesToListStrBotFormat($houses);

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => "Укажите цифру дома:\n\n1 - Все дома\n" . $housesStrList
                            )
                        );
                    }

                    else if ($comm === '/chooseMonth_cl')
                    {
                        $comm = '/show_cl';

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => "Укажите цифру месяца"
                            )
                        );
                    }

                    else if ($comm === '/show_cl')
                    {
                        addLastText($chat_id, $text);

                        $text_res = getLastText($chat_id)[0];
                        $l_text = $text_res['last_text'];

                        $text_arr = explode(' ', $l_text, 2);

                        $house_id = array_shift($text_arr);

                        $start_month = array_shift($text_arr);
                        $end_month = $start_month;

                        $house_name = getHouseInfo($house_id)[0]['name'];

                        $bookingData = getBookingDataForMonth($start_month, $end_month, $house_id);

                        $datesStrList = formatDatesToRangeStrBot($bookingData);

                        if ($datesStrList)
                        {
                            sendTelegram(
                                'sendMessage',
                                array(
                                    'chat_id' => $chat_id,
                                    'text' => "Забронированные даты:\nДом: " . $house_name . "\n\n" . $datesStrList
                                )
                            );
                        }

                        else
                        {
                            sendTelegram(
                                'sendMessage',
                                array(
                                    'chat_id' => $chat_id,
                                    'text' => 'Нет свободных дат'
                                )
                            );
                        }


                        $comm = " ";
                        $text = " ";
                    }

                    addLastCommand($chat_id, $comm);
                    addLastText($chat_id, $text);

                    break;
                }
            }
        }

        else if ($command === '/closedates' || $command === '/cd' || in_array($lastComm, $closeDatesCommands))
        {
            foreach ($closeDatesCommands as $comm)
            {
                if (!$lastComm || $lastComm == " " || $lastComm == "")
                {
                    if ($chat_id == 647066308 || $chat_id == 1063725677)
                        $lastComm = '/chooseHouse';
                    else
                    {
                        $lastComm = '/closeStartDate';
                        $text = $house_id;
                    }
                }

                if ($comm === $lastComm)
                {
                    if ($comm === '/chooseHouse')
                    {
                        $comm = '/closeStartDate';

                        $houses = getHouses();
                        $housesStrList = formatHousesToListStrBotFormat($houses);

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => "Укажите цифру дома:\n\n0 - Все дома" . $housesStrList
                            )
                        );
                    }

                    else if ($comm === '/closeStartDate')
                    {
                        $comm = '/closeEndDate';

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => 'Укажите дату заезда в формате: ДД.ММ.ГГГГ'
                            )
                        );
                    }

                    else if ($comm === '/closeEndDate')
                    {
                        $comm = '/close';

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => 'Укажите дату выезда в формате: ДД.ММ.ГГГГ'
                            )
                        );
                    }

                    else if ($comm === '/close')
                    {
                        addLastText($chat_id, $text);

                        $text_res = getLastText($chat_id)[0];
                        $l_text = $text_res['last_text'];

                        $text_arr = explode(' ', $l_text, 3);

                        $house_id = array_shift($text_arr);

                        $check_res = checkAvailableBookingDate($text_arr[0], $text_arr[1], $house_id);

                        if ($check_res)
                        {
                            sendTelegram(
                                'sendMessage',
                                array(
                                    'chat_id' => $chat_id,
                                    'text' => 'Не удалось закрыть даты. В указанном диапазоне уже есть забронированные даты. Для закрытия, необходимо указать даты без бронирования'
                                )
                            );
                        }

                        else
                        {
                            $date_in = new DateTime(array_shift($text_arr));
                            $date_out = new DateTime(array_shift($text_arr));

                            $date_in_format = $date_in->format('Y-m-d');
                            $date_out_format = $date_out->format('Y-m-d');

                            $res = addBooking($date_in_format, $date_out_format, '1', '1', '1', '1', '1', '1', '1', $house_id, 2);

                            if ($res)
                            {
                                sendTelegram(
                                    'sendMessage',
                                    array(
                                        'chat_id' => $chat_id,
                                        'text' => 'Даты с ' . $date_in_format . ' по ' . $date_out_format . ' успешно закрыты'
                                    )
                                );
                            }

                            else
                            {
                                sendTelegram(
                                    'sendMessage',
                                    array(
                                        'chat_id' => $chat_id,
                                        'text' => 'Произошла ошибка при закрытии дат. Проверьте корректности введенной информации и повторите с начала'
                                    )
                                );
                            }
                        }

                        $comm = " ";
                        $text = " ";
                    }

                    addLastCommand($chat_id, $comm);
                    addLastText($chat_id, $text);

                    break;
                }
            }
        }

        else if ($command === '/opendates' || $command === '/od' || in_array($lastComm, $openDatesCommands))
        {
            foreach ($openDatesCommands as $comm)
            {
                if (!$lastComm || $lastComm == " " || $lastComm == "")
                {
                    if ($chat_id == 647066308 || $chat_id == 1063725677)
                        $lastComm = '/chooseHouse';
                    else
                    {
                        $lastComm = '/openStartDate';
                        $text = $house_id;
                    }
                }

                if ($comm === $lastComm)
                {
                    if ($comm === '/chooseHouse')
                    {
                        $comm = '/openStartDate';

                        $houses = getHouses();
                        $housesStrList = formatHousesToListStrBotFormat($houses);

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => "Укажите цифру дома:\n\n0 - Все дома" . $housesStrList
                            )
                        );
                    }

                    else if ($comm === '/openStartDate')
                    {
                        $comm = '/openEndDate';

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => 'Укажите дату заезда в формате: ДД.ММ.ГГГГ'
                            )
                        );
                    }

                    else if ($comm === '/openEndDate')
                    {
                        $comm = '/open';

                        sendTelegram(
                            'sendMessage',
                            array(
                                'chat_id' => $chat_id,
                                'text' => 'Укажите дату выезда в формате: ДД.ММ.ГГГГ'
                            )
                        );
                    }

                    else if ($comm === '/open')
                    {
                        addLastText($chat_id, $text);

                        $text_res = getLastText($chat_id)[0];
                        $l_text = $text_res['last_text'];

                        $text_arr = explode(' ', $l_text, 3);

                        $house_id = array_shift($text_arr);

                        $date_in = new DateTime(array_shift($text_arr));
                        $date_out = new DateTime(array_shift($text_arr));

                        $date_in_format = $date_in->format('Y-m-d');
                        $date_out_format = $date_out->format('Y-m-d');

                        $res = openBooking($date_in_format, $date_out_format, $house_id);

                        if ($res)
                        {
                            sendTelegram(
                                'sendMessage',
                                array(
                                    'chat_id' => $chat_id,
                                    'text' => 'Даты с ' . $date_in_format . ' по ' . $date_out_format . ' успешно открыты'
                                )
                            );
                        }

                        else
                        {
                            sendTelegram(
                                'sendMessage',
                                array(
                                    'chat_id' => $chat_id,
                                    'text' => 'Произошла ошибка при открытии дат. Проверьте корректности введенной информации и повторите с начала'
                                )
                            );
                        }

                        $comm = " ";
                        $text = " ";
                    }

                    addLastCommand($chat_id, $comm);
                    addLastText($chat_id, $text);

                    break;
                }
            }
        }
    }

    else
    {
        if ($command === '/start' || $command === '/s')
        {
            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $data['message']['chat']['id'],
                    'text' => 'Привет! Меня зовут "Сонни" и я умный помощник сайта "Сонный залив" (https://sonniyzaliv.ru)'
                )
            );

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $data['message']['chat']['id'],
                    'text' => 'Я помогу Вам управлять Вашей информацией на нашем сайте. Но для начала, я должен убедиться, что мы сотрудничаем с Вами'
                )
            );

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $data['message']['chat']['id'],
                    'text' => 'ID нашего чата: ' . $data['message']['chat']['id'] . '. Сообщите его владельцу сайта "Сонный Залив" для завершения процесса идентификации вашего дома'
                )
            );

            sendTelegram(
                'sendMessage',
                array(
                    'chat_id' => $data['message']['chat']['id'],
                    'text' => 'Как только процесс идентификации будет завершен, вам об этом сообщат и доступ к управлению будет открыт'
                )
            );

            exit();
        }
    }

    if ($command === '/help' || $command === '/h')
    {
        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => '/start или /s - Пройти идентификацию'
            )
        );

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => '/help или /h - Показать список доступных команд'
            )
        );

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => '/reset или /r - Сброс бота'
            )
        );

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => '/showodates или /sod - Показать свободные даты'
            )
        );

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => '/id - Показать идентификатор чата'
            )
        );

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => '/opendates или /od - Открыть указанные даты'
            )
        );

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => '/closedates или /cd - Закрыть указанные даты'
            )
        );

        exit();
    }

    if ($command === '/id')
    {
        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => 'ID нашего чата: ' . $data['message']['chat']['id']
            )
        );

        sendTelegram(
            'sendMessage',
            array(
                'chat_id' => $data['message']['chat']['id'],
                'text' => 'Не при каких условиях не сообщайте данный ID никому кроме нас'
            )
        );

        exit();
    }

//    // Отправка фото.
//    if (mb_stripos($text, 'фото') !== false) {
//        sendTelegram(
//            'sendPhoto',
//            array(
//                'chat_id' => $data['message']['chat']['id'],
//                'photo' => curl_file_create(__DIR__ . '/torin.jpg')
//            )
//        );
//
//        exit();
//    }

//    // Отправка файла.
//    if (mb_stripos($text, 'файл') !== false) {
//        sendTelegram(
//            'sendDocument',
//            array(
//                'chat_id' => $data['message']['chat']['id'],
//                'document' => curl_file_create(__DIR__ . '/example.xls')
//            )
//        );
//
//        exit();
//    }
}