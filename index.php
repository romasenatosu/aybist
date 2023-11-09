<?php
    require_once __DIR__ . '/inc/core.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title><?= $title ?></title>
</head>
<body>
    <?php
        include_once __DIR__ . '/header.php';
        include_once __DIR__ . '/home.php';
        include_once __DIR__ . '/footer.php';
    ?>
</body>
</html>
