<?php
	require ('functions.php');	

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function

	// Load Composer's autoloader
	require 'PHPMailer/PHPMailerAutoload.php';
	
    if(!empty($_POST['LMI_MERCHANT_ID']) && !empty($_POST['LMI_PAYMENT_NO']) && !empty($_POST['LMI_SYS_PAYMENT_ID'])
        && !empty($_POST['LMI_SYS_PAYMENT_DATE']) && !empty($_POST['LMI_PAYMENT_AMOUNT']) && !empty($_POST['LMI_CURRENCY'])
        && !empty($_POST['LMI_PAID_AMOUNT']) && !empty($_POST['LMI_PAID_CURRENCY']) && !empty($_POST['LMI_PAYMENT_METHOD'])
        && !empty($_POST['LMI_PAYMENT_DESC']) && !empty($_POST['LMI_HASH']) && !empty($_POST['LMI_PAYER_IP_ADDRESS'])
        && !empty($_POST['LMI_PAYMENT_SYSTEM']))
    {
        $lmi_merchant_id = htmlspecialchars($_POST['LMI_MERCHANT_ID']);
        $lmi_payment_no = htmlspecialchars($_POST['LMI_PAYMENT_NO']);
        $lmi_sys_payment_id = htmlspecialchars($_POST['LMI_SYS_PAYMENT_ID']);
        $lmi_sys_payment_date = htmlspecialchars($_POST['LMI_SYS_PAYMENT_DATE']);
        $lmi_payment_amount = htmlspecialchars($_POST['LMI_PAYMENT_AMOUNT']);
        $lmi_currency = htmlspecialchars($_POST['LMI_CURRENCY']);
        $lmi_paid_amount = htmlspecialchars($_POST['LMI_PAID_AMOUNT']);
        $lmi_paid_currency = htmlspecialchars($_POST['LMI_PAID_CURRENCY']);
        $lmi_payment_method = htmlspecialchars($_POST['LMI_PAYMENT_METHOD']);
        $lmi_payment_desc = htmlspecialchars($_POST['LMI_PAYMENT_DESC']);
        $lmi_hash = htmlspecialchars($_POST['LMI_HASH']);
        $lmi_payer_ip_address = htmlspecialchars($_POST['LMI_PAYER_IP_ADDRESS']);
        $lmi_payer_system = htmlspecialchars($_POST['LMI_PAYMENT_SYSTEM']);

        $booking = getBookingDataByPayNo($lmi_payment_no)[0];

        if ($booking)
        {
            $book_id = $booking['id'];

            $res = addBookingDetails($book_id, [
                'LMI_SYS_PAYMENT_ID' => $lmi_sys_payment_id,
                'LMI_SYS_PAYMENT_DATE' => $lmi_sys_payment_date,
                'LMI_PAID_AMOUNT' => $lmi_paid_amount,
                'LMI_PAID_CURRENCY' => $lmi_paid_currency,
                'LMI_PAYMENT_METHOD' => $lmi_payment_method,
                'LMI_HASH' => $lmi_hash,
                'LMI_PAYER_IP_ADDRESS' => $lmi_payer_ip_address,
                'LMI_PAYMENT_SYSTEM' => $lmi_payer_system
            ]);

            $book_res = updateBookingPayStatus($book_id, 2);

            $date_in = $booking['date_in'];
            $date_out = $booking['date_out'];
            $person_count = $booking['person_count'];
            $user_name = $booking['user_name'];
            $user_surname = $booking['user_surname'];
            $mobile_contact = $booking['phone_number'];
            $email = $booking['email'];
            $house_address = $booking['house_address'];

            $house_id = $booking['house_id'];

            $subject = $lmi_payment_no . ' - внесена предоплата за бронирование!';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->SMTPSecure = 'tls';
            $mail->SMTPDebug = 0;
            $mail->Host       = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'traderoutes@yandex.ru';                     // SMTP username
            $mail->Password   = 'Ant9511QQ';                               // SMTP password
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('traderoutes@yandex.ru', 'Sonniy Zaliv #BOT');
            $mail->addAddress('sonniyzaliv@yandex.ru');     // Add a recipient
            $mail->addAddress('antonguskov@bk.ru');     // Add a recipient

            if ($house_id == 5)
                $mail->addAddress('nukuttalahti@yandex.ru');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->msgHTML("<p><b>$lmi_payment_no - Произведена предоплата за бронирование!</b></p><hr />- Дата заезда: $date_in<br>- Дата выезда: $date_out<br>- Количество человек: $person_count<br>- Фамилия Имя: $user_surname $user_name<br>- Моб. номер: $mobile_contact<br>- Эл. почта: $email<br>- Cтатус платежа: Платеж выполнен");

            $mail->send();

            $uSubject = $lmi_payment_no . ' - предоплата за бронирование успешно произведена!';

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
            $uMail->setFrom('traderoutes@yandex.ru', 'Sonniy Zaliv #BOT');
            $uMail->addAddress($email);     // Add a recipient

            // Content
            $uMail->isHTML(true);                                  // Set email format to HTML
            $uMail->Subject = $subject;
            $uMail->msgHTML("<p><b>$lmi_payment_no - Спасибо за бронирование гостевого дома!</b></p><hr />- Дата и время заезда: $date_in после 15:00<br>- Дата и время выезда: $date_out до 12:00<br>- Количество человек: $person_count<br>- Адрес дома: $house_address<br><hr /><br><p>Летом будет открыто много доп услуг, которых нет зимой.</p><p>Состав дополнительных необязательных услуг:<br><br>✅Аренда Лодки вёсельной 🚣♀️ -2500 на весь период<br>✅Аренда электромотора с аккумулятором к лодке - 2500 на весь период<br>✅аренда купели с аэромассажем, подогревом, фильтрацией кварцевым песком и ультрафиолетом, и подсветкой - 2500 на весь срок аренды<br>✅дровяная баня у наших друзей в деревянном срубе с веником и карельским чаем (до 4 человек) 2500-3500 за 3 часа</p><br><br><b>Возникли вопросы?</b><br><br>- Почта: sonniyzaliv@yandex.ru<br>- Телефон: +7 (981) 187-80-02");

            $uMail->send();
        }
    }

    else
        header('Location: /');
?>