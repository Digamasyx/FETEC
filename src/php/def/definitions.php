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

define("tiposPermitidos", array('jpg', 'png', 'jpeg', 'gif', 'webp'));

function generateNumber(array $element): array {
       $min = (int) 0;
       $max = (int) count($element)-1;
       $count = (int) (count($element) == 0) ? 0 : count($element);


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

function ExceptionHandlerFunction($errNo, $errStr, $errFile, $errLine) {

       if(!error_reporting() & $errNo) { return false; }

       $errStr = htmlspecialchars($errStr);


       switch($errNo) {

              case E_USER_ERROR:
                     echo "<b> E_USER_ERROR </b> [$errNo] $errStr <br />\n";
                     echo " Fatal Error in $errFile on line $errLine";
                     echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
                     exit(1);
              case E_USER_WARNING:
                     echo "<b> E_USER_WARNING </b> [$errNo] $errStr <br />\n";
                     break;
       }

       return true;
}

set_error_handler('ExceptionHandlerFunction');



?>
