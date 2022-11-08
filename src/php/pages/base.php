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

function postFile(array $options, array $data): ?array {

  if(isset($_POST["submit"]) and !empty($_FILES["file"]["name"])) {

    if (!file_exists("files/")) {
      mkdir('files/', 0777, true);
      if (!file_exists("files/".$_SESSION['user']."/")) {
        mkdir('files/'.$_SESSION["user"]."/", 0777, true);
      }
    }

    $allowedTypes = array('jpg', 'png','jpeg');

    if(in_array($options[3], $allowedTypes)) {

      if(move_uploaded_file($_FILES["file"]["tmp_name"], $options[2])) {

        var_dump($data, $options);
        $db_f = new DB_tables(db);

        $result = $db_f->postFiles([$data[0], $data[1], $options[1], $options[2]], db);

        return [$db_f, $result];
      }
    }
  }
}

?>