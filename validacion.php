<?php
    $valid = true;
	if(isset($_POST['enviar'])){        
        if(empty($nombre)){
            echo "<p class='error'>* Agrega tu nombre </p>";
            $valid = false;
        }
        if(empty($correo_electronico)){
            echo "<p class='error'>* Agrega tu correo electrónico </p>";
            $valid = false;
        }else{
            if(!filter_var($correo_electronico,FILTER_VALIDATE_EMAIL)){
                echo "<p class='error'>* El correo es incorrecto </p>";
                $valid = false;
            }
        }
        if(empty($asunto)){
            echo "<p class='error'>* Agrega tu asunto </p>";
            $valid = false;
        }
        if(empty($mensaje)){
            echo "<p class='error'>* Agrega tu mensaje </p>";
            $valid = false;
        }
        if(empty($municipio)){
            echo "<p class='error'>* Agrega tu municipio </p>";
            $valid = false;
        }
        if(empty($estado)){
            echo "<p class='error'>* Agrega tu estado </p>";
            $valid = false;
        }
        if(empty($cod_post)){
            echo "<p class='error'>* Agrega tu código postal</p>";
            $valid = false;
        }else{
            if(!is_numeric($cod_post)){
                echo "<p class='error'>* El código postal tiene que ser un número</p>";
                $valid = false;
            }
        }
        if(empty($pais)){
            echo "<p class='error'>* Agrega tu país</p>";
            $valid = false;
        }

        if(!empty($_POST['copia_adicional'])){
            $copia_adicional=$_POST['copia_adicional'];
        }
        if(!empty($_POST['politica_privacidad'])){
            $politica_privacidad=$_POST['politica_privacidad'];
        }
        
        if($valid){
            include("correo.php");
        }
    }
?>


