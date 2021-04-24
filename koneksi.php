<?php
$host = "localhost"; // Nama host
$username = "root"; // Username
$password = ""; 
$database = "crud_db"; // Nama databasenya
// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>