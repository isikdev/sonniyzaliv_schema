<?php
	require ('functions.php');	

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function

	// Load Composer's autoloader
	require 'PHPMailer/PHPMailerAutoload.php';
	
    if(!empty($_POST['houseName']) && !empty($_POST['location']) && !empty($_POST['placeCount']) && !empty($_POST['ownerName']) && !empty($_POST['email'])
        && !empty($_POST['phone']) && !empty($_POST['ownerWords']) && !empty($_POST['timeIn']) && !empty($_POST['timeOut']) && !empty($_POST['changeTime'])
        && !empty($_POST['bookingRules']) && !empty($_POST['smoking']) && !empty($_POST['trash']) && !empty($_POST['pets']) && !empty($_POST['moreDayAmount']))
    {
        $houseName = htmlspecialchars($_POST['houseName']);
        $location = htmlspecialchars($_POST['location']);
        $placeCount = htmlspecialchars($_POST['placeCount']);

        if (!empty($_POST['subPlaceCount']))
            $subPlaceCount = htmlspecialchars($_POST['subPlaceCount']);

        else
            $subPlaceCount = "";

        if (!empty($_POST['payOptions']))
            $payOptions = htmlspecialchars($_POST['payOptions']);

        else
            $payOptions = "";

        if (!empty($_POST['addServices']))
            $addServices = htmlspecialchars($_POST['addServices']);

        else
            $addServices = "";

        if (!empty($_POST['reviewLink']))
            $reviewLink = htmlspecialchars($_POST['reviewLink']);

        else
            $reviewLink = "";

        $ownerName = htmlspecialchars($_POST['ownerName']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $ownerWords = htmlspecialchars($_POST['ownerWords']);

        if (!empty($_POST['conditions']))
            $conditions = htmlspecialchars($_POST['conditions']);

        else
            $conditions = "";

        $timeIn = htmlspecialchars($_POST['timeIn']);
        $timeOut = htmlspecialchars($_POST['timeOut']);
        $changeTime = htmlspecialchars($_POST['changeTime']);
        $bookingRules = htmlspecialchars($_POST['bookingRules']);
        $smoking = htmlspecialchars($_POST['smoking']);
        $trash = htmlspecialchars($_POST['trash']);
        $pets = htmlspecialchars($_POST['pets']);

        if (!empty($_POST['oneDayAmount']))
            $oneDayAmount = htmlspecialchars($_POST['oneDayAmount']);

        else
            $oneDayAmount = 0;

        $moreDayAmount = htmlspecialchars($_POST['moreDayAmount']);

        if (!empty($_POST['amountArr']))
            $amountArr = htmlspecialchars($_POST['amountArr']);

        else
            $amountArr = "";

        $res = addPlacement($houseName, $location, $placeCount, $subPlaceCount, $payOptions, $addServices, $reviewLink, $ownerName, $email, $phone, $ownerWords, $conditions, $timeIn, $timeOut, $changeTime, $bookingRules, $smoking, $trash, $pets, $oneDayAmount, $moreDayAmount, $amountArr);

        if ($res)
        {
            $subject = 'Новая заявка на размещение жилья!';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->SMTPDebug  = 0;
            $mail->Host       = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'traderoutes@yandex.ru';                     // SMTP username
            $mail->Password   = 'Ant9511QQ';                               // SMTP password
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('traderoutes@yandex.ru', 'Сонный Залив - #BOT');
            $mail->addAddress('sonniyzaliv@yandex.ru');  // Add a recipient
            $mail->addAddress('antonguskov@bk.ru');      // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->msgHTML("<p><b>Информация по заявке:</b></p><hr />- Имя владельца: $ownerName<br>- Эл. почта: $email<br>- Телефон: $phone<br>- Уникальное название: $houseName<br>- Местоположение: $location<br>- Кол-во спальных мест: $placeCount<br>- Кол-во доп. спальных мест: $subPlaceCount<br>- Платные опции: $payOptions<br>- Доп. услуги: $addServices<br>- Ссылка на отзывы: $reviewLink<br>- Слова клиентами от владельца: $ownerWords<br>- Удобства: $conditions<br>- Время заезда: $timeIn<br>- Время заезда: $timeOut<br>- Можно ли сменить время: $changeTime<br>- Особенности бронирования: $bookingRules<br>- Курение: $smoking<br>- Мусор: $trash<br>- Проживание с питомцами: $pets<br>- Цена на 1 сутки: $oneDayAmount<br>- Цена 1 суток (от 2-х суток): $moreDayAmount<br>- Диапазон дат и цен: $amountArr");

            $resMail = $mail->send();

            $uSubject = 'Заявка на размещение жилья успешно отправлена!';

            // Instantiation and passing `true` enables exceptions
            $uMail = new PHPMailer(true);

            //Server settings
            $uMail->CharSet = 'UTF-8';
            $uMail->isSMTP();
            $uMail->SMTPSecure = 'tls';
            $uMail->SMTPDebug = 0;
            $uMail->Host       = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
            $uMail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $uMail->Username   = 'traderoutes@yandex.ru';                     // SMTP username
            $uMail->Password   = 'Ant9511QQ';                               // SMTP password
            $uMail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $uMail->setFrom('traderoutes@yandex.ru', '"Сонный Залив" - Гостевые дома');
            $uMail->addAddress($email);     // Add a recipient

            // Content
            $uMail->isHTML(true);                                  // Set email format to HTML
            $uMail->Subject = $uSubject;
            $uMail->msgHTML("<p><b>Спасибо, за заявку на размещение жилья!</b></p><hr /><p>Для подтверждения заявки мы скоро с Вами свяжемся</p><hr /><br><b>Возникли вопросы?</b><br><br>- Почта: sonniyzaliv@yandex.ru<br>- Телефон: +7 (981) 187-80-02");

            $resUMail = $uMail->send();

            $data = "Заявка создана и отправлена успешно";
        }

        else
            $data = "Произошла ошибка при создании заявки. Попробуйте позже или позвоните нам. Вся информация для связи доступна в разделе 'Контакты'. Спасибо за понимание!";
    }

    else
        $data = "Заполнены не все обязательные поля!";

    echo json_encode($data);
?>