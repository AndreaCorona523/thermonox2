    <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require $_SERVER['DOCUMENT_ROOT'] . '/assets/PHPMailer/Exception.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/assets/PHPMailer/PHPMailer.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/assets/PHPMailer/SMTP.php';

        //open assets for mails
        $sImagen = 'assets/images/thermonox-neu-logo-xl.png';
        $rcss = "assets/css/formato_correo.css";//upload css file
        $fcss = fopen ($rcss, "r");//open css file
        $scss = fread ($fcss, filesize ($rcss));//read css file 
        fclose ($fcss);//close css file 

        //Set information received from contact form
        $info = "<p><b>Nombre: </b>" . $nombre . "</p><p><b>Correo Electrónico: </b>" . $correo_electronico .  "</p><p><b>Asunto: </b>" . $asunto .  "</p><p><b>Mensaje: </b>" . $mensaje . "</p><p><b>Tipo de Usuario: </b>" . $tipo_usuario . "</p><p><b>Municipio: </b>" . $municipio;
        $info .= "</p><p><b>Estado: </b>" . $estado . "</p><p><b>Código Postal: </b>" . $cod_post . "</p><p><b>País: </b>" . $pais . "</p><p><b>Copia Adicional: </b>" . $copia_adicional . " </p><p><b>Política de privacidad: </b>" . $politica_privacidad ."</p>";

        //Send mails 
        if(isset($_POST['enviar'])){
        try{
                $mail = new PHPMailer(true);
                $mail->isSMTP(); 
                $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
                $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
                $mail->Port = 587; // TLS only
                $mail->SMTPSecure = 'tls'; // ssl is deprecated
                $mail->SMTPAuth = true;
                $mail->Username = 'andycorona04@gmail.com'; // email
                $mail->Password = 'cuatro_08'; // password
                $mail->CharSet = 'UTF-8'; // Use special characters
                $mail->AddEmbeddedImage($sImagen, 'logo'); //embedded image
                
                $mail->AltBody = 'HTML messaging not supported'; 
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                if ($copia_adicional=='Solicitada'){
                    try{
                        $mail->setFrom('andycorona04@gmail.com', 'Thermonox Contacto'); // From email and name
                        $mail->addAddress($correo_electronico, 'Thermonox Contacto'); // to email and name
                        $mail->Subject = 'Thermonox Contacto Copia Formulario ';
                        $shtml = file_get_contents('correo_cliente.html'); // read html
                        $incss = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml); //replace css in html file
                        $body = str_replace('<p id="mensaje"></p>',$info,$incss); // replace message content
                        $mail->Body = $body; 
                        $mail->send();
                    }catch (Exception $e){
                        echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>No se pudo enviar la copia del correo.</p><p>". $mail->ErrorInfo. "</p> </div>";
                    }   
                    
                }

                $mail->setFrom($correo_electronico, $nombre); // From email and name
                $mail->addAddress( 'andycorona04@gmail.com', 'Thermonox Contacto'); // to email and name
                $mail->Subject = 'Thermonox Cliente Asunto: ' . $asunto;
                $shtml = file_get_contents('correo_empresa.html'); // read html
                $incss = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml); //replace css in html file
                $body = str_replace('<p id="mensaje"></p>',$info,$incss); // replace message content
                $mail->Body = $body; 

                if($mail->send()){
                    echo "<div class='mail_message mail_message-sent'><p class='mail_title'>CORREO ENVIADO</p> <p>Nos podremos en contacto a la brevedad.</p> </div>";
                }
            }catch (Exception $e){
                echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>No se pudo enviar el correo</p><p>". $mail->ErrorInfo. "</p> </div>";
            }
            
        }
    ?> 