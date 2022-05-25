<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';

$data = $_POST;

$html = "<h2>Greetings Admin,</h2>

            <p>A new contact has received. Following are the details :</p>

            <table class='table'>
                <tr>
                    <td>Name:</td>
                    <td>".$data['name']."</td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td>".$data['email']."</td>
                </tr>
                <tr>
                    <td>Message :</td>
                    <td>".$data['form-message']."</td>
                </tr>
                <tr>
                    <td>Date :</td>
                    <td>".date('d M, Y')."</td>
                </tr>
            </table>

            <br><br>    
            Thanks,<br>";
            //Mail::to(env('ADMIN_EMAIL'))->send(new NewSampleRequest($data));


// SMTP //
$mail = new PHPMailer(true);
  
try {
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = 'devshariq2712@gmail.com';
    $mail->Password = 'ermyazvyntbuwxea';
  
    $mail->setFrom('devshariq2712@gmail.com', 'Shariq');           
    $mail->addAddress('devshariq2712@gmail.com');
    // $mail->addAddress('receiver2@gfg.com', 'Name');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'New Contact Message received';
    $mail->Body    = $html;
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();

    header("location:index.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// End SMTP //