<?php 
require_once("base.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(postMethod()) { header(__broot__."\index.php");}
}



?>