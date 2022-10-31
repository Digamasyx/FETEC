<?php 
// All Imports
require_once ('db\database.php');
require_once ('def\definitions.php');
require_once ('pages\base.php');

use DatabaseCon\DatabaseCon;
use DatabaseCon\DB_tables;

define("result", new DatabaseCon(dsn, user, password));

if (result === 1) {
    new DB_tables(db);
} else if (result === 0) {
    throw new \Exception($e->getMessage(), (int)$e->getCode());
}

?>