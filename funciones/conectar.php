<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function conectar($db){
    //le paso la base de dato donde me conecto    
    
    echo "<br>Conexion a base de datos en workbench que se llama " . $db;
    $servername ="localhost";
    $database = $db;
    $username = "root";
    $password = "admin";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
       die("Connection failed: ". mysqli_connect_error());
    }
    echo "<br>Connected successfully<br>";
    
    $result = consulta($conn);
     
    if($conn->close()){
        echo "<br>Cierre de conexion";
    }
    
    return $result;
    
}



