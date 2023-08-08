<?php

public static function list_files_for_user($username) {
  $base = "files/".$username;
  if (!file_exists($base)) {
    mkdir($base);
  }
  return array_diff(scandir($base), array('..', '.'));
}

?>