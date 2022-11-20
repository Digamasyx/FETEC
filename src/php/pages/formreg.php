<?php

use DatabaseCon\Session;

require_once("base.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    [$cClass, $result] = postMethod();
    if ($result) {
        $notExists = "NOTEXISTS";
        $set = (bool) setcookie("accExists", $notExists, time()+1, "/");
        if ($set) header("location: ". $_SERVER["HTTP_REFERER"]);
    } else if (!$result) {
        $exists_ = "EXISTS";
        $set = (bool) setcookie("accExists", $exists_, time()+1, "/");
        if ($set) {
            header("location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
}



?>