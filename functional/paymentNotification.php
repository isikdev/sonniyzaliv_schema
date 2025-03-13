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

            $booking = getBookingDataByNo($lmi_payment_no);
			
			if ($booking)
			{
                $res = updateBooking($booking['id'], array(
                    'payment_id' => $lmi_sys_payment_id,
                    'pay_date' => $lmi_sys_payment_date,
                    'paid_amount' => $lmi_paid_amount,
                    'paid_currency' => $lmi_paid_currency,
                    'paid_method' => $lmi_payment_method,
                    'paid_hash' => $lmi_hash,
                    'payer_ip' => $lmi_payer_ip_address,
                    'payer_system' => $lmi_payer_system
                ));

                $date_in = $booking['date_in'];
                $date_out = $booking['date_out'];
                $person_count = $booking['person_count'];
                $user_name = $booking['user_name'];
                $user_surname = $booking['user_surname'];
                $mobile_contact = $booking['user_mobile'];
                $email = $booking['email'];

				$subject = 'Внесена предоплата за бронирование!';
				
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
				$mail->msgHTML("<p><b>Произведена предоплата за бронирование</b></p><hr />- Дата заезда: $date_in<br>- Дата выезда: $date_out<br>- Фамилия/Имя: $user_surname $user_name<br>- Моб. номер: $mobile_contact<br>- Эл. почта: $email");
				
				if ($mail->send())				
					$data = "Бронирование произведено успешно! Мы скоро с Вами свяжемся :)";
				
				else
					$data = "Произошла ошибка при бронировании. Попробуйте позже или позвоните нам. Вся информация для связи доступна в разделе 'Контакты'. Код ошибки: 'booking_send_err'. Спасибо за понимание!";	
			}

			else
				$data = "Произошла ошибка при бронировании. Попробуйте позже или позвоните нам. Вся информация для связи доступна в разделе 'Контакты'. Код ошибки: 'db_booking_add_err'. Спасибо за понимание!";
		}
		
		else
			$data = "Заполнены не все обязательные поля!";
		
		echo json_encode($data);	
?>