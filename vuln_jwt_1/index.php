<?php

$parts = explode('.', $_GET['jwt']);
$algorithms = array('HS256', 'HS384', 'HS512');
if (3 !== count($parts)) {
  throw new \InvalidArgumentException('Invalid or malformed JWT supplied.');
}
$header = jsondecode(self::base64_decode($parts[0]), true);
$algorithmsValid = false;
foreach($algorithms as $allowedAlgorithms){
  if($header['alg'] === $allowedAlgorithms){
    $algorithmsValid= true;
    break;
  }
}
if ($algorithmsValid) {
  //... Executa alguma coisa com esse algoritmo valido
}else{
  //Executa alguma coisa caso o algoritmo seja invalido.
}

?>
