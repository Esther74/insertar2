<?php

function consulta($conn){
    

    
    //en workbench poner la clave primaria id autoincremental
    $query_update = "UPDATE ajax.clientes SET Nombre='NAVI' WHERE Nombre='pepe'";
    $query_insert = "INSERT INTO ajax.clientes (Nombre, Apellido1,Apellido2) VALUES ('pepe','Mayo','Romero')";
    //$query_select = "SELECT * FROM clientes WHERE Nombre='z'";
    $query_select = "SELECT * FROM clientes";
    $query_delete = "DELETE FROM clientes WHERE Nombre='pepe'";
    
    $result = mysqli_query($conn, $query_select) OR die(mysqli_error($conn));
    
    if($result){
        echo "<br>Valor de result: ";
        echo var_dump($result)."<br>";
        
        //si hago un insert
        $last_id = mysqli_insert_id($conn);
        
        if($last_id){
            echo "<br>New record created successfully. Last inserted ID is: " . $last_id;
        }else{
            
            //last_id es igual a 0, la consulta puede ser un select o un update o un delete
            
            echo "<br>No se inserta ningun registro: " . $last_id . "<br>";
            
            
            //si $result es object, la consulta es un select
            if(is_object($result)){
                
               
                
                echo "<p>ASSOC";
                
                echo "<table border='1'><tr>"
                . "<th>Nombre</th><th>Apellido1</th><th>Apellido2</th>"
                . "</tr>";
                
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                   
                    echo "<td>".$row['Nombre']."</td>";
                    echo "<td>".$row['Apellido1']."</td>";
                    echo "<td>".$row['Apellido2']."</td>";
                    echo "</tr>";
                }
                  
                echo"</table>";
                
               
                
                //$filas = mysqli_fetch_array($result);
                
                
                mysqli_free_result($result);
                echo "<br>Liberar result, valor de result: ";
                echo var_dump($result)."<br>";
            }
        }
        
        
    }else{
        echo "<br>fallo en la consulta";
    }
    return $result;
}