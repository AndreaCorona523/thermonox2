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

    //open assets for mails
  
    //$sImagen = 'mail_assets/thermonox-neu-logo-xl.png';
    $sImagen = '../assets/images/thermonox-neu-logo-xl.png';
    $rcss =  __DIR__ . '/mail_assets/formato_correo.css';//upload css file
    $fcss = fopen ($rcss, "r");//open css file
    $scss = fread ($fcss, filesize ($rcss));//read css file 
    fclose ($fcss);//close css file 

    //Set information received from contact form
    $info = "<p><b>Nombre: </b>" . $name . "</p><p><b>Correo Electrónico: </b>" . $email .  "</p><p><b>Asunto: </b>" . $subject .  "</p><p><b>Mensaje: </b>" . $message . "</p><p><b>Tipo de Usuario: </b>" . $user_type . "</p><p><b>Municipio: </b>" . $city;
    $info .= "</p><p><b>Estado: </b>" . $state . "</p><p><b>Código Postal: </b>" . $zip_code . "</p><p><b>País: </b>" . $country . "</p><p><b>Copia Adicional: </b>" . $send_copy . " </p><p><b>Política de privacidad: </b>" . $privacy_policy ."</p>";
    
    //Define account info
    $username= 'thermonox.proyecto@gmail.com';
    //$password= 'thermonox-1';
    $password= $_ENV['PASSWORD'];

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

            if ($send_copy=='Solicitada'){
                try{
                    $mail->setFrom($username, 'Thermonox Contacto'); // From email and name
                    $mail->addAddress($email, 'Thermonox Contacto'); // to email and name
                    $mail->Subject = 'Thermonox Contacto Copia Formulario ';
                    $shtml = file_get_contents(__DIR__.'/mail_assets/correo_cliente.html'); // read html
                    $incss = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml); //replace css in html file
                    $body = str_replace('<p id="message"></p>',$info,$incss); // replace message content
                    $mail->Body = $body; 
                    $mail->send();
                }catch (Exception $e){
                    echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>No se pudo enviar la copia del correo.</p><p>". $mail->ErrorInfo. "</p> </div>";
                }   
                
            }
            $mail->ClearAddresses();
            $mail->setFrom($email, 'Thermonox Contacto'); // From email and name
            $mail->addAddress($username, 'Thermonox Contacto'); // to email and name
            $mail->Subject = 'Thermonox Cliente Asunto: ' . $subject;
            $shtml = file_get_contents(__DIR__.'/mail_assets/correo_empresa.html'); // read html
            $incss = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml); //replace css in html file
            $body = str_replace('<p id="message"></p>',$info,$incss); // replace message content
            $mail->Body = $body; 

            if($mail->send()){
                echo "<div class='mail_message mail_message-sent'><p class='mail_title'>CORREO ENVIADO</p> <p>Nos podremos en contacto a la brevedad.</p> </div>";
            }
        }catch (Exception $e){
            echo "<div class='mail_message mail_message-error'><p class='mail_title'>ERROR</p> <p>No se pudo enviar el correo</p><p>". $mail->ErrorInfo. "</p> </div>";
        }
        
    }
?> 