<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    <?php
    
    include "funciones/conectar.php";
    include "funciones/consulta.php";
    if(conectar("ajax")){
        echo "<br>result satisfactorio<br>";
        echo print_r($result);
    }
       
    ?>
        
    </body>
</html>
