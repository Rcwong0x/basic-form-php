# Proyecto: Formulario de Contacto con PHPMailer
Este proyecto tiene como objetivo integrar la librería PHPMailer para crear un formulario de contacto funcional que envíe correos electrónicos a través de un servidor SMTP.

# Configuración
Asegúrate de tener la librería PHPMailer instalada. Puedes instalarla mediante Composer ejecutando el siguiente comando:
```bash
composer require phpmailer/phpmailer
```

En el archivo mail.php la sección de configuración del servidor de correos esta dentro de la función sendEmail(), asegúrate de reemplazar los siguientes valores con la información correspondiente:

'smtp.gmail.com' - Reemplaza con el servidor SMTP que desees utilizar.
'' - Reemplaza con tu dirección de correo electrónico de origen.
'' - Reemplaza con la contraseña de tu cuenta de correo electrónico de origen.
'correodestino@gmail.com' - Reemplaza con la dirección de correo electrónico del destinatario (parametro).
Uso
Para enviar un correo electrónico desde tu formulario de contacto, puedes llamar a la función sendEmail() pasando los siguientes parámetros:

$subject - El asunto del correo electrónico.
$body - El contenido del correo electrónico.
$email - La dirección de correo electrónico del remitente.
$name - El nombre del remitente.
$html (opcional) - Un valor booleano que indica si el contenido del correo electrónico es HTML (predeterminado: false).
La función sendEmail() intentará enviar el correo electrónico y devolverá un objeto con las siguientes propiedades:

msg - Un mensaje indicando el resultado del envío.
sent - Un valor booleano que indica si el correo electrónico se envió correctamente.
En caso de que haya algún error durante el envío del correo electrónico, se proporcionará información adicional en la propiedad msg del objeto devuelto.

Nota: Asegúrate de tener habilitado el acceso de aplicaciones menos seguras en la configuración de tu cuenta de correo electrónico si estás utilizando una cuenta de Gmail como servidor SMTP.
