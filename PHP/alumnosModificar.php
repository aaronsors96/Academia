<?php
    require_once("./conexion.php");
    $sql = "SELECT id_alumno, CONCAT(DNI, ' ', nombre_alu, ' ', apellido_alu_1, ' ', apellido_alu_2) AS nombre FROM alumnos";
    $resultado = mysqli_query($conexion, $sql);
?>


<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modificar Alumnos</title>
    <link rel="stylesheet" href="../CSS/encabezado.css" />
    <style>
        form{
            margin-top: 2%;
        }
    </style>
</head>

<body>
    <div id="contenedor">
        <header>
            <hgroup>
                <h1>Academia Pepito</h1>
                <h2>Modificar Alumnos</h2>
            </hgroup>
        </header>

        <main>
            <form action="" method="POST">
                <div class="separador">
                    <label for="alumno">Seleccione alumno</label>
                    <input type="text" list='lista' name='id_alumno' id='id_alumno' />
                    <datalist id='lista'>
                        <?php
                            if($resultado){
                                while($tupla = mysqli_fetch_assoc($resultado)){ 
                                    echo "<option value={$tupla['id_alumno']}>{$tupla['nombre']}</option>";
                                } 
                            }else{
                                header("location:../webs/menuCarreras.html?mensaje=401");
                            }
                        ?>
                    </datalist>
                    <input type="submit" value="Modificar Alumno" name="submit">
                </div>
            </form>
            <?php
                if(isset($_POST["submit"])){
                    $id = $_POST["id_alumno"];
                    $sql = "SELECT a.*, (SELECT nombre FROM carreras WHERE id_carrera = a.id_carrera1) as carrera FROM alumnos as a WHERE a.id_alumno = '$id'";
                    $resultado = mysqli_query($conexion, $sql);
                    if($resultado){
                        $tupla = mysqli_fetch_assoc($resultado);
                        echo "<form action='./alumnosModificarRegistros.php' method='post'>
                        <div class='separador'>
                            <label for='id_alumno'>Identificar</label>
                            <span>{$tupla['id_alumno']}</span>
                            <input type='hidden' id='id_alumno' name='id_alumno' value={$tupla['id_alumno']}>
                        </div>

                        <div class='separador'>
                            <label for='DNI'>Identificar</label>
                            <span>{$tupla['DNI']}</span>
                            <input type='hidden' id='DNI' name='DNI' value={$tupla['DNI']}>
                        </div>

                        <div class='separador'>
                            <label for='nombre_alu'>Nombre Alumno</label>
                            <input type='text' id='nombre_alu' value={$tupla['nombre_alu']} name='nombre_alu'>
                        </div>

                        <div class='separador'>
                            <label for='apellido_alu_1'>Apellido 1 Alumno</label>
                            <input type='text' id='apellido_alu_1' value={$tupla['apellido_alu_1']} name='apellido_alu_1'>
                        </div>

                        <div class='separador'>
                            <label for='apellido_alu_2'>Apellido 2 Alumno</label>
                            <input type='text' id='apellido_alu_2' value={$tupla['apellido_alu_2']} name='apellido_alu_2'>
                        </div>

                        <div class='separador'>
                            <label for='edad_alu'>Edad Alumno</label>
                            <input type='number' id='edad_alu' value={$tupla['edad_alu']} name='edad_alu'>
                        </div>

                        <div class='separador'>
                            <label for='anno_mat_alumno'>Año matriculacion</label>
                            <span>{$tupla['anno_alu']}</span>
                            <input type='hidden' id='anno_alu' name='anno_alu' value={$tupla['anno_alu']}>
                        </div>

                        <div class='separador'>";
                        echo "<label for='genero_alu'>Genero Alumno </label>";

                            if($tupla['genero_alu']=='M'){
                                echo "<label for='genero_alu'>Masculino</label>
                                <input type='radio' name='genero_alu' value='M' checked>
                                <label for='genero_alu'>Femenino</label>
                                <input type='radio' name='genero_alu' value='F' >";
                            }else{
                                echo "<label for='genero_alu'>Masculino</label>
                                <input type='radio' name='genero_alu' value='M'>
                                <label for='genero_alu'>Femenino</label>
                                <input type='radio' name='genero_alu' value='F' checked>";
                            }
                        echo "</div>
                        
                        <div class='separador'>
                            <label for='id_ca'>Selecciona carrera:</label>
                            <select name='id_ca' id='id_ca'>";
                            
                                $sql='SELECT id_carrera, nombre FROM carreras';
                                $resultado=mysqli_query($conexion, $sql);
                                while($tupla1=mysqli_fetch_assoc($resultado)){
                                    if($tupla1['id_carrera'] == $tupla["id_carrera"]){
                                        echo "<option value={$tupla1['id_carrera']} selected>{$tupla1['nombre']}</option>";
                                    }else{
                                        echo "<option value={$tupla1['id_carrera']}>{$tupla1['nombre']}</option>";
                                    };
                                }
                            echo "</select>
                        </div>";

                        //include_once("./alumnosModificarRegistro.php?id_carrera1={$tupla['id_carrera1']}");

                        echo "<div class='separador'>
                            <input type='submit' id='submit' name='submit' value='modificar alumno'>
                            <input type='reset' id='reset' name='reset'>
                        </div>

                        </form>";
                    }else{
                        header("location:../webs/menuAlumnos.html?mensaje=402");
                    }
                }
            ?>
            <a href="../webs/menuAlumnos.html"><button>Volver al menu</button></a>
        </main>
    </div>
</body>

</html>