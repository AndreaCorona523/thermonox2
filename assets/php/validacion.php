<?php
    $valid = true;
	if(isset($_POST['enviar'])){        
        if(empty($name)){
            echo "<p class='error'>* Agrega tu nombre </p>";
            $valid = false;
        }
        if(empty($email)){
            echo "<p class='error'>* Agrega tu correo electrónico </p>";
            $valid = false;
        }else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "<p class='error'>* El correo es incorrecto </p>";
                $valid = false;
            }
        }
        if(empty($subject)){
            echo "<p class='error'>* Agrega tu asunto </p>";
            $valid = false;
        }
        if(empty($message)){
            echo "<p class='error'>* Agrega tu mensaje </p>";
            $valid = false;
        }
        if(empty($city)){
            echo "<p class='error'>* Agrega tu municipio </p>";
            $valid = false;
        }
        if(empty($state)){
            echo "<p class='error'>* Agrega tu estado </p>";
            $valid = false;
        }
        if(empty($zip_code)){
            echo "<p class='error'>* Agrega tu código postal</p>";
            $valid = false;
        }else{
            if(!is_numeric($zip_code)){
                echo "<p class='error'>* El código postal tiene que ser un número</p>";
                $valid = false;
            }
        }
        if(empty($country)){
            echo "<p class='error'>* Agrega tu país</p>";
            $valid = false;
        }

        if(!empty($_POST['send_copy'])){
            $send_copy=$_POST['send_copy'];
        }
        if(!empty($_POST['privacy_policy'])){
            $privacy_policy=$_POST['privacy_policy'];
        }
        
        if($valid){
            include("correo.php");
            
        }
    }
?>


