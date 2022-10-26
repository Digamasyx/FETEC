<?php 
namespace DatabaseConfig;

interface DB {
    public function __construct($db);
    public function postData($post = [], $db): bool;
    public function getData($get = [], $db, $Option = null, &$ref): array;
}

class DB_tables implements DB {
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

    public function getData($get = [], $db, $Option = null, &$ref): array {

        $sql = "SELECT * FROM usuarios WHERE nome = '$get[0]' AND senha = '$get[1]'" or die();
        $stm = $db->prepare($sql);
        $stm->execute();

        if ($Option != null and $stm->rowCount() == 1) {
            return $ref = [TRUE, "Got User"];
        } elseif ($Option != null and $stm->rowCount() == 0) {
            return $ref = [FALSE];
        }

        if ($stm->rowCount() == 1) {
            return $ref = [TRUE];
        } else {
            return $ref = [FALSE];
        }
    }
}
?>