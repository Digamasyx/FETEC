<?php 
require_once("base.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$cClass, $result] = postMethod();
    $cClass->defSession($result);
}



?>