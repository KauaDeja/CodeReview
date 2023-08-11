<?php

function addfile($user) {
    $file = "files/" . basename($user) . "/" . md5($_FILES["file"]["name"]) . basename($_FILES["file"]["name"]);
    $allowedMimeTypes = ['application/pdf'];
    $mimetype = mime_content_type($_FILES["file"]["tmp_name"]);

    if (!preg_match("/\.pdf$/", $file)) { //Se a string nao der match com a expressao, vai dar erro. 
        return "Only PDF files are allowed";
    
    } elseif (!in_array($mimetype, $allowedMimeTypes)){
        return "No hackers";
    }elseif (!move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
        return "Sorry, there was an error uploading your file.";
    }
    return "File uploaded successfully!";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = "druida"; // You can replace this with the user input
    $result = addfile($user);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Test</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" accept=".pdf">
        <input type="submit" value="Upload">
    </form>
    
    <?php
    if (isset($result)) {
        echo "<p>$result</p>";
    }
    ?>
</body>
</html>