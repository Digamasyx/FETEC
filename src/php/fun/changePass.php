<?php 
require_once(dirname(__FILE__, 2)."\imports.php");

use DatabaseCon\DB_tables;

session_start(["name" => "Session"]);
if (isset($_POST["passChange"])) {
    $data = (array) [$_SESSION["email"], $_POST["passChange"]];
    $db = new DB_tables(db);

    $result = $db->changePass($data, db);
    session_destroy();

    if($result) echo "PASSCHANGED";
}



?>