<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/encabezado.css">
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
    <script>
        window.onload = iniciar;
        function iniciar(){
            escuchar();
        }
        function escuchar(){
            let tInputs = document.querySelectorAll("input");
            for (let i = 0; i<tInputs.length-2; i++){
               tInputs[i].addEventListener("blur", validar); 
            }      
        }
        function validar(e){
            let campo = e.target.id;
            switch(campo){
                case "nombre":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
                        e.target.focus();
                        break;
                    }        
                case "duracion":
                    if(!e.target.checkValidity()){
                        verError("El campo duracion no cumple los paramertos, verifique");
                        e.target.focus();
                        break;
                    }
            }
        }

        function verError(mensaje){
            let panel = document.getElementById("panelInformativo");
            panel.innerHTML=mensaje;
            panel.style.display="block";
            setTimeout(function(){
                panel.style.display="none";
            })
        }
    </script>
</head>
<body>
    <div id="contenedor">
        <header>
            <hgroup>
                <h1>Academia Pepito</h1>
                <h2>Alta de Carreras</h2>
            </hgroup>
        </header>
        <main>
            <form action="" method="post">
                <div class="separador">
                    <label for="">Inserte nombre de la carrera:</label>
                    <input type="text" id="nombre" name="nombre" pattern="[a-zA-Z ñÑ]{2,30}" required placeholder="Inserte nombre de carrera"/>
                </div>
                <div class="separador">
                    <label for="duracion">Años para finalizar la carrera</label>
                    <input type="number" id="duracion" name="duracion" pattern="/[0-9]/{1}/" required />
                </div>
                <div class="separador">
                    <input type="submit" name="submit" value="Enviar"/>
                    <input type="reset" name="reset" value="Restablecer"/>
                </div>
            </form>
            <div id="panelInformativo"></div>
            <a href="../webs/menuCarreras.html"><button id="volver">Volver al menú principal</button></a>
        </main>

        <?php
            if(isset($_POST["submit"])){
                $nombre=$_POST["nombre"];
                $duracion=$_POST["duracion"];
                require_once("./conexion.php");
               
                $sql = "INSERT INTO carreras (nombre, periodo) VALUES ('$nombre', '$duracion')";
                $resultado=mysqli_query($conexion, $sql);
                if($resultado){
                    header("location:../webs/menuCarreras.html?mensaje=100");
                }else{
                    header("location:../webs/menuCarreras.html?mensaje=101");
                }
            }
        ?>

    </div>
</body>
</html>