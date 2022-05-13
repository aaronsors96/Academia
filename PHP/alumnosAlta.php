<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/encabezado.css">
    <script src="../js/mensajeriaMenuAlumnos.js"></script>
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
                case "DNI":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
                        e.target.focus();
                        break;
                    }        
                case "nombre_alu":
                    if(!e.target.checkValidity()){
                        verError("El campo duracion no cumple los paramertos, verifique");
                        e.target.focus();
                        break;
                    }
                case "apellido_alu_1":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
                        e.target.focus();
                        break;
                    } 
                case "apellido_alu_2":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
                        e.target.focus();
                        break;
                    }
                case "edad_alu":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
                        e.target.focus();
                        break;
                    }
                case "anno_alu":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
                        e.target.focus();
                        break;
                    }
                case "genero_alu":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
                        e.target.focus();
                        break;
                    }
                case "id_carrera1":
                    if(!e.target.checkValidity()){
                        verError("El campo nombre no cumple los parametros establecidos, verifique");
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
                <h2>Alta de Alumnos</h2>
            </hgroup>
        </header>
        <main>
            <form action="" method="post">
                <div class="separador">
                    <label for="DNI">Inserte DNI del alumno:</label>
                    <input type="text" id="DNI" name="DNI" pattern="[0-9a-zA-Z ñÑ]{2,30}" required placeholder="Inserte DNI del alumno"/>
                </div>
                <div class="separador">
                    <label for="nombre">Inserte nombre del alumno:</label>
                    <input type="text" id="nombre" name="nombre" pattern="[a-zA-Z ñÑ]{2,30}" required placeholder="Inserte nombre del alumno"/>
                </div>
                <div class="separador">
                    <label for="apellido1">Inserte primer apellido:</label>
                    <input type="text" id="ape1" name="ape1" pattern="[a-zA-Z ñÑ]{2,30}" required placeholder="Inserte primer apellido:"/>
                </div>
                <div class="separador">
                    <label for="apellido2">Inserte segundo apellido:</label>
                    <input type="text" id="ape2" name="ape2" pattern="[a-zA-Z ñÑ]{2,30}" required placeholder="Inserte segundo apellido:"/>
                </div>
                <div class="separador">
                    <label for="edad">Inserte edad:</label>
                    <input type="number" id="edad" name="edad" pattern="/[0-9]/{2}/" required placeholder="Inserte edad:"/>
                </div>
                
                <div class="separador">
                    <label for="genero">Inserte su género:</label>
                        <label for="hombre">Hombre</label>
                        <input type="radio" id="generohombre" name="genero" value="M" checked/>
                        <label for="mujer">Mujer</label>
                        <input type="radio" id="generomujer" name="genero" value="F"/>
                </div>
                
                <div class="separador">
                    <label for="idcarrera">Seleccione su carrera</label>
                    <select name="idcarrera" id="idcarrera">
                        <?php
                           require_once("./conexion.php");
                            $sql="SELECT * FROM carreras";
                            $resultado=mysqli_query($conexion, $sql);
                            while($tupla=mysqli_fetch_assoc($resultado)){
                                echo "<option value={$tupla['id_carrera']}>{$tupla['nombre']}</option>";
                            }
                        ?>
                    </select>
                </div>
            
                <div class="separador">
                    <input type="submit" name="submit" value="Enviar"/>
                    <input type="reset" name="reset" value="Restablecer"/>
                </div>
            </form>

            <div id="panelInformativo"></div>
            <a href="../webs/menuAlumnos.html"><button id="volver">Volver al menú principal</button></a>
        </main>

        <?php
            if(isset($_POST["submit"])){
                $DNI=$_POST["DNI"];
                $nombre=$_POST["nombre"];
                $apellido1=$_POST["ape1"];
                $apellido2=$_POST["ape2"];
                $edad=$_POST["edad"];
                $genero=$_POST["genero"];
                $idcarrera=$_POST["idcarrera"];
              
                $sql = "INSERT INTO alumnos (DNI, nombre_alu, apellido_alu_1, apellido_alu_2, edad_alu, genero_alu, id_carrera1 ) VALUES ('$DNI', '$nombre', '$apellido1', '$apellido2', '$edad', '$genero', '$idcarrera')";

                $resultado=mysqli_query($conexion, $sql);
                if($resultado){
                    header("Location:./alumnosModificarRegistros.php");
                }else{
                    header("location:../webs/");
                }
            }
        ?>
    </div>
</body>
</html>