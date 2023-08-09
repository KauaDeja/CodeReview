<?php
function get_all_files_dir($user) {
    $base = basename(realpath("files/".$user));
    if (!file_exists($base)) {
        mkdir($base);
    }

    return array_diff(scandir($base), array("..", '.'));
    }

// Substitua pelo nome de usuário desejado
$username = "../../../etc/passwd";
$files = get_all_files_dir($use);
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Files for User</title>
</head>
<body>
    <h1>Files for User: <?php echo $username; ?></h1>
    <ul>
        <?php foreach ($files as $file) : ?>
            <li><?php echo $file; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
