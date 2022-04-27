<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
        
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/php/PHPMailer/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/php/PHPMailer/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/php/PHPMailer/SMTP.php';
    
    require __DIR__.'/vendor/autoload.php';
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    //Define account info
    $username= 'thermonox.proyecto@gmail.com';
    $password= $_ENV['PASSWORD'];

    //open assets for mails
    $sImagen = '../assets/images/thermonox-neu-logo-xl.png';
    $rcss =  __DIR__ . '/mail_assets/formato_correo.css';//upload css file
    $fcss = fopen ($rcss, "r");//open css file
    $scss = fread ($fcss, filesize ($rcss));//read css file 
    fclose ($fcss);//close css file 

    //Set information received from contact form according to language
    if(strcmp($language, 'es')==0){
        $info = "<p><b>Nombre: </b>" . $name . "</p><p><b>Correo Electrónico: </b>" . $email .  "</p><p><b>Asunto: </b>" . $subject .  "</p><p><b>Mensaje: </b>" . $message . "</p><p><b>Tipo de Usuario: </b>" . $user_type . "</p><p><b>Municipio: </b>" . $city;
        $info .= "</p><p><b>Estado: </b>" . $state . "</p><p><b>Código Postal: </b>" . $zip_code . "</p><p><b>País: </b>" . $country . "</p><p><b>Copia Adicional: </b>" . $send_copy . " </p><p><b>Política de privacidad: </b>" . $privacy_policy ."</p>";
        $html_client= __DIR__.'/mail_assets/correo_cliente_es.html';
        $html_admin = __DIR__.'/mail_assets/correo_admin_es.html';
        $name_mail = 'Thermonox Contacto';
        $subject_client = 'Thermonox Contacto Copia Formulario';
        $subject_admin = 'Thermonox Cliente Asunto: ' . $subject;
        $SentMessageTitle= 'CORREO ENVIADO';
        $SentMessageBody= 'Nos podremos en contacto a la brevedad.';
        $ErrorCopyMessage = 'No se pudo enviar la copia del correo';
        $ErrorMessage = 'No se pudo enviar el correo';
        
    }else{
        $info = "<p><b>Name: </b>" . $name . "</p><p><b>Email: </b>" . $email .  "</p><p><b>Subject: </b>" . $subject .  "</p><p><b>Message: </b>" . $message . "</p><p><b>User Type: </b>" . $user_type . "</p><p><b>City: </b>" . $city;
        $info .= "</p><p><b>State: </b>" . $state . "</p><p><b>Zip Code: </b>" . $zip_code . "</p><p><b>Country: </b>" . $country . "</p><p><b>Additional copy: </b>" . $send_copy . " </p><p><b>Privacy Policy: </b>" . $privacy_policy ."</p>";
        $html_client= __DIR__.'/mail_assets/correo_cliente_en.html';
        $html_admin = __DIR__.'/mail_assets/correo_admin_en.html';
        $name_mail = 'Contact Thermonox';
        $subject_client = 'Contact Thermonox Form Copy';
        $subject_admin = 'Thermonox Client Subject: ' . $subject;
        $SentMessageTitle= 'EMAIL SENT';
        $SentMessageBody= 'We will contact you shortly.';
        $ErrorCopyMessage = 'The copy of the email could not be sent';
        $ErrorMessage = 'The email could not be sent';
    }

    //Set boolean if additional copy was requested
    if(($send_copy=='Solicitada') || ($send_copy=='Requested')){
        $send_copy= true;
    }

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
            $mail->Username = $username; // email
            $mail->Password = $password; // password
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

            if ($send_copy){
                try{
                    $mail->setFrom($username, $name_mail); // From email and name
                    $mail->addAddress($email, $name_mail); // to email and name
                    $mail->Subject = $subject_client;
                    $shtml = file_get_contents($html_client); // read html
                    $incss = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml); //replace css in html file
                    $body = str_replace('<p id="message"></p>',$info,$incss); // replace message content
                    $mail->Body = $body; 
                    $mail->send();
                }catch (Exception $e){
                    echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>".$ErrorCopyMessage ."</p><p>". $mail->ErrorInfo. "</p> </div>"; //error message is email copy was not sent
                }   
                
            }
            $mail->ClearAddresses();
            $mail->setFrom($email, $name_mail); // From email and name
            $mail->addAddress($username, $name_mail); // to email and name
            $mail->Subject = $subject_admin;
            $shtml = file_get_contents($html_admin); // read html
            $incss = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml); //replace css in html file
            $body = str_replace('<p id="message"></p>',$info,$incss); // replace message content
            $mail->Body = $body; 

            if($mail->send()){
                echo "<div class='mail_message mail_message-sent'><p class='mail_title'>".$SentMessageTitle."</p> <p>".$SentMessageBody."</p> </div>"; //message is email was sent
            }
        }catch (Exception $e){
            echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>".$ErrorMessage ."</p><p>". $mail->ErrorInfo. "</p> </div>"; //error message is email was not sent
        }
        
    }
?> 