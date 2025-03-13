<?php
	require ('cardb.php');
	require ('settings/car_internal_settings.php');

	date_default_timezone_set("Europe/Moscow");

	function createOrder($data)
    {
        if (!$data['chatId'] || !$data['orderTypeId'] || !$data['regionId']) return false;

        // данные из входящего массива
        $chatId = $data['chatId'];                                   // id чата
        $orderType = $data['orderTypeId'];                           // тип объявления (1 - покупка / 2 - продажа)
        $regionId = $data['regionId'];                               // id региона
        $carNumber = $data['carNumber'] ?: null;                     // автомобильный номер
        $price = $data['price'] ?: null;                             // цена
        $isOverweight = $data['isOverweight'] ?: null;               // включен ли перевес (Да / Нет)
        $photoFileName = $data['photoFileName'] ?: null;             // фотография
        $commentary = $data['commentary'] ?: null;                   // доп. информация (комментарий)
        $orderText = $data['orderText'] ?: null;                     // текст объявления
        $phoneNumber = $data['phoneNumber'] ?: null;                 // номер телефона

        // текущая дата и время и автор создания записи
        $currentDatetime = date('Y-m-d H:i:s');
        $createUserId = 1;
        $deleted = 0;

        // ищем аналогичное объявление, уже созданное. Чтоб не плодить дубли
        if ($orderType == 1)
        {
            $order = R::findOne('orders', 'chat_id = ? AND type_id = ? AND region_id = ? AND text = ? AND deleted = ?',
                array($chatId, $orderType, $regionId, $orderText, $deleted));
        }
        else
        {
            $order = R::findOne('orders', 'chat_id = ? AND type_id = ? AND region_id = ? AND car_number = ? AND price = ? AND deleted = ?',
                array($chatId, $orderType, $regionId, $carNumber, $price, $deleted));
        }

        // возвращаем найденное объявление
        if ($order) return $order;

        // создаем экземпляр объекта таблицы 'orders'
        $order = R::dispense('orders');

        // заполняем объект свойствами
        $order->chat_id = $chatId;
        $order->type_id = $orderType;
        $order->region_id = $regionId;
        $order->car_number = $carNumber;
        $order->price = $price;
        $order->is_overweight = $isOverweight;
        $order->photo = $photoFileName;
        $order->commentary = $commentary;
        $order->text = $orderText;
        $order->phone_number = $phoneNumber;
        $order->status_id = 1;
        $order->create_datetime = $currentDatetime;
        $order->create_user_id = $createUserId;

        // сохраняем объект
        return R::store($order);
    }

    function getOrderById($orderId)
    {
        if (!$orderId) return false;

        $deleted = 0;

        $orderInfo = R::findOne('orders', 'id = ? AND deleted = ?', array($orderId, $deleted));

        if (!$orderInfo)
            return false;

        return $orderInfo;
    }

    function changeOrderStatus($orderId, $statusId, $reasonText = null)
    {
        if (!$orderId || !$statusId || ($statusId === 4 && !$reasonText)) return false;

        $currentDatetime = date('Y-m-d H:i:s');
        $modifyUserId = 1;
        $deleted = 0;

        // ищем объявление
        $order = R::findOne('orders', 'id = ? AND deleted = ?', array($orderId, $deleted));

        // выход, если не нашлась
        if (!$order) return false;

        $order->status_id = $statusId;
        $order->reason_text = $reasonText;
        $order->modify_user_id = $modifyUserId;
        $order->modify_datetime = $currentDatetime;

        // Сохраняем объект
        return R::store($order);
    }

	function getGroupModeratorsChatId($regionId)
    {
        if (!$regionId)
            return false;

        $settingId = 2;
        $deleted = 0;

        $moderators = R::getAll('SELECT uc.chat_id FROM users_chats uc WHERE uc.id = (SELECT ubs.user_chat_id FROM userbotsettings ubs WHERE ubs.setting_id = ? AND ubs.deleted = ? AND ubs.value = (SELECT gr.group_id FROM groups_regions gr WHERE gr.region_id = ? AND gr.deleted = ?))', array($settingId, $deleted, $regionId, $deleted));

        if (!$moderators)
            return false;

        return $moderators;
    }

    function getUserInfoByChatId($chatId)
    {
        if (!$chatId)
            return false;

        $deleted = 0;

        $userInfo = R::getAll('SELECT u.id, ur.role_id FROM users u INNER JOIN users_roles ur ON u.id = ur.user_id INNER JOIN users_chats uc ON uc.user_id=u.id WHERE uc.deleted = ? AND uc.chat_id = ?', array($deleted, $chatId));

        if (!$userInfo)
            return false;

        return $userInfo;
    }

    function getLetters()
    {
        $deleted = 0;

        $lettersInfo = R::getAll('SELECT l.id, l.name FROM letters l WHERE l.deleted = ? ORDER BY l.name ASC', array($deleted));

        if (!$lettersInfo)
            return false;

        return $lettersInfo;
    }

    function getNumbers()
    {
        $deleted = 0;

        $numbersInfo = R::getAll('SELECT n.id, n.name FROM numbers n WHERE n.deleted = ? ORDER BY n.name ASC', array($deleted));

        if (!$numbersInfo)
            return false;

        return $numbersInfo;
    }

    function getCodesByRegionId($regionId)
    {
        $deleted = 0;

        $codesInfo = R::getAll('SELECT c.id, c.name FROM codes c INNER JOIN codes_regions cr ON c.id = cr.code_id WHERE c.deleted = ? AND cr.deleted = ? AND cr.region_id = ?', array($deleted, $deleted, $regionId));

        if (!$codesInfo)
            return false;

        return $codesInfo;
    }

    function getGroupsByRegionId($regionId)
    {
        $deleted = 0;

        $groupInfo = R::getAll('SELECT g.id, g.name, g.url FROM groups g INNER JOIN groups_regions gr ON g.id = gr.group_id WHERE g.deleted = ? AND gr.deleted = ? AND gr.region_id = ?', array($deleted, $deleted, $regionId));

        if (!$groupInfo)
            return false;

        return $groupInfo;
    }

    function getRegions()
        {
            $deleted = 0;

            $regionsInfo = R::getAll('SELECT r.id, r.name FROM regions r WHERE r.deleted = ? ORDER BY r.name ASC', array($deleted));

            if (!$regionsInfo)
                return false;

            return $regionsInfo;
        }

    function getRegionInfo($regionId)
    {
        $deleted = 0;

        $regionInfo = R::findOne('regions', 'id = ? AND deleted = ?', array($regionId, $deleted));

        if (!$regionInfo)
            return false;

        return $regionInfo;
    }

    function getOrderTypeInfo($orderTypeId)
    {
        $deleted = 0;

        $orderTypeInfo = R::findOne('orders_types', 'id = ? AND deleted = ?', array($orderTypeId, $deleted));

        if (!$orderTypeInfo)
            return false;

        return $orderTypeInfo;
    }

    function checkUserRole($userRoleId, $roleId)
    {
        if (!$userRoleId || !$roleId) return false;

        return $userRoleId == $roleId;
    }

    function addBotLastText($chatId, $text, $delimiter = "~")
    {
        $currentDatetime = date('Y-m-d H:i:s');
        $modifyUserId = 1;

        $actions = R::findOne('userbotactions', 'chat_id = ?', [$chatId]);

        // Чистим пробелы в конце и начале
        if ($text != ' ')
            $text = trim($text);

        if (!$text) return false;

        // Создаем новую запись, если не нашлась
        if (!$actions)
            return createBotLastText($chatId, $text);

        $db_tex = $actions->last_text;

        if ($text == ' ' || (empty($actions->last_text) || $actions->last_text == " " || $actions->last_text == "" || is_null($actions->last_text)))
            $actions->last_text = $text;

        else
            $actions->last_text = $db_tex . $delimiter . $text;

        $actions->modify_user_id = $modifyUserId;
        $actions->modify_datetime = $currentDatetime;

        // Сохраняем объект
        return R::store($actions);
    }

    function createBotLastText($chatId, $text)
    {
        if (!$chatId || !$text) return false;

        // Чистим пробелы в конце и начале
        if ($text != ' ')
            $text = trim($text);

        // Текущая дата и время и автор создания записи
        $currentDatetime = date('Y-m-d H:i:s');
        $createUserId = 1;

        // Создаем экземпляр объекта таблицы 'userbotactions'
        $actions = R::dispense('userbotactions');

        // Заполняем объект свойствами
        $actions->chat_id = $chatId;
        $actions->last_text = $text;
        $actions->create_datetime = $currentDatetime;
        $actions->create_user_id = $createUserId;

        // Сохраняем объект
        return R::store($actions);
    }

    function addBotLastCommand($chatId, $command)
    {
        $currentDatetime = date('Y-m-d H:i:s');
        $modifyUserId = 1;

        // Чистим пробелы в конце и начале
        if ($command != ' ')
            $text = trim($command);

        $actions = R::findOne('userbotactions', 'chat_id = ?', [$chatId]);

        // Создаем новую запись, если не нашлась
        if (!$actions)
            return createBotLastCommand($chatId, $command);

        // Обращаемся к свойству объекта и назначаем ему новое значение
        $actions->last_comm = $command;
        $actions->modify_user_id = $modifyUserId;
        $actions->modify_datetime = $currentDatetime;

        // Сохраняем объект
        return R::store($actions);
    }

    function createBotLastCommand($chatId, $command)
    {
        if (!$chatId || !$command) return false;

        // Чистим пробелы в конце и начале
        if ($command != ' ')
            $text = trim($command);

        // Текущая дата и время и автор создания записи
        $currentDatetime = date('Y-m-d H:i:s');
        $createUserId = 1;

        // Создаем экземпляр объекта таблицы 'userbotactions'
        $actions = R::dispense('userbotactions');

        // Заполняем объект свойствами
        $actions->chat_id = $chatId;
        $actions->last_comm = $command;
        $actions->create_datetime = $currentDatetime;
        $actions->create_user_id = $createUserId;

        // Сохраняем объект
        return R::store($actions);
    }

    function getBotLastCommand($chatId)
    {
        $deleted = 0;

        $command = R::getAll('SELECT uba.id, uba.last_comm FROM userbotactions uba WHERE uba.deleted = ? AND uba.chat_id = ?', array($deleted, $chatId));

        if (!$command)
            return false;

        return $command;
    }

    function getBotLastText($chatId)
    {
        $deleted = 0;

        $text = R::getAll('SELECT uba.id, uba.last_text FROM userbotactions uba WHERE uba.deleted = ? AND uba.chat_id = ?', array($deleted, $chatId));

        if (!$text)
            return false;

        return $text;
    }

    function writeLog($message, $level = "info")
    {
        if (!WRITE_LOG) return false;

        // Пишем содержимое в файл,
        // используя флаг FILE_APPEND для дописывания содержимого в конец файла
        // и флаг LOCK_EX для предотвращения записи данного файла кем-нибудь другим в данное время
        return file_put_contents(LOG_PATH, "\n" . $message, FILE_APPEND | LOCK_EX);
    }

    function createImageLink($photoFileName)
    {
        if (!$photoFileName)
            return false;

        //return '<a href="' . IMAGES_LINK . $photoFileName . '">&#8205;</a>';

        return IMAGES_LINK . $photoFileName;
    }
?>