<?php
public static function addfile($user) {
  $file = "files/".basename($user)."/".basename($_FILES["file"]["name"]);
  if (!preg_match("/\.pdf/", $file)) {
    return  "Only PDF are allowed";
  } elseif (!move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
    return "Sorry, there was an error uploading your file.";
 }
  return NULL;
}
?>
