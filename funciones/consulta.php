<?php

function consulta($conn){
    

    
    //en workbench poner la clave primaria id autoincremental
    $query_update = "UPDATE ajax.clientes SET Nombre='adele' WHERE Nombre='adela'";
    $query_insert = "INSERT INTO ajax.clientes (Nombre, Apellido1,Apellido2) VALUES ('adela','Mayo','Romero')";
    //$query_select = "SELECT * FROM clientes WHERE Nombre='z'";
    $query_select = "SELECT * FROM clientes";
    $query_delete = "DELETE FROM clientes WHERE Nombre='NAVI'";
    $result = mysqli_query($conn, $query_select) OR die(mysqli_error($conn));
    
    echo "<br>Valor de result: ";
    echo var_dump($result)."<br>";

    //si hago un insert
    $last_id = mysqli_insert_id($conn);

    if($last_id){
        echo "<br>Last inserted ID is: " . $last_id;
    }else{
        echo "<br>No se inserta ningun registro: " . $last_id . "<br>";
        //si $result es object, la consulta es un select
        if(is_object($result)){
            $registros = [];
            
            while($row = mysqli_fetch_assoc($result)){
                $registros[] = $row;
            }

            foreach($registros as $registro){
                echo $registro['Nombre']."<br>";
            }
            echo "<p>Clave Valor: </p>";
            
            foreach($registros as $registro){
                foreach($registro as $clave => $valor){
                    echo $valor . " es el " . $clave . "<br>";
                }
            }

            mysqli_free_result($result);
            echo "<br>Liberar result, valor de result: ";
            echo var_dump($result)."<br>";
    }
    return $result;
}
}