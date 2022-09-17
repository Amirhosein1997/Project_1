<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include_once 'connect.php';
include_once 'jdf.php';
include_once 'functions.php';

function send_email($info,$file){
$email=$info['email'];
$title=$info['subject'];
$text=$info['text'];
$file_loc=upload_pics($file,"email/email_files/");
$pdo=connect_db();
$query=$pdo->prepare("insert into send_email_tbl(email, subject, text, file) VALUES ('$email','$title','$text','$file_loc')");
$query->execute();



//Load Composer's autoloader
    require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'kingofstone4@gmail.com';                     //SMTP username
        $mail->Password = 'afazxesnptfbarrx';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kingofstone4@gmail.com', 'mailer');
        $mail->addAddress($email);     //Add a recipient


        //Attachments
        $mail->addAttachment($file_loc);         //Add attachments


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = $text;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



}






?>

