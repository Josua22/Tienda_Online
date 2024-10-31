<?php 
    try {
        //server information to connect with the database mysql through PHP
        $servidor = "localhost"; // 127.0.0.1
        $DataBase = "matcha_db";
        $User = "root";
        $Pass = "";

        
        $conn = mysqli_connect("$servidor","$User","$Pass","$DataBase");

        if ($conn){
            //echo "Conexion Exitosa!!! | ";
        }else{
            echo "Error...";
        }


    } catch (Exception $ex) {
            echo $ex -> getMessage();
    }

?>