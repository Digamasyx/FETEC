<?php 
$dsn = 'mysql:host=localhost;dbname=catalogo;port=3306';
$username = 'root';
$password = null;

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $errCode = 1;
    throw new Exception($e->getMessage(), (int)$e->getCode());
} finally {
    $errCode = 0;
}



?>