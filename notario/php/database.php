<?php

$server = "localhost";
$username ="root";
$password = "";
$database = "notarie";

$db = new mysqli($server, $username, $password, $database);

if ($db->connect_error) {
    die("No se Conectó a la DB". $db->connect_error);
}

?>