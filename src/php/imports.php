<?php 
// All Imports
@require_once("./src/php/db/database.php");
if ($errCode !== 1) {
    require_once("./src/php/db/dbclass.php");
    new DB_tables($db);
}

?>