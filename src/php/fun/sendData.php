<?php 

require_once("../imports.php");
use DatabaseCon\DB_tables;

$db = new DB_tables(dsn, user, password);

echo json_encode($db->getFiles(), JSON_FORCE_OBJECT|JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK|JSON_UNESCAPED_SLASHES);

?>