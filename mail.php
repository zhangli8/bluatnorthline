<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;
// 从info@panorama-holdings.com
//发到bluatnorthline@panorama-holdings.com 
//再copy bluatnorthline@gmail.com

$zfn 		= $_POST['zfn'];
$zln 		= $_POST['zln'];
$zmail 		= $_POST['zmail'];
$zphone 	= $_POST['zphone'];
$zunit 		= $_POST['zunit'];
$zdate		= $_POST['zdate'];
$zmessage 	= $_POST['zmessage'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mxhichina.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@panorama-holdings.com';                 // SMTP username
$mail->Password = 'Carolina1';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('info@panorama-holdings.com', 'BLU-Message');
$mail->addAddress('bluatnorthline@panorama-holdings.com');     // Add a recipient
$mail->addAddress('bluatnorthline@gmail.com');
$mail->addAddress('bluatnorthline@greystar.com');
$mail->addAddress('zhangli@halfrin.com'); 
//$mail->addAddress('zhangli@halfrin.com');             // Name is optional
//$mail->addReplyTo('online@halfrin.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $zfn.$zln;
$mail->Body    ='First Name:'.$zfn.'<br>'.
				'Last Name:'.$zln.'<br>'.
				'Email:'.$zmail.'<br>'.
				'Phone:'.$zphone.'<br>'.
				'Unit Size Desired:'.$zunit.'<br>'.
				'Move-In Date:'.$zdate.'<br>'.
				'Message:'.$zmessage.'<br>';

$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location:http://www.bluatnorthline.com/");
}