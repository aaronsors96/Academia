<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="fichero">Inserte un fichero</label>
        <input type="file" id="fichero" name="fichero">
        <input type="submit" name="submit" value="Enviar...">
    </form>

    <?php
        if(isset($_POST["submit"])){
            $nombreFichero=$_FILES["fichero"]["name"];
            $tamannoFichero=$_FILES["fichero"]["size"];
            $tipoFichero=$_FILES["fichero"]["type"];
            echo"<p>Este es el nombre del fichero:$nombreFichero</p>";
            echo"<p>Este es el tamaño del fichero:$tamannoFichero</p>";
            echo"<p>Este es el tipo del fichero:$tipoFichero</p>";
            //indicar los limites de envio de fichero
            if($tipoFichero=="image/jpeg" ||$tipoFichero =="image/jpg" || $tipoFichero=="image/png" ||$tipoFichero =="image/tiff" || $tipoFichero =="image/webp" ){
                if($tamannoFichero<=2000000){
                    $zona_destino = $_SERVER["DOCUMENT_ROOT"] . "/Tratamiento_de_ficheros/ficheros/";
                    move_uploaded_file($_FILES["fichero"]["tmp_name"],$zona_destino . $nombreFichero);
                    //Visualizar imagen
                    echo "<img src='./ficheros/$nombreFichero' alt='Foto' />";
                }else{
                    echo "<p>El fichero tiene un tamaño excesivo</p>";
                }
            }else{
                echo "<p>Tipo no correcto, verifique.</p>";
            }
        }
    ?>
</body>
</html>