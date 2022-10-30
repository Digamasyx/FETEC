<?php 
namespace DatabaseCon;


class DatabaseCon {
    public int $errCode;
    public function __construct($dsn = "", $username = "", $password = "")
    {
        try {
            define('db', new \PDO($dsn, $username, $password));
        } catch (\PDOException $e) {
            $errCode = 1;
            return $errCode;
        } finally {
            $errCode = 0;
            return $errCode;
        }
    }
}

class DB_tables {
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
    public static function postData($post = [], $db): bool {
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
     * $Option == Se 1 precisa passar referencia
     * $ref == referencia
     *
    */
    public static function getData($get = [], $db, $Option = null, &$ref): bool {

        $sql = "SELECT * FROM usuarios WHERE nome = '$get[0]' AND senha = '$get[1]'" or die();
        $stm = $db->prepare($sql);
        $stm->execute();

        if ($Option != null and $stm->rowCount() == 1) {
            return $ref = TRUE;
        } elseif ($Option != null and $stm->rowCount() == 0) {
            return $ref = FALSE;
        }

        if ($stm->rowCount() == 1) {
            return $ref = TRUE;
        } else {
            return $ref = FALSE;
        }
    }
}
?>