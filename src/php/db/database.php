<?php 
namespace DatabaseCon;

use PDO;


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
        idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY)";
        $sql_ = "CREATE TABLE IF NOT EXISTS posts (
        nomePl varchar(255) NOT NULL,
        dataCriacao DATETIME NOT NULL,
        regiao INT NOT NULL,
        nomeImagem varchar(255) NOT NULL,
        caminho varchar(255) NOT NULL,
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
    public function postData(array $post, $db): bool {
        date_default_timezone_set("America/Bahia");
        $data = date("Y-m-d H:i:s");
        $test_exist = "SELECT * FROM usuarios WHERE email = '$post[2]'";
        $exec = $db->prepare($test_exist);
        $exec->execute();
        if ($exec->fetchColumn() >= 1) {
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
    public function getData(array $get, $db): bool {

        $sql = "SELECT * FROM usuarios WHERE email = '$get[0]'" or die();
        $stm = $db->prepare($sql);
        $stm->execute();
        $this->row = $stm->fetch(PDO::FETCH_ASSOC);
        if(password_verify($get[1], $this->row["senha"])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function postFiles(array $data_, $db): bool
    {
        $data = date("Y-m-d H:i:s");
        $sql = "INSERT INTO posts (nomePl, dataCriacao, regiao, nomeImagem, caminho) VALUES ('$data_[0]', '$data', '$data_[1]', '$data_[2]', '$data_[3]')";

        $stm = $db->prepare($sql);
        if($stm->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

class Session {

    const SESSION_STARTED = true;
    const SESSTION_NOT_STARTED = false;

    private $sessionState = self::SESSTION_NOT_STARTED;

    private static $instance;

    private function __construct()
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