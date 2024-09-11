<?php

    include 'conexion_be.php';

    $user = $_POST['user'];
    $contra = $_POST['contra'];
    $rol = $_POST['rol'];

    $query =    "INSERT INTO users(user, contra, rol)
                VALUES('$user', '$contra', '$rol')";

                $verificar_user = mysqli_query($conexion, "SELECT * FROM users WHERE user='$user' ");
                    if(mysqli_num_rows($verificar_user) > 0){
                        echo'
                        <script>
                            alert("Este user ya Existe");
                            window.location = "../login.php";
                        </script>';
                        exit();
                    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo'
        <script>
            alert("Registrado");
            window.location = "../login.php";
        </script>';
    }else{
        echo'
        <script>
            alert("Intentalo de Nuevo");
            window.location = "../login.php";
        </script>';
    }

    mysqli_close($conexion);
?>