<?php
    session_start();
    session_destroy();
    header("location: ../carga_login.php");

?>