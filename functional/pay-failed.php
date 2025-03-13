<?php
	require ('functions.php');	

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function

	// Load Composer's autoloader
	require 'PHPMailer/PHPMailerAutoload.php';
	
    if(!empty($_POST['LMI_MERCHANT_ID']) && !empty($_POST['LMI_PAYMENT_NO']))
    {
        $lmi_merchant_id = htmlspecialchars($_POST['LMI_MERCHANT_ID']);
        $lmi_payment_no = htmlspecialchars($_POST['LMI_PAYMENT_NO']);

        $booking = getBookingDataByPayNo($lmi_payment_no)[0];

        if ($booking)
        {
            $book_id = $booking['id'];

            $book_res = updateBookingPayStatus($book_id, 3);

            $date_in = $booking['date_in'];
            $date_out = $booking['date_out'];
            $person_count = $booking['person_count'];
            $user_name = $booking['user_name'];
            $user_surname = $booking['user_surname'];
            $mobile_contact = $booking['phone_number'];
            $email = $booking['email'];

            $subject = $lmi_payment_no . ' - отмена предоплаты за бронирование!';

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

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->msgHTML("<p><b>$lmi_payment_no - произведена отмена предоплаты за бронирование!</b></p><hr />- Дата заезда: $date_in<br>- Дата выезда: $date_out<br>- Количество человек: $person_count<br>- Фамилия Имя: $user_surname $user_name<br>- Моб. номер: $mobile_contact<br>- Эл. почта: $email<br>- Cтатус платежа: Платеж отменен");

            $mail->send();

            $uSubject = $lmi_payment_no . ' - отмена предоплаты за проживание в гостевом доме!';

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
            $uMail->msgHTML("<p><b>$lmi_payment_no - вы произвели отмену бронирования гостевого дома!</b></p><hr />- Дата заезда: $date_in<br>- Дата выезда: $date_out<br>- Количество человек: $person_count<br>- Номер брони: $lmi_payment_no");

            $uMail->send();
        }
    }

    header('Location: /');
?>