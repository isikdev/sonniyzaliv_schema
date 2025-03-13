<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';
	
		if(!empty($_POST['fullName']) && !empty($_POST['email']) && !empty($_POST['message'])) 
		{	
			$name= htmlspecialchars($_POST['fullName']);
			$email= htmlspecialchars($_POST['email']);
			$message= htmlspecialchars($_POST['message']);
			
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
            $mail->addAddress('antonguskov@bk.ru');     // Add a recipient

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->msgHTML("<p><b>Новое сообщение с нашего сайта!</b></p><hr />- ФИО: $name<br>- Почта: $email<br>- Тема сообщения: $subject<br>- Сообщение: $message");
			
			if ($mail->send())				
				$data = "Сообщение отправлено успешно!";
			
			else
				$data = "Произошла ошибка при отправке сообщения. Попробуйте позже.";																
		}
		
		else
			$data = "Заполнены не все обязательные поля!";
		
		echo json_encode($data);	
?>