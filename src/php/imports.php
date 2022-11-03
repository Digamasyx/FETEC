<?php 
// All Imports
require_once ('db\database.php');
require_once ('def\definitions.php');
require_once ('pages\base.php');

use DatabaseCon\DatabaseCon;
use DatabaseCon\DB_tables;

$result = new DatabaseCon(dsn, user, password);

if ($result->errCode === 0) {
    new DB_tables(db);
} else if ($result->errCode === 1) {
    throw new \Exception($e->getMessage(), (int)$e->getCode());
}

?>