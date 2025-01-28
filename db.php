<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "case";

// Criar conexão
$conn = new mysqli($server, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>