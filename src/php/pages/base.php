<?php 
define("__broot__", dirname(__FILE__, 4));
define("__lroot__", dirname(__FILE__, 2));
use DatabaseCon\DB_tables;

require_once(__lroot__."\imports.php");

function postMethod() {
    if(!empty($_POST["usuario"]) and !empty($_POST["email"]) and !empty($_POST["senha"])) {
    $data = array($_POST["usuario"], password_hash($_POST["senha"], PASSWORD_BCRYPT), $_POST["email"]);
    $db_c = new DB_tables(db);
    $result = $db_c->postData($data, db);

    return [$db_c, $result];
  }
}

function getMethod() {
  if(!empty($_POST["email_"]) and !empty($_POST["senha"])) {
    $data_Log = array($_POST["email_"], $_POST["senha"]);
    $db_g = new DB_tables(db);
    $getResult = $db_g->getData($data_Log, db);
    return [$db_g, $getResult];
  }
}

?>