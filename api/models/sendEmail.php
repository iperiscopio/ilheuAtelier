<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require(dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/Exception.php');
    require(dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/PHPMailer.php');
    require(dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/SMTP.php');
    require_once(dirname(__DIR__) . '/models/config.php');
    $config = include(dirname(__DIR__, 2) . '/configvars.php');

    class Email extends Config {

        public function sendEMail($admin, $data) {
            global $config;

            $mail = new PHPMailer();

            $mail->isSMTP();

            $mail->Mailer = "smtp";


            $mail->SMTPDebug = 0;

            $mail->SMTPAuth = true;
            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // <-- using port 587
            
            $mail->CharSet = 'UTF-8';
            
            $mail->Host = $config['MAIL_HOST'];
            $mail->Port = $config['MAIL_PORT'];
            $mail->Username = $config['MAIL_USERNAME'];
            $mail->Password = $config['MAIL_PASS'];

            
            $mail->setFrom($admin[0]["email"], 'Ilhéu Atelier');

            $mail->addAddress($data["email"], $data["name"]);

            $mail->addReplyTo($admin[0]["email"], 'Ilhéu Atelier');

            $mail->Subject = $data["subject"];

            $mail->msgHTML($data["message"]);

            for ($i= 0; $i < count($data["attachments"]); $i++) { 

                $mail->addAttachment($data["attachments"][$i]);
                
            }
            
            if (!$mail->send()) {

                echo 'Mailer Error: ' . $email->ErrorInfo;
                return false;

            } else {

                return true;
            }
        }
    }

    