<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/encabezado.css">
    <link rel="stylesheet" href="../CSS/table.css">
    <script>
        window.onload=iniciar;
        function iniciar(){
            document.getElementById("buscar").addEventListener("keyup", fBuscar);
        }
        function fBuscar() {
        // Declaración de variables
        var input, filter, table, tr, td, i, j, visible;

        input  = document.getElementById("buscar");
        filter = input.value.toUpperCase();
        table  = document.getElementById("tabla");
        tr     = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                visible = false;
                /* Obtenemos todas las celdas de la fila, no sólo la primera */
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        visible = true;
                    }
                }
                if (visible === true) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<body>
    <div id="contenedor">
        <header>
            <hgroup>
                <h1>Academia Pepito</h1>
                <h2>Baja Carreras</h2>
            </hgroup>
            <div>
                <label for="buscar">Escriba la carrera que quiere buscar: </label>
                <input type="text" id="buscar" onfocus=""/>
                
            </div>
        </header>
        <main>
        <?php
            //comunicarme con mysql --> mariaDB
            $conexion = mysqli_connect("localhost", "root", "");
            //preveer que se puede dar un error a la hora de establecer contacto con el servidor
            if(mysqli_connect_errno()){
                echo "<p>Error 1: Conexion erronea con el servidor, verifique.</p>";
            }
            //comunicar con la BBDD
            mysqli_select_db($conexion, "ibecon3_2022") or die ("<p>Error 2:No se comunica con la BBDD, verifiquelo</p>");

            //contruir la sentencia sql
            $sql = "SELECT * FROM carreras";
            $resultado=mysqli_query($conexion, $sql);
            echo "<table><tr>
                            <th>ID Carrera</th>
                            <th>Nueva Carrera</th>
                            <th>Periodo de formación</th>
                            <th>Operación</th>
                        </tr>
                        <tbody id='tabla'>";
            while($tupla=mysqli_fetch_row($resultado)){
                echo"<tr><td>" .$tupla[0] . "</td>" .
                        "<td>" .$tupla[1] . "</td>" .
                        "<td>" .$tupla[2] . "</td>" . 
                        "<td><a href='./carrerasBajaRegistro.php?id_carrera=" . $tupla[0] . "'><button>Borrar</button></a></td></tr>";
            }
            echo "</tbody></table>";
            if(!$resultado==true){
                header("location:../webs/menuCarreras.html?mensaje=100");
            }
        ?>    
            <a href="../webs/menuCarreras.html"><button id="volver">Volver al menú principal</button></a>
        </main>

        
    </div>
</body>
</html>