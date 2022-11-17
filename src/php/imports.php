<?php 
// All Imports
require_once ('db\database.php');
require_once ('def\definitions.php');
require_once ('pages\base.php');

use DatabaseCon\DatabaseCon;
use DatabaseCon\DB_tables;

$result = new DatabaseCon(dsn, user, password);

try {
    new DB_tables(db);
} catch (\Exception $e) {
    throw new \Exception($e->getMessage(), (int)$e->getCode());
}

?>