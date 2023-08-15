<?php
	$parts = explode('.', $GET['jwt']);
$algorithms = array('HS256', 'HS384', 'HS512');
if (3 !== count($parts)) {
  throw new \InvalidArgumentException('Invalid or malformed JWT supplied.');
}
$header = jsondecode(self::decode($parts[0]), true);
if (in_array($header['alg'], $algorithms)) {
  ...
}
?>
