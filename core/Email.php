<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('vendor/autoload.php');



class Email {

    private $name;
    private $email;

    function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
        $this->setNewsletter($name,$email);
    }


    public function setNewsletter($name, $email){

        //Creo una instancia, paso TRUE habilito excepciones
            $mail = new PHPMailer(true);               

            try {
            //Configuracion del Servidor   
            $mail->SMTPDebug  =  0; //SMTP::DEBUG_SERVER;                //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'contact@2kceltics.xyz';                //SMTP username
            $mail->Password   = 'Aixakuki01?';                          //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


             //Recipients
            $mail->setFrom('contact@2kceltics.xyz', '2kceltics');   // Quien envia el email
            $mail->addReplyTo('contact@2kceltics.xyz', '2kceltics'); 
            $mail->addAddress($this->email);                //Add a recipient. Destinatario
            
            //Envio de archivos
            /*                       
             //Attachments
            $email->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $email->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            */

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '2kceltics Newsletter';
            $mail->Body    = 'You register to 2kceltics Newsletter has been accepted. Thank you ' . $this->name . " your email is " . $this->email;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            }catch(Exception $e){
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }

}



function newsletter(string $name, string $email) {

try {
    $mail = new PHPMailer(true);  
    $mail->SMTPDebug  =  0; //SMTP::DEBUG_SERVER;                //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'contact@2kceltics.xyz';                //SMTP username
            $mail->Password   = 'Aixakuki01?';                          //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;
            $mail->setFrom('contact@2kceltics.xyz', '2kceltics');   // Quien envia el email
            $mail->addReplyTo('contact@2kceltics.xyz', '2kceltics'); 
            $mail->addAddress($email);                //Add a recipient. Destinatario
            
            //Envio de archivos
            /*                       
             //Attachments
            $email->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $email->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            */

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '2kceltics Newsletter';
            $mail->Body    = 'You register to 2kceltics Newsletter has been accepted. Thank you ' . $name . " your email is " . $email;
            //    $email->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

        }catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>