<?php 

define("dsn", "mysql:host=localhost;dbname=catalogo;port=3306");
define("user", "digam");
define("password", "Digamasyx31.");
define("__root__", dirname(dirname(__FILE__)));

define("Regioes", array(
       "NORTE" => 1,
       "NORDESTE" => 2,
       "SUL" => 3,
       "SUDESTE" => 4,
       "CENTRO_OESTE" => 5)
);

function generateNumber(array $element): array {
       $min = 0;
       $max = count($element)-1;
       $count = count($element);


       $nonrepeatarray = array();
       for($i = 0; $i < $count; $i++) 
       {
          $rand = rand($min,$max);

              while(in_array($rand,$nonrepeatarray)) {
                     $rand = rand($min,$max);
              }

              $nonrepeatarray[$i] = $rand;
       }
       return $nonrepeatarray;
}

?>
