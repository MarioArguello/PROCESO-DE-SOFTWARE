<?php
// host - El nombre del equipo anfitrión donde reside el servidor de bases de datos //
//port - El número de puerto que el servidor de bases de datos está escuchando. //
$server = 'localhost:3307';
//$username: nombre de usuario de la base de datos. //
$username = 'root';
//$password: clave de usuario de la base de datos. //
$password = '';
//database - El nombre de la base de datos. //
$database = 'terminalapp';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
