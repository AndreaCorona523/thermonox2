<?php
    $valid = true;
	if(isset($_POST['enviar'])){
        $nombre=$_POST['nombre'];
        if(empty($nombre)){
            echo "<p class='error'>* Agrega tu nombre </p>";
            $valid = false;
        }
    
    }
?>