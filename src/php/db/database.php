<?php 
namespace DatabaseCon;

use Exception;

class DatabaseCon {
    public int $errCode;
    public function __construct($dsn = "", $username = "", $password = "")
    {
        try {
            define('db', new \PDO($dsn, $username, $password));
        } catch (\PDOException $e) {
            $this->errCode = 1;
        } finally {
            $this->errCode = 0;
        }
    }
}

class DB_tables {
    public $row;
    public function __construct($db)
    {
        $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        nome varchar(255) NOT NULL,
        dataCriacao DATETIME NOT NULL,
        senha varchar(128) NOT NULL,
        email varchar(255) NOT NULL,
        idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY)";
        $stm = $db->prepare($sql);
        $stm->execute();
    }

    /**
     * $post[0] == Nome
     * $post[1] == Senha (Bycrypt)
     * $post[2] == Email
     */
    public function postData($post = [], $db): bool {
        date_default_timezone_set("America/Bahia");
        $data = date("Y-m-d H:i:s");
        $test_exist = "SELECT * FROM usuarios WHERE nome ='$post[0]' and email = '$post[2]'";
        $exec = $db->prepare($test_exist);
        $exec->execute();
        if ($exec->rowCount() == 1) {
            return FALSE;
        }
        $sql = "INSERT INTO usuarios (nome, dataCriacao, senha, email) VALUES ('$post[0]', '$data', '$post[1]', '$post[2]')";
        $stm = $db->prepare($sql);
        $stm->execute();

        return TRUE;
    }

    /** 
     * $get[0] == Nome de usuario
     * $get[1] == Senha já com bycrpt
     *
    */
    public function getData($get, $db): bool {

        $sql = "SELECT * FROM usuarios WHERE email = '$get[0]'" or die();
        $stm = $db->prepare($sql);
        $stm->execute();
        $this->row = $stm->fetch();
        if(password_verify($get[1], $this->row["senha"])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function defSession($result)
    {

        $id = $this->row["idUsuario"];
        $username = $this->row["nome"];
        $hash_pass = $this->row["senha"];

        if ($result) {
            session_start();

            $_SESSION["logged"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["user"] = $username;
            header("location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
}
?>