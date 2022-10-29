<?php 

require_once("../imports.php");
global $result;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!empty($_POST["usuario"]) and !empty($_POST["email"]) and !empty($_POST["senha"])) {
    $data = array($_POST["usuario"], password_hash($_POST["senha"], "2y"), $_POST["email"]);
    $db_c = new DatabaseConfig\DB_tables(db);
    $result = $db_c->postData($data, db);
  }
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(!empty($_POST["email"]) and !empty($_POST["senha"])) {
    $data_Log = array($_POST["email"], password_hash($_POST["senha"], "2y"));
    $db_g = new DatabaseConfig\DB_tables(db);
    $db_g->getData($data_Log, db, 1, $test);
  }
    }
}

?>