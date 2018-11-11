<?php
    include('../templates/conn.php');
    /*
    $firstname = strtoupper($_POST['firstname']);
    $surname = strtoupper($_POST['surname']);
    $college = $_POST['college'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $stmt = $conn->prepare('insert into registrants(reg_stud_id, reg_firstName, reg_lastName, reg_email, reg_verificationCode, reg_verified, reg_college, reg_date) values(?, ?, ?, ?, ?, 0, ?, now())');
    $stmt->bind_param('isssss', $id, $firstname, $surname, $email, $verificationcode, $college);
    while(true){
        $verificationcode = crypt(mt_rand(mt_getrandmax() - mt_rand(), mt_getrandmax()));
        $query = 'select count(reg_id) as count from registrants where reg_verificationCode = "'.$verificationcode.'"';
        $count = $conn->query($query)->fetch_object()->count;
        if($count > 0) continue;
        else break;
    }
    $stmt->execute();
    $stmt->close();
    include('../templates/phpqrcode/qrlib.php');
    $dir = '../files';
    $did = $conn->query('select reg_id from registrants where reg_stud_id = '.$id.' and reg_college = "'.$college.'"')->fetch_object()->reg_id;
    $content = 'Database ID: ' . $did . '
Name: ' . $firstname . ' ' . $surname . '
Student ID: ' . $id.'
Email: ' . $email .'
Verification Code: ' . $verificationcode . '
College: ' . $college;
    $filename = $did.'.png';
    $filepath = $dir.'/'.$filename;
    QRcode::png($content, $filepath);
    //echo ($filepath);
    require('../templates/PHPMailer/src/Exception.php');
    require('../templates/PHPMailer/src/PHPMailer.php');
    require('../templates/PHPMailer/src/SMTP.php');
    use PHPMailer\PHPMailer\PHPMailer;
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mx1.hostinger.ph';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@csexpo.tech';                 // SMTP username
        $mail->Password = 'IZzfS&%F4EI6nt5R@mm4';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('info@csexpo.tech', 'CSExpo2k18:APEx Information');
        $mail->addAddress($email);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@csexpo.tech', 'CSExpo2k18:APEx Information');
        #$mail->addCC('cc@example.com');=
        #$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment($filepath, 'qrcode.png');    // Optional name
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'CSExpo2k18: APEx Registration';
        $mail->AddEmbeddedImage($filepath, $did);
        $mail->Body    = "Greetings,<br/><br/><p><strong>Congratulations!</strong> You have successfully registered for the event <b>CSExpo2k18: APEx</b>.</p><br/>Please take note of the following:<br/><ul><b>Location:</b><li>MPR 17th floor of FEU Insitute of Technology Building P. Paredes St., Sampaloc, Manila</li></ul><ul><b>Time:</b><li>09:00 AM Registration</li></ul><ul><b>Contact Numbers:</b><li>09175271266</li><li>09175455819</li></ul><ul><b>Dress code:</b><li>Casual Attire (sandals, shorts, slippers, tattered or ripped jeans are NOT allowed)</li></ul><ul><b>What to bring:</b><li>School ID or Valid ID</li></ul><br/><br/>The QR code below serves as your ticket to the event. Present it to the on-site registration to enter the venue.<br/><img src='cid:$did'><br/>See attached files if you'd like to download your QR code.<br/><br/><br/><small style='color: grey;'><strong>Disclaimer!</strong> This email and its attachments may be confidential and are intented solely for the use of the individual or entity to whom it is addressed.<br/><br/>If you are not the intended recipient of this email and its attachments, you must take no action based upon them, nor must you disseminate, distribute or copy this email. Please contact the sender immediately if you believe you have recieved this email in error.</small>";
        //$mail->AltBody = 'Download the attached image below. It serves as your ticket to the event.';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }*/

    $verificationcode = $_GET['v'];
    $stmt = $conn->prepare('update registrants set reg_verified = 1 where reg_verificationCode = ?');
    $stmt->bind_param('s', $verificationcode);
    $stmt->execute();
    $stmt->close();
    $query = 'select reg_firstName as fname, reg_lastName as lname where reg_verificationCode = "'.$verificationcode.'"';
    $row = $conn->query($query)->fetch_object();
    echo $row->fname . ' ' . $row->lname;
?>