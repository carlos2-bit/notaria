<?php //llave para entrar, pero la vamos a comentar par aque no haga siempre esto, esto es para pruebas nommas

    $conexion = mysqli_connect("localhost", "root", "", "notarie");

    if ($conexion->connect_error){
        die('Error de Conexion'. $conexion->connect_error);
    }
    /*
    if($conexion){
        echo 'Conected to DataBase';
    }else{
        echo 'Not Conected to DataBase :(';
    }
    */

?>