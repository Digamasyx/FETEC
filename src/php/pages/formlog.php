<?php

use DatabaseCon\DB_tables;
use DatabaseCon\Session;

require_once("base.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!empty($_POST["email_"]) and !empty($_POST["senha"])) {
        $data_Log = array($_POST["email_"], $_POST["senha"]);
        $db_g = new DB_tables(db);
        $getResult = $db_g->getData($data_Log, db);

        if (!$getResult) {
            $set = (bool) setcookie("userLogged", "INCORRECTPASS", time()+1, "/");
            if ($set) header("location: ". $_SERVER["HTTP_REFERER"]);
        }
        if($getResult) {

            $set = (bool) setcookie("userLogged", "LOGGED", time()+1, "/");
            $data = Session::getInstance();
            $data->id = $db_g->row["idUsuario"];
            $data->user = $db_g->row["nome"];
            $data->email = $db_g->row["email"];
            $data->pseudoid = $db_g->row["pseudoId"];
            header("location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
}





?>