<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';
	
		if(!empty($_POST['fullName']) && !empty($_POST['email']) && !empty($_POST['daysCount']) && !empty($_POST['mobileContact']))
		{	
			$name = htmlspecialchars($_POST['fullName']);
			$email = htmlspecialchars($_POST['email']);
			$daysCount = htmlspecialchars($_POST['daysCount']);
            $mobileContact = htmlspecialchars($_POST['mobileContact']);
			
			if(!empty($_POST['subject']))
				$subject = htmlspecialchars($_POST['subject']);
			
			else
				$subject = "Без темы";
												
			
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
            $mail->addAddress('antonguskov@bk.ru');

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->msgHTML("<p><b>Пользователь хочет приобрести подарочный сертификат!</b></p><hr />- ФИО: $name<br>- Почта: $email<br>- Моб. телефон: $mobileContact<br>- Кол-во суток: $daysCount");
			
			if ($mail->send())				
				$data = "Заявка отправлена успешно!";
			
			else
				$data = "Произошла ошибка при отправке заявки. Попробуйте позже.";
		}
		
		else
			$data = "Заполнены не все обязательные поля!";
		
		echo json_encode($data);	
?>