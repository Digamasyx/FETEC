<?php 
namespace DatabaseCon;

use PDO;
use PDOStatement;

class DatabaseCon {
    public int $errCode;
    public function __construct(string $dsn, string $username, string $password)
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
        pseudoId BIGINT NOT NULL,
        idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY)";
        $sql_ = "CREATE TABLE IF NOT EXISTS posts (
        nomePl varchar(255) NOT NULL,
        nomeCientifico varchar(255) NOT NULL,
        dataCriacao DATETIME NOT NULL,
        regiao INT NOT NULL,
        shortDesc varchar(255) NOT NULL,
        nomeImagem varchar(255) NOT NULL,
        caminho varchar(255) NOT NULL,
        criador varchar(255) NOT NULL,
        fullDesc text NOT NULL,
        idPost INT NOT NULL AUTO_INCREMENT PRIMARY KEY)";
        $stm = $db->prepare($sql);
        $hasCreated = ($stm->execute()) ? true : false;

        if ($hasCreated) {
            $stm = $db->prepare($sql_);
            $stm->execute();
        }
    }

    /**
     * $post[0] == Nome
     * $post[1] == Senha (Bycrypt)
     * $post[2] == Email
     */
    public function postData(array $post, $db): mixed {
        date_default_timezone_set("America/Bahia");
        $data = date("Y-m-d H:i:s");
        $test_exist = "SELECT COUNT(email) FROM usuarios WHERE email = '$post[2]'";
        $exec = $db->prepare($test_exist);
        $exec->execute();
        if ($exec->fetchColumn() > 0) {
            return FALSE;
        }
        $sql = "INSERT INTO usuarios (nome, dataCriacao, senha, email, pseudoId) VALUES ('$post[0]', '$data', '$post[1]', '$post[2]', '$post[3]')";
        $stm = $db->prepare($sql);
        $stm->execute();

        return TRUE;
    }

    /** 
     * $get[0] == Nome de usuario
     * $get[1] == Senha já com bycrpt
     *
    */
    public function getData(array $get, $db): mixed {

        $sql = "SELECT * FROM usuarios WHERE email = '$get[0]'";
        $stm = $db->prepare($sql);
        $stm->execute();
        $this->row = $stm->fetch(PDO::FETCH_ASSOC);
        if(password_verify($get[1], $this->row["senha"])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function postFiles(array $data_, $db): mixed
    {
        $data = date("Y-m-d H:i:s");
        $sql = "INSERT INTO posts (nomePl, dataCriacao, regiao, nomeImagem, caminho, shortDesc, criador, fullDesc, nomeCientifico) VALUES ('$data_[0]', '$data', '$data_[1]', '$data_[2]', '$data_[3]', '$data_[4]', '$data_[5]', '$data_[6]', '$data_[7]')";
        $test_exist = "SELECT * FROM posts WHERE nomePl = '$data_[0]'";
        $exec = $db->prepare($test_exist);
        $exec->execute();
        if ($exec->fetchColumn() !== FALSE) {
            return FALSE;
        }

        $stm = $db->prepare($sql);
        if($stm->execute()) {
            return TRUE;
        }
    }
    public function deleteAcc(array $data, $db): bool
    {
        $sql = "DELETE FROM usuarios WHERE nome='$data[0]' AND pseudoId='$data[1]' AND email='$data[2]'";
        $stm = $db->prepare($sql);

        if($stm->execute()) {
            return true;
        }
    }

    public function changePass(array $data, $db): bool
    {
        $hashedPass = password_hash($data[1], PASSWORD_BCRYPT);
        $sql = "UPDATE usuarios SET senha = '$hashedPass' WHERE email='$data[0]'";
        $stm = $db->prepare($sql);

        if($stm->execute()) {
            return true;
        }
    }

    public static function getFiles($db): array
    {
        $sql = "SELECT * FROM posts";
        $stm = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stm->execute();
        
        $data = $stm->fetchAll();



        return $data;
    }
    public static function pushData($db): array {
        $sql = "SELECT nome, email from usuarios";
        $stm = $db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stm->execute();

        $data = (array) $stm->fetchAll();

        return $data;
    }
    public static function getPseudoId($db, int $value): mixed {
        $sql = "SELECT pseudoId FROM usuarios WHERE pseudoId=$value";
        $stm = $db->prepare($sql);
        $stm->execute();

        if ($stm->fetchColumn() !== FALSE) {
            return TRUE; 
        } else {
            return FALSE; 
        }


    }

    public static function userPseudoId(int $max, int $min, $db): int {
           $rand = (int) random_int($min, $max);

           while(DB_tables::getPseudoId($db, $rand)) {
            echo $rand . "\n";
            $rand = (int) random_int($min, $max);
        }
        return $rand;
    }
}

class Session {

    const SESSION_STARTED = true;
    const SESSTION_NOT_STARTED = false;

    private $sessionState = self::SESSTION_NOT_STARTED;

    private static $instance;

    public function __construct()
    {
        
    }


    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }  

        self::$instance->startSession();

        return self::$instance;
    }

    public function startSession()
    {
        if ($this->sessionState == self::SESSTION_NOT_STARTED) {
            $this->sessionState = session_start(["cookie_lifetime" => 86400, "name" => "Session"]);
        }

        return $this->sessionState;
    }


    public function __set($data, $value)
    {
        $_SESSION[$data] = $value;
    }

    public function __get($name)
    {
        if (isset($_SESSION[$name])) return $_SESSION[$name];
    }

    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }

    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }

    public function __destroy()
    {
        if ($this->sessionState == self::SESSION_STARTED) {
            $this->sessionState = !session_destroy();
            unset($_SESSION);

            return !$this->sessionState;
        }

        return false;
    }
}
?>