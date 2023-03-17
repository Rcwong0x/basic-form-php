<?php

    require("mail.php");

    function validate($name, $email, $subject, $msg, $form){
        return !empty($name) && !empty($email) && !empty($subject) && !empty($msg);
    }
    function sanitize($data){
       $var = trim($data);
       $var = htmlentities($data);
       return $var;
    }

    $status = "";
    if( isset( $_POST["form"] ) ){
        
        if(validate(...$_POST)){
            $name = sanitize($_POST["name"]);
            $email = sanitize($_POST["email"]);
            $subject = sanitize($_POST["subject"]);
            $msg = sanitize($_POST["msg"]);
            
            $body = "<h2>$name te envía el siguiente mensaje</h2><br>
                        $msg <br>
                    <p>Correo electrónico del remitente: $email </p>";
            
            $response = sendEmail($subject, $body, $email, $name, true);
            
            ($response->sent)? $status = "success" : $status = "danger";
        } else{
            $status = "warning";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos!!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@700&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            gap: 12px;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            width: 100%;
            height: auto;
            min-height: 100vh;
            padding: 24px 0;
            
            background-image: url(./img/background.svg);
            object-fit: cover;
            font-family: 'Sono', sans-serif;
        }
        .alert {
            width: 50%;
            min-width: 320px;
            max-width: 40%;
            padding: 4px 8px;
            border-radius: 8px;
            margin-bottom: 12px;
            font-size: .875rem;
            text-align: center;

        }
        .alert--danger {
            background-color: #FF4444;
        }
        .alert--success  {
            background-color: #00C851;
        }
        .alert--warning {
            background-color: #ffbb33;
        }
        .form-contact {
            width: 50%;
            min-width: 320px;
            max-width: 40%;
            min-height: 400px;
            height: fit-content;
            background-color: white;
            border-radius: 16px;
            padding: 24px;
        }
        .form-contact__title {
            font-size: 1.5rem;
            margin-bottom: 24px;
            text-align: center;
        }
        .form-contact__input-group {
            margin-bottom: 12px;
        }
        .form-contact__label {
            display: inline-block;
            margin-bottom: 8px;
        }
        .form-contact__input{
            display: inline-block;
            width: 100%;
            height: 40px;
            padding: 8px;
            border-radius: 8px;
            border: none;
            background-color: #f4f4f9;
        }
        .form-contact__input--text-area{
            height: 100px;
            resize: none;
        }
        .form-contact__input--sumbit{
            background-color: #6469f5;
            color: white;
            font-weight: bold;
        }
        .footer {
            color: white;
        }
        .footer a{
            color: #d5d8fa;
            text-decoration: none;
            background-color: #818bf5;

        }
        .footer a:hover{
            text-decoration: underline;
            color: white;
        }
    </style>
</head>
<body>
    <?php if($status == "success"): ?>

    <div class="alert alert--success">
        <p><?= $response->msg ?></p>
    </div>

    <?php endif; ?>

    <?php if($status == "warnig"): ?>

    <div class="alert alert--warning">
        <p>Ocurrio un error al validar sus datos</p>
    </div>

    <?php endif; ?>

    <?php if($status == "danger"): ?>  
          
    <div class="alert alert--danger">
        <p><?= $response->msg ?></p>
    </div>

    <?php endif; ?>

    <form class="form-contact" action="./contacto.php" method="post">
        <h1 class="form-contact__title">Contáctanos!!</h1>
        <div class="form-contact__input-group">
            <label class="form-contact__label" for="name">Nombre</label>
            <input class="form-contact__input" type="text" name="name" id="name" required>
        </div>
        <div class="form-contact__input-group">
            <label class="form-contact__label" for="email">Email</label>
            <input class="form-contact__input" type="email" name="email" id="email" required>
        </div>
        <div class="form-contact__input-group">
            <label class="form-contact__label" for="subject">Asunto</label>
            <input class="form-contact__input" type="text" name="subject" id="subject" required>
        </div>
        </div>
        <div class="form-contact__input-group">
            <label for="msg" class="form-contact__label">Mensaje</label>
            <textarea class="form-contact__input form-contact__input--text-area" name="msg" id="msg" cols="30" rows="10" required></textarea>
        </div>
        <input class="form-contact__input form-contact__input--sumbit" type="submit" name="form">
    </form>
    <footer class="footer">
        <p>Coded by <a href="https://github.com/Rcwong0x" target="_blank">Rcwong0x</a></p>
    </footer>
</body>
</html>