<?php
session_start(["name" => "Session"]);

if (session_destroy()) {
    echo "DESTROYED";
}


?>