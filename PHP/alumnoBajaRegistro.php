<?php
    $dato = $_GET["id_alumnos"];
    echo "<p>Este es el alumno solicitado para borrar: $dato</p>";
    require_once("./conexion.php");
    //construir la sentencia sql
    $sql = "DELETE FROM alumnos WHERE id_alumno = '$dato'";
    echo "<p>¿Estas seguro de borrar este registro?</p>";
    echo "<a href='?respuesta=Si&id_alumnos=$dato'><button>Estoy seguro</button></a>";
    echo "<a href='?respuesta=No&id_alumnos=$dato'><button>No estoy seguro</button</a>";
    if(isset($_GET["respuesta"])){
        $res=$_GET["respuesta"];
        if($res == "Si"){
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                header("location:../webs/menuAlumnos.html?mensaje=200");
            }else{
                header("location:../webs/menuAlumnos.html?mensaje=201");
            }
        }else{
            header("location:../webs/menuAlumnos.html?mensaje=202");
        }
    }
?>