<?php 
// All Imports
include_once ('db/database.php');
if ($errCode !== 1) {
    include 'db/dbclass.php';
    new DatabaseConfig\DB_tables(db);
}

?>