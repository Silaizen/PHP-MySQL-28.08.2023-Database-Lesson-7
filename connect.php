<?php

$host = '127.0.0.1:80';
$port = '3306'; // Замените на ваш порт
$user = 'root';
$password = '1234';
$name = 'first';



$db = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $password);

?>
















































/*

$conn = mysql_connect();
mysqli_query($conn, 'select from ...');


$conn = new mysqli('');
$result = $conn->query('select ...');

*/