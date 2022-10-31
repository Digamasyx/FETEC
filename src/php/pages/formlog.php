<?php

use DatabaseCon\DefSession;

require_once("base.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$mClass, $result] = getMethod();
    $mClass->defSession($result);
}





?>