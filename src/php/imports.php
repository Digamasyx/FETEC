<?php 
// All Imports
require_once (dirname(__FILE__).'/db/database.php');
require_once (dirname(__FILE__).'/def/definitions.php');
require_once (dirname(__FILE__).'/pages/base.php');

use DatabaseCon\DatabaseCon;
use DatabaseCon\DB_tables;

// $result = new DatabaseCon(dsn, user, password);

try {
    new DB_tables(dsn, user, password);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>