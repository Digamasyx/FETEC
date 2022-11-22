<?php 
define("__broot__", dirname(__FILE__, 4));
define("__lroot__", dirname(__FILE__, 2));
use DatabaseCon\DB_tables;

require_once(__lroot__."\imports.php");
require_once(__broot__."\src\php\def\definitions.php");

function postMethod() {
    if(!empty($_POST["usuario"]) and !empty($_POST["email"]) and !empty($_POST["senha_"])) {
    $data = array($_POST["usuario"], password_hash($_POST["senha_"], PASSWORD_BCRYPT), $_POST["email"], $_POST["pseudoid"]);
    $db_c = new DB_tables(dsn, user, password);
    $result = $db_c->postData($data);

    return [$db_c, $result];
  }
}

function getMethod() {
  if(!empty($_POST["email_"]) and !empty($_POST["senha"])) {
    $data_Log = array($_POST["email_"], $_POST["senha"]);
    $db_g = new DB_tables(dsn, user, password);
    $getResult = $db_g->getData($data_Log);
    return [$db_g, $getResult];
  }
}

function postFile(array $options, array $data): ?array {
  $fileExists = (bool) [];

  if(isset($_POST["submit"]) and !empty($_FILES["file"]["name"])) {

    try{
      if (file_exists("files/") === false) {
        mkdir('files/', 0777, true);
        $fileExists[0] = true;
      } else if (file_exists("files/")) {
        $fileExists[0] = true;
      } else {
        $fileExists[0] = false;
      }
      if (!file_exists("files/".$data[3]."/") and $fileExists[0] === true) {
        mkdir('files/'.$data[3]."/", 0777);
        $fileExists[1] = true;
      }
    } catch (Exception $e) {
        echo $e->getMessage();
    }


    if(in_array($options[3], tiposPermitidos)) {

      if(move_uploaded_file($_FILES["file"]["tmp_name"], $options[2])) {
        $db_f = new DB_tables(dsn, user, password);

        $result = $db_f->postFiles([$data[0], $data[1], $options[1], $options[2], $data[2], $data[3], $data[4], $data[5]]);

        return [$db_f, $result];
      }
      return false;
    }
  }
}

?>