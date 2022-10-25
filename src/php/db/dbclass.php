<?php 
namespace DatabaseConfig;

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
}
?>