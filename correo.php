<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require $_SERVER['DOCUMENT_ROOT'] . '/assets/PHPMailer/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/PHPMailer/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/PHPMailer/SMTP.php';

    if(isset($_POST['enviar'])){
        $body = "Nombre: " . $nombre . "<br>Correo: " . $correo_electronico .  "<br>Asunto: " . $asunto .  "<br>Mensaje: " . $mensaje .  "<br>Municipio: " . $municipio;
        $body .= "<br>Estado: " . $estado . "<br>Codigo Postal: " . $cod_post . "<br> Pais: " . $pais . "<br>Copia Adicional: " . $copia_adicional . "<br>Politica de privacidad " . $politica_privacidad;
        try{
            $body_copy = "Muchas gracias por contactarse con nosotros.<br><br>Le adjuntamos una copia de su formulario: <br><br>";
            $body_copy .= $body;
            $body_copy .= "<br><br>Nos pondremos en contacto a la brevedad. <br><br>Atte. <br>Servicio a Clientes ThermoNox";
            if ($copia_adicional=='activada'){
                try{
                    $mail_copy = new PHPMailer(true);
                    $mail_copy->isSMTP(); 
                    $mail_copy->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
                    $mail_copy->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
                    $mail_copy->Port = 587; // TLS only
                    $mail_copy->SMTPSecure = 'tls'; // ssl is deprecated
                    $mail_copy->SMTPAuth = true;
                    $mail_copy->Username = 'andycorona04@gmail.com'; // email
                    $mail_copy->Password = 'cuatro_08'; // password
                    $mail_copy->setFrom('andycorona04@gmail.com', 'Thermonox Contacto'); // From email and name
                    $mail_copy->addAddress($correo_electronico, 'Thermonox Contacto'); // to email and name
                    $mail_copy->Subject = 'Thermonox Contacto Copia Formulario ';
                    $mail_copy->msgHTML($body_copy); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                    $mail_copy->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
                    // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
                    $mail_copy->SMTPOptions = array(
                                        'ssl' => array(
                                            'verify_peer' => false,
                                            'verify_peer_name' => false,
                                            'allow_self_signed' => true
                                        )
                                    );
                    $mail_copy->send();
                }catch (Exception $e){
                    echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>No se pudo enviar la copia del correo.</p><p>". $mail->ErrorInfo. "</p> </div>";
                }   
                
            }

            $mail = new PHPMailer(true);
            $mail->isSMTP(); 
            $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
            $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
            $mail->Port = 587; // TLS only
            $mail->SMTPSecure = 'tls'; // ssl is deprecated
            $mail->SMTPAuth = true;
            $mail->Username = 'andycorona04@gmail.com'; // email
            $mail->Password = 'cuatro_08'; // password
            $mail->setFrom($correo_electronico, $nombre); // From email and name
            $mail->addAddress( 'andycorona04@gmail.com', 'Thermonox Contacto'); // to email and name
            $mail->Subject = 'Thermonox Cliente Asunto: ' . $asunto;
            $mail->msgHTML($body); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
            $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
            // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
            $mail->SMTPOptions = array(
                                'ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );
            if($mail->send()){
                echo "<div class='mail_message mail_message-sent'><p class='mail_title'>CORREO ENVIADO</p> <p>Nos podremos en contacto a la brevedad.</p> </div>";
            }
        }catch (Exception $e){
            echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>No se pudo enviar el correo</p><p>". $mail->ErrorInfo. "</p> </div>";
        }
        
    }
?> 