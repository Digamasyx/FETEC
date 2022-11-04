<?php

use DatabaseCon\Session;

require_once("base.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$cClass, $result] = postMethod();
    if ($result) {
        header("location: ". $_SERVER["HTTP_REFERER"]);
    } else if (!$result) {
        $cryptExists = password_hash("EXISTS", PASSWORD_BCRYPT);
        $__cookie = setcookie("userExists", $cryptExists, time()+60);
        if($__cookie) {
            header("location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
}



?>