<?php

use DatabaseCon\Session;

require_once("base.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$cClass, $result] = postMethod();
    ($result) ? header("location: ". $_SERVER["HTTP_REFERER"]) : header("location: ". $_SERVER["HTTP_REFERER"]);
}



?>