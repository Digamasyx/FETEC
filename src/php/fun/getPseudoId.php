<?php 

require_once("../imports.php");
use DatabaseCon\DB_tables;

echo json_encode(DB_tables::userPseudoId(5000, 0, db), JSON_FORCE_OBJECT|JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK|JSON_UNESCAPED_SLASHES)





?>