<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require("vendor/autoload.php");

    function sendEmail($subject, $body, $email, $name, $html = false){
        try{

            //Configuración del servidor de correos
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.gmail.com';
            $phpmailer->SMTPAuth = true;
            $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $phpmailer->Port = 465;
            $phpmailer->Username = '';
            $phpmailer->Password = '';
            
            //Origen y Destinatario
            $phpmailer->setFrom( $email, $name);
            $phpmailer->addAddress("correodestino@gmail.com"); 
            
            //Content 
            $phpmailer->isHTML($html);  //Set email format to HTML
            $phpmailer->Subject = $subject;
            $phpmailer->Body    = $body;
            

            $sent = $phpmailer->send(); // Try to send the email and get the result
            if (!$sent) {
                $error = "No se pudo enviar el mensaje. Error del correo: {$phpmailer->ErrorInfo}";
                return (object) ["msg" => $error, "sent" => false];
            }
    
            return (object) ["msg" => "El mensaje ha sido enviado exitosamente", "sent" => true];
        } catch (Exception $e) {
            $error = "No se pudo enviar el mensaje. Error del correo: {$e->getMessage()}";
            $phpmailer->ErrorInfo = $error;
            return (object) ["msg" => $error, "sent" => false];
        }
    }
    ?>