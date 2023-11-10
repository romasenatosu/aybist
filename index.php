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
<!--     <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="print.css" media="print"> -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title><?= $title ?></title> <!-- TODO:veritabanından gelecek -->
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
      <img src="/assets/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <?php
        include_once __DIR__ . '/header.php';
        include_once __DIR__ . '/home.php';
        // include_once __DIR__ . '/pages/test.php';
        include_once __DIR__ . '/footer.php';
    ?>
</body>
</html>
