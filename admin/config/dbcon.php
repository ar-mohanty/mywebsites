<?php

$host = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'blog';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    header('LOCATION: ../error/dberror.php');
    die();
}

?>
