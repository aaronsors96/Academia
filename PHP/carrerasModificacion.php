<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Carrera</title>
        <link rel="stylesheet" href="../CSS/encabezado.css">
        <style>
            form{
                margin-top: 2%;

            }
           
            input[type=submit]{
                margin-top: 2%;
                background-color: red;
                color: white;
                font-weight: bold;
                padding: 1%;
                border-radius: 10px;

            }
            form{
                width: 100%;
                margin: auto;
                
            }
            .modificacion{
                text-align: center;
                margin-top: 2%;
            }
            #carrera{
                margin-top: 2%;
            }
        </style>
    </head>
    <body>
        <div id="contenedor">
            <header>
                <hgroup>
                    <h1>Academia Pepito</h1>
                    <h2>Modificar carrera</h2>
                </hgroup>
            </header>
            <main>
                <form action="" method="POST">

                <div id="separador">
                    <label for="carrera">Seleccione una carrera</label>
                    <select name="carrera" id="carrera">

                    <?php
                        require_once("./conexion.php");
                        $sql="SELECT  * FROM carreras";
                        $resultado=mysqli_query($conexion,$sql);
                        if($resultado){
                            echo"<option value=0>Seleccione una carrera</option>";
                            while($tupla=mysqli_fetch_assoc($resultado)){
                                echo"<option value={$tupla['id_carrera']}> {$tupla['nombre']} </option>";
                            }
                        }else{
                           
                            header("location:../webs/menuCarreras.html?mensaje=401");
                        }
                    ?>
                    </select>
                </div>
                <input type="submit" value="Modificar carrera" name="submit">
                </form>

                <div class="modificacion">
                <?php
                if(isset($_POST["submit"])){
                    $sql= "SELECT * FROM carreras WHERE id_carrera={$_POST['carrera']}";
                    $resultado=mysqli_query($conexion,$sql);
                    if($resultado){
                        $tupla = mysqli_fetch_assoc($resultado);
                        
                        
                        echo "<form action='./modificaciónCarrera.php' method='post'
                                <div class='separador'>
                                    <label for='id_carrera'>Identificador de carrera:</label>
                                    <span>{$tupla['id_carrera']}</span>
                                    <input type='hidden' value={$tupla['id_carrera']} name='id_carrera' id='id_carrera'/>
                                </div>
                                <div class='separador'>
                                    <label for='nombre'>Nombre</label>
                                    <input type='text' value='{$tupla['nombre']}' name='nombre' id='nombre'/>
                                </div>
                                <div class='separador'>
                                    <label for='periodo'>Periodo</label>              
                                    <input type='text' value='{$tupla['periodo']}' name='periodo' id='periodo'/>
                                </div>
                                <input type='submit' value='Modificar carrera'/>
                            </form>";
                    }else{
                        header("location:../webs/menuCarreras.html?mensaje=402");
                    }
                }
                
                ?>
                </div>
            </main>
        </div>
    </body>
</html>