<?php 

use DatabaseCon\DB_tables;

require_once(__ROOT__."\src\php\imports.php");
function postMethod() {
    if(!empty($_POST["usuario"]) and !empty($_POST["email"]) and !empty($_POST["senha"])) {
    $data = array($_POST["usuario"], password_hash($_POST["senha"], "2y"), $_POST["email"]);
    $db_c = new DB_tables(db);
    $result = $db_c->postData($data, db);

    return $result;
  }
}

function getMethod() {
  if(!empty($_POST["email"]) and !empty($_POST["senha"])) {
    $data_Log = array($_POST["email"], password_hash($_POST["senha"], "2y"));
    $db_g = new DB_tables(db);
    $db_g->getData($data_Log, db, 1, $getResult);
    return $getResult;
  }
}

?>