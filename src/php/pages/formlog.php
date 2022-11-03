<?php

use DatabaseCon\DB_tables;
use DatabaseCon\Session;

require_once("base.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sessionVars = ["nome", "dataCriacao", "email", "id"];
    if(!empty($_POST["email_"]) and !empty($_POST["senha"])) {
        $data_Log = array($_POST["email_"], $_POST["senha"]);
        $db_g = new DB_tables(db);
        $getResult = $db_g->getData($data_Log, db);
    }
    $data = Session::getInstance();
    $data->id = $db_g->row["idUsuario"];
    $data->user = $db_g->row["nome"];
    $data->email = $db_g->row["email"];
    header("location: ". $_SERVER["HTTP_REFERER"]);
}





?>