<?php
	require ('functions.php');	

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function

	// Load Composer's autoloader
	require 'PHPMailer/PHPMailerAutoload.php';
	
		if(!empty($_POST['dateIn']) && !empty($_POST['emailContact']) && !empty($_POST['dateOut']) && !empty($_POST['personCount']) && !empty($_POST['totalCost'])
            && !empty($_POST['preOrderCost']) && !empty($_POST['userName']) && !empty($_POST['userSurname']) && !empty($_POST['mobileContact']) && !empty($_POST['house_id']) && !empty($_POST['houseName']))
		{	
			$date_in = htmlspecialchars($_POST['dateIn']);
			$date_out = htmlspecialchars($_POST['dateOut']);

			$person_count = htmlspecialchars($_POST['personCount']);

			$totalCost = htmlspecialchars($_POST['totalCost']);
            $preOrderCost = htmlspecialchars($_POST['preOrderCost']);

            $userName = htmlspecialchars($_POST['userName']);
            $userSurname = htmlspecialchars($_POST['userSurname']);

            $mobileContact = htmlspecialchars($_POST['mobileContact']);
            $email = htmlspecialchars($_POST['emailContact']);

            $house_id = htmlspecialchars($_POST['house_id']);
            $house_name = htmlspecialchars($_POST['houseName']);

			$res = addBooking($date_in, $date_out, $email, $person_count, $mobileContact, $userName, $userSurname, $totalCost, $preOrderCost, $house_id, 1,1);
			
			if ($res)
			{
				$subject = 'Информация по бронированию!';
				
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
				$mail->msgHTML("<p><b>Информация по бронированию гостевого дома $house_name!</b></p><hr />- Гостевой дом: $house_name<br>- Номер бронирования: $res<br>- Дата заезда: $date_in<br>- Дата выезда: $date_out<br>- Количество человек: $person_count<br>- Итоговая стоимость бронирования: $totalCost<br>- Стоимость предоплаты: $preOrderCost<br>- Фамилия Имя: $userSurname $userName<br>- Моб. номер: $mobileContact<br>- Эл. почта: $email<br>- Cтатус платежа: Ожидание платежа");

				$resMail = $mail->send();

                $uSubject = 'Заявка на бронирование успешно отправлена!';

                $house_info = getHouseInfo($house_id);
                $house_address = $house_info[0]['address'];

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
                $uMail->msgHTML("<p><b>Спасибо, за заявку на бронирование гостевого дома!</b></p><hr />- Номер заявки: <b>$res</b><br>- Гостевой дом: <b>$house_name</b><br>- Адрес дома: <b>$house_address</b><br>- Дата заезда: <b>$date_in</b><br>- Дата выезда: <b>$date_out</b><br>- Количество человек: <b>$person_count</b><br>- Итоговая стоимость бронирования: <b>$totalCost</b><br>- Стоимость предоплаты: <b>$preOrderCost</b><p><b><u>!!! Обращаем ваше внимание, что бронь возвратная при отмене не менее чем за 14 суток до заезда.<br>При отмене менее чем за 14 суток, бронь НЕ ВОЗРАЩАЕТСЯ</u></b></p><hr /><br><b>Возникли вопросы?</b><br><br>- Почта: sonniyzaliv@yandex.ru<br>- Телефон: +7 (981) 187-80-02");

                $resUMail = $uMail->send();

                $data = "Бронирование произведено успешно! Мы скоро с Вами свяжемся :)";
            }

			else
				$data = "Произошла ошибка при бронировании. Попробуйте позже или позвоните нам. Вся информация для связи доступна в разделе 'Контакты'. Код ошибки: 'db_booking_add_err'. Спасибо за понимание!";
		}
		
		else
			$data = "Заполнены не все обязательные поля!";
		
		echo json_encode(['message' => $data, 'pay_no' => $res]);
?>