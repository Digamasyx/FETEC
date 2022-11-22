<?php 
require_once(dirname(__FILE__, 2)."\imports.php");

use DatabaseCon\DB_tables;

session_start(["name" => "Session"]);
if (isset($_POST["passChange"])) {
    $data = (array) [$_SESSION["email"], $_POST["passChange"]];
    $db = new DB_tables(dsn, user, password);

    $result = $db->changePass($data);
    session_destroy();

    if($result) echo "PASSCHANGED";
}



?>