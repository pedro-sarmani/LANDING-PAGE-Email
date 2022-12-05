<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\POP3;
    use PHPMailer\PHPMailer\OAuth;
    use PHPMailer\PHPMailer\OAuthTokenProvider;
    use PHPMailer\PHPMailer\SMTP;

    require "./PHPMailer/src/PHPMailer.php";
    require "./PHPMailer/src/SMTP.php";
    require "./PHPMailer/src/Exception.php";
    require "./PHPMailer/src/OAuth.php";
    require "./PHPMailer/src/OAuthTokenProvider.php";
    require "./PHPMailer/src/POP3.php";

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'landingford1@gmail.com';                     //SMTP username
        $mail->Password   = 'ehcmrgppvhwegwov';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('landingford1@gmail.com', 'Ford');
        $mail->addAddress($email, $nome);     //Add a recipient
        $mail->addReplyTo($email, $nome);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Proposta Ford';
        $mail->Body    =  "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Proposta</title>
            </head>
            <body>
                <h1>Obrigado pela sua proposta</h1>
                <p>Agradecemos a sua escolha, tenha um ótimo dia!</p>
            </body>
            </html>
            ";
        if ($modelo == "Novo Fit"){
            $mail->AddEmbeddedImage('C:/xampp/htdocs/LANDING-PAGE/img/novo-fit-grande.png', 'C:/xampp/htdocs/LANDING-PAGE/img/favicon.ico');
        }
        else if ($modelo == "Honda Civic"){
            $mail->AddEmbeddedImage('C:/xampp/htdocs/LANDING-PAGE/img/honda-civic-grande.png', 'C:/xampp/htdocs/LANDING-PAGE/img/favicon.ico');
        }
        else if ($modelo == "Honda CR-V"){
            $mail->AddEmbeddedImage('C:/xampp/htdocs/LANDING-PAGE/img/honda-crv-grande.png', 'C:/xampp/htdocs/LANDING-PAGE/img/favicon.ico');
        }
        else if ($modelo == "Honda City"){
            $mail->AddEmbeddedImage('C:/xampp/htdocs/LANDING-PAGE/img/honda-city-grande.png', 'C:/xampp/htdocs/LANDING-PAGE/img/favicon.ico');
        }
        $mail->AltBody = 'Error';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>