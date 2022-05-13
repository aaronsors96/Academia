<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Baja Carreras</title>
        <link rel="stylesheet" href="../CSS/encabezado.css"/>
        <link rel="stylesheet" href="../CSS/tablas.css"/>
    </head>
    <body>
    <div id="contenedor">
        <header>
            <hgroup>
                <h1>ACADEMIA PATO</h1>
                <h2>Baja Alumnos</h2>
            </hgroup>
            <div>
                <input type="text" id="buscar" />
            </div>
        </header>
        <main>
        <?php
            //comunicarme con mysql -> servidor
            $conexion = mysqli_connect("localhost", "root", "");
            //preveer conexion fallida
            if(mysqli_connect_errno()){
                echo "<p>Error 1: conexion fallida con el servidor, verifique.</p>";
                exit();
            }
            require_once("./conexion.php");

            $sql = "SELECT * FROM alumnos";
            $resultado = mysqli_query($conexion, $sql);
            echo "<table>
                    <tr>
                        <th>ID Alumno</th>
                        <th>DNI</th>
                        <th>Nombre del Alumno</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Dar bajas</th>
                    </tr>
                    <tbody id='tabla'>";
                while($tupla = mysqli_fetch_row($resultado)){
                    echo "<tr><td>" . $tupla[0] . "</td>" .
                    "<td>" . $tupla[1] . "</td>" .
                    "<td>" . $tupla[2] . "</td>" .
                    "<td>" . $tupla[3] . "</td>" .
                    "<td>" . $tupla[4] . "</td>" .
                    "<td><a href='./alumnoBajaRegistro.php?id_alumnos=" . $tupla[0] . "'><button>Eliminar</button></a></td></tr>";
                }
            echo "</tbody></table>";
            if(!$resultado){
                header("location: ../webs/menuAlumnos.html?mensaje=300");
            }
        ?>
            <a href="../webs/menuAlumnos.html"><button>Volver al Menú del Alumno</button></a>
            <div id="panelInformativo"></div>
        </main>
    </div>
        
    </body>
</html>