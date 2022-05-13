<?php

    $conexion = mysqli_connect("localhost", "root", "");
        //preveer que se puede dar un error a la hora de establecer contacto con el servidor
        if(mysqli_connect_errno()){
            echo "<p>Error 1: Conexion erronea con el servidor, verifique.</p>";
            exit();
        }
        //comunicar con la BBDD
        mysqli_select_db($conexion, "ibecon3_2022") or die ("<p>Error 2:No se comunica con la BBDD, verifique</p>");
?>


