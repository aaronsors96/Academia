<!DOCTYPE html>
<html lang="es-ES">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta de Alumnos</title>
        <link rel="stylesheet" href="../CSS/encabezado.css">
        <link rel="stylesheet" href="../CSS/table.css">
        
    </head>
    <body>
        <div id="contenedor">
            <header>
                <hgroup>
                    <h1>Academia Pepito</h1>
                    <h2>Consulta Alumnos</h2>
                </hgroup>
                <div>
                <input type="text" id="buscar" >
                <!-- <input type="button" value="buscar" id="fBuscar"> -->
                </div>
            </header>
            <main>
            <?php
                    require_once("./conexion.php");
                    //construir la sentencia sql
                    $sql = "SELECT a.*, (SELECT nombre FROM carreras WHERE id_carrera = a.id_carrera1) as carrera FROM alumnos as a";
                    $resultado = mysqli_query($conexion, $sql);
                    echo "<table><tr>
                                    <th>Id Alumno</th>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellido 1</th>
                                    <th>Apellido 2</th>
                                    <th>Edad</th>
                                    <th>Año Matriculacion</th>
                                    <th>Genero</th>
                                    <th>Id Carrera</th>
                                    <th>Nombre Carrera</th>
                                </tr>
                                <tbody id='tabla'>";
                    while($tupla = mysqli_fetch_row($resultado)){
                        echo    "<tr><td>" . $tupla[0] . "</td>" .
                                "<td>" . $tupla[1] . "</td>" .
                                "<td>" . $tupla[2] . "</td>" .
                                "<td>" . $tupla[3] . "</td>" .
                                "<td>" . $tupla[4] . "</td>" .
                                "<td>" . $tupla[5] . "</td>" .
                                "<td>" . $tupla[6] . "</td>" .
                                "<td>" . $tupla[7] . "</td>" .
                                "<td>" . $tupla[8] . "</td>" .
                                "<td>" . $tupla[9] . "</td>" .
                                "</tr>";
                    }
                    echo "</tbody></table>";
                    if(!$resultado){
                        header("location:../webs/menuAlumnos.html?mensaje=300");
                    }
                    
                ?>
                <a href="../webs/menuAlumnos.html"><button>Volver al menu</button></a>
                <div id="panelInformativo"></div>
            </main>
            
        </div>
    </body>
</html>