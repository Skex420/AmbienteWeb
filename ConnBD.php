<?php

    function AbrirBD()
    {
        $server = "localhost";
        $user = "root";
        $pass = "";        
        $database = "letech";

        return new mysqli($server,$user,$pass,$database);
    }    
    function CerrarBD($conexion)
    {
        $conexion -> close();
    }


?>