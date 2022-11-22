<?php 
require_once(dirname(__FILE__, 2)."\imports.php");

use DatabaseCon\DB_tables;
session_start(["name" => "Session"]);

$data = (array) [$_SESSION["user"], $_SESSION["pseudoid"], $_SESSION["email"]];

$db = new DB_tables(dsn, user, password);

$result = $db->deleteAcc($data);
session_destroy();

if($result) echo "ACCDELETED";



?>