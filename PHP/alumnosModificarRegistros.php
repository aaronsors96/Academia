<?php
    
    $id_alummno = $_POST["id_alumno"];
    $DNI=$_POST["DNI"];
    $nombre = $_POST["nombre_alu"];
    $apellido1 = $_POST["apellido_alu_1"];
    $apellido2 = $_POST["apellido_alu_2"];
    $edad = $_POST["edad_alu"];
    $anno_mat = $_POST["anno_alu"];
    $genero = $_POST["genero_alu"];
    $id_ca = $_POST["id_ca"];

    require_once("./conexion.php");
    function depurar($dato){
        $dato = strip_tags($dato);
        $dato = trim($dato);
        $dato = htmlentities($dato);
        return $dato;
    }
    $sql = "UPDATE alumnos SET DNI='$DNI', nombre_alu = '$nombre', apellido_alu_1 = '$apellido1', apellido_alu_2 = '$apellido2', edad_alu = '$edad', anno_alu = '$anno_mat', genero_alu = '$genero', id_carrera1 = '$id_ca' WHERE id_alumno = '$id_alummno'";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
        header("location:../webs/menuAlumnos.html?mensaje=400");
        
    }else{
        header("location:../webs/menuAlumnos.html?mensaje=403");
    }
?>