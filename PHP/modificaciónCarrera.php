<?php
    $id=$_POST["id_carrera"];
    $no=depurar($_POST["nombre"]);
    $pe=depurar($_POST["periodo"]);
    require_once("./conexion.php");

    function depurar($dato){
        $dato=strip_tags($dato);
        $dato=trim($dato);
        $dato=htmlentities($dato);
        return $dato;
    }

    $sql = "UPDATE carreras SET nombre = '$no', periodo = '$pe' WHERE id_carrera = '$id'";
    $resultado=mysqli_query($conexion, $sql);

    if($resultado){
        header("location:../webs/menuCarreras.html?mensaje400");
        //echo "ok";
    }else{
        header("location:../webs/menuCarreras.html?mensaje403");
        //echo "nok";
    }
?>