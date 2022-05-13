
<?php
    $dato=$_GET["id_carrera"];
    require_once("./conexion.php");
    
    //contruir la sentencia sql
    $sql = "DELETE FROM carreras WHERE id_carrera='$dato'";
    echo"<p>¿Desea realmente borrar el registro?</p>";
    echo "<a href='?respuesta=si&id_carrera=$dato'><button>Sí</button></a>";
    echo "<a href='?respuesta=no&id_carrera=$dato'><button>No</button></a>";
    if(isset($_GET["respuesta"])){
        $res = $_GET["respuesta"];
        if($res == "si"){
            $resultado=mysqli_query($conexion, $sql);
            if($resultado){
                header("location:../webs/menuCarreras.html?mensaje=200");
            }else{
                header("location:../webs/menuCarreras.html?mensaje=201");
            }         
        }else{
            header("location:../webs/menuCarreras.html?mensaje=202");
        }
    }


?>
