<?php

	namespace PHPMailer\PHPMailer;
    
//Import PHPMailer classes into the global namespace
//use PHPMailer;
require '/storage/ssd4/506/10170506/public_html/Code/PHPMailer/PHPMailer.php';
include 'emails.txt';
include '/storage/ssd4/506/10170506/public_html/graphs/datacenter/settings.txt';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465; //587
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "iotholden@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "gmholdenIoT01";
//Set who the message is to be sent from
$mail->setFrom('iotholden@gmail.com', 'Holden IoT');
//Set an alternative reply-to address
$mail->addReplyTo('callum.jones@gm.com', 'Callum Jones');
//$mail->addReplyTo('mike.anwar@gm.com', 'Mike Anwar');

for ($i = 0; $i<sizeof($emails); $i++){
    $mail->addAddress($emails[$i]);
}

//Set who the message is to be sent to
//$mail->addAddress('mike.anwar@gm.com', 'Mike Anwar');
//$mail->addAddress('callum.jones17@hotmail.com', 'Callum Jones');
//Set the subject line
$mail->Subject = 'Holden IoT - Main Data Centre Temperature and Humidity Alert';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//Replace the plain text body with one created manually
$mail->Body = "<p> For the last 30 minutes temp/humid has been above ".$max_temp_threshold."/".$max_hum_threshold.", it is currently: ".$_GET["temp"]."/".$_GET["hum"]."</p>";
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}




















}







?>

<p>Something is wrong with the XAMPP installation :-()</p>
<p>Username: zDFNi4fKBG</p> 
<p>Database: zDFNi4fKBG</p>

