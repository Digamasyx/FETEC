# Introdução

[![CodeFactor](https://www.codefactor.io/repository/github/digamasyx/fetec/badge/master)](https://www.codefactor.io/repository/github/digamasyx/fetec/overview/master)
![GitHub language count](https://img.shields.io/github/languages/count/digamasyx/FETEC?color=%23f0f)


![GitHub top language](https://img.shields.io/github/languages/top/digamasyx/FETEC?color=%23f0f)

Este projeto foi feito com o intuito de compartilhar informações sobre plantas medicinais das Regiões do brasil, para a FETEC III do colegio CETEPI I localizado na (Zona Urbana - Ac. dos Estudantes, S/N - Amaury Alves de Menezes, Paulo Afonso - BA).

## Alterações necessarias para funcionar corretamente

É necessario alterar as seguintes linhas para total funcionalidade do site.

No arquivo definitions.php na pasta "./src/php/def/".


```php 
<?php 

    define("dsn", "mysql:host=DBHOST;dbname=DBNAME;port=DBPORT"); #Alterar os valores DBHOST pelo HOST do banco de dados, DBNAME pelo nome do banco de dados e DBPORT pela porta do banco de dados.
    define("user", "DBUSERNAME"); #Alterar os valores DBUSERNAME pelo nome de usuario para conexão com o banco de dados.
    define("password", "DBPASSWORD") #Alterar os valores DBPASSWORD pela senha do banco de dados para efetuar a conexão
?>
```

## Contribuir

Como o projeto está sobre a licença [GNU LGPL-3.0](https://choosealicense.com/licenses/lgpl-3.0/) a suas condições são

![](https://imgur.com/bncPKFy)