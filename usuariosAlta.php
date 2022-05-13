<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Academia Pepito</title>
        <link rel="stylesheet" href="./CSS/encabezado.css">
        
        
        <style>
            input{
                margin: 1%;
            }
            input[type=submit]{
                background-color: red;
                color: white;
                font-weight: bold;
                padding: 1%;
                border-radius: 10px;

            }
            input[type=reset]{
                background-color: red;
                color: white;
                font-weight: bold;
                padding: 1%;
                border-radius: 10px;

            }
        </style>

    </head>

    <body>
        <div id="contenedor">
            <header>
                <hgroup>
                    <h1>Academia Pepito</h1>
                    <h2>Alta Usuarios</h2>
                </hgroup>
            </header>
            <main>
            <form action="" method="post">
                <div class="separador">
                    <label for="usuario">Inserte nombre del alumno:</label>
                    <input type="text" id="usuario" name="usuario" pattern="[a-zA-Z ñÑ@]{2,30}"  placeholder="Inserte nombre del alumno"/>
                </div>
                <div class="separador">
                    <label for="contrasenna">Inserte contraseña:</label>
                    <input type="password" id="contrasenna" name="contrasenna" pattern="[0-9a-zA-Z ñÑ@]{4,15}"  placeholder="Inserte contraseña"/>
                </div>
                
                <div class="separador">
                    <input type="submit" name="submit" value="Enviar"/>
                    <input type="reset" name="reset" value="Restablecer"/>
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $nom=$_POST["usuario"];
                    $con=password_hash($_POST["contrasenna"], PASSWORD_DEFAULT, array("cost"=>12));
                    require_once("./PHP/conexion.php");
                    $sql="INSERT into usuarios(usuario, contrasenna) VALUES('$nom','$con')";
                    $resultado=mysqli_query($conexion, $sql);
                    if($resultado){
                        header("location:./index.html");
                    }else{
                        echo"<p>El dato no ha sido dado de alta, verifique.</p>";
                        echo"<a href='./index.html'><button>Ir a index</button></a>";
                    }
                    echo"<p>$nom</p>";
                    echo"<p>$con</p>";
                }
            ?>
            </main>
        </div>
    </body>
</html>