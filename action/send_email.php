<?php
	include('../templates/conn.php');
	session_start();
	#if(!isset($_SESSION['login']) header('Location: ' . $base_url);
    require('../templates/PHPMailer/src/Exception.php');
    require('../templates/PHPMailer/src/PHPMailer.php');
    require('../templates/PHPMailer/src/SMTP.php');
    use PHPMailer\PHPMailer\PHPMailer;
	$query = 'select reg_id, reg_email from registrants where reg_id >= 124';
	$result = $conn->query($query);
	while($row = $result->fetch_object()){
		try {
			$dir = '../files';
			$id = $row->reg_id;
			$email = $row->reg_email;
			$filename = $id.'.png';
			$filepath = $dir.'/'.$filename;
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			$bool = false;
			//Server settings
			$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'mx1.hostinger.ph';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'info@csexpo.tech';                 // SMTP username
			$mail->Password = 'IZzfS&%F4EI6nt5R@mm4';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
		
			$mail->setFrom('info@csexpo.tech', 'info@csexpo.tech');
			$mail->addReplyTo('info@csexpo.tech', 'info@csexpo.tech');
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'CSExpo2k18: APEx Registration Ticket';
			//Recipients
			$mail->addAddress($email);     // Add a recipient
			#$mail->addAddress('dgabrielablay@gmail.com');     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			
			#$mail->addCC('cc@example.com');=
			$mail->addBCC('info@csexpo.tech');
		
			//Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			$mail->addAttachment($filepath, 'qrcode.png');    // Optional name
		
			$mail->AddEmbeddedImage($filepath, $id);
			$mail->Body    = "Greetings,<br/><br/><p><strong>Congratulations!</strong> You have successfully registered for the event <b>CSExpo2k18: APEx</b>. This email contains your new and valid ticket for the event. We apologize for any confusion this may cause; so, for future reference, disregard previous emails and refer to this email instead.</p><br/>Please take note of the following:<br/><ul><b>Location:</b><li>MPR 17th floor of FEU Insitute of Technology Building P. Paredes St., Sampaloc, Manila</li></ul><ul><b>Time:</b><li>09:00 AM Registration</li></ul><ul><b>Contact Numbers:</b><li>09175271266</li><li>09175455819</li></ul><ul><b>Dress code:</b><li>Casual Attire (sandals, shorts, slippers, tattered or ripped jeans are NOT allowed)</li></ul><ul><b>What to bring:</b><li>School ID or Valid ID</li></ul><br/><br/>The QR code below serves as your ticket to the event. Present it to the on-site registration to enter the venue.<br/><img src='cid:$id'><br/>See attached files if you'd like to download your QR code.<br/><br/><br/><small style='color: grey;'><strong>Disclaimer!</strong> This email and its attachments may be confidential and are intented solely for the use of the individual or entity to whom it is addressed.<br/><br/>If you are not the intended recipient of this email and its attachments, you must take no action based upon them, nor must you disseminate, distribute or copy this email. Please contact the sender immediately if you believe you have recieved this email in error.</small>";
			#$mail->AltBody = 'Download the attached image below. It serves as your ticket to the event.';
		
			if(!$mail->send()) $bool = true;
			$mail->ClearAllRecipients();
			echo 'Message has been sent';
			sleep(2);
		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
	if($bool) echo 'email not sent';
?>