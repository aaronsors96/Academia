<?php

    class conexion{
        //atributos
        private $serv;
        private $user;
        private $cont;
        private $bbdd;
        private $conex;

        //constructior

        function __construct($bbdd){
            $this->serv="localhost";
            $this->user="root";
            $this->cont="";
            $this->bbdd=$bbdd;
            $this->conectar();
        }
        
        //funcionalidades

        function conectar(){
            $estableconexion=mysqli_connect($this->serv, $this->user, $this->cont);
            if(mysqli_connect_errno()){
                echo"<p>error 1;conexion no estasblecida, verifique.</p>";
                echo"Error de depuración" . mysqli_connect_errno() . PHP_EOL;//borrar
                exit;
            }
            mysqli_select_db($estableconexion, $this->bbdd) or die("Error2 No se puede conectar con la base de datos");
            echo "<p>Conexion completada</p>";//borrar
            $this->conex=$estableconexion;
        }

        function cerrarBBDD(){
            mysqli_close($this->conex);
        }

        //getters y setters
        function getConexion(){
            return $this->conex;
        }
            
    }
    

?>