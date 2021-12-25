<?php

function consultaSelect($conn, $querySelect){
    $result = mysqli_query($conn, $querySelect) OR die(mysqli_error($conn));
    if(is_object($result)){
        $registros = [];
        while($row = mysqli_fetch_assoc($result)){
            $registros[] = $row;
        }
        mysqli_free_result($result);
    }
    return $registros;
}