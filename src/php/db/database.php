<?php 
$dsn = 'mysql:host=localhost;dbname=catalogo;port=8001';
$username = 'localhost';

try {
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    throw new Exception($e->getMessage(), (int)$e->getCode());
}



?>