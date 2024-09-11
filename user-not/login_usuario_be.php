<?php

session_start();

include 'conexion_be.php';

$user = $_POST['user'];
$contra = $_POST['contra'];

if ($user === 'NOT65' && $contra === 'NOT65') {
    $_SESSION['how'] = $user;
    header("location: ../menu_notario.php");
    exit(); 
}

$validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE user='$user' AND contra='$contra'");

if (mysqli_num_rows($validar_login) > 0) {
    $quien = mysqli_fetch_array($validar_login); 
    $_SESSION['how'] = $quien['user'];
    header("location: ../carga_menu.php");
} else {
    echo '
        <script>
            alert("Verifica tus datos");
            window.location = "../login.php";
        </script>';
}
?>