<?php declare(strict_types = 1); // use strict variable types

// show all errors as default
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Europe/Istanbul'); // Turkey <3
ini_set('memory_limit', -1); // max amount of bytes php can use (-1 means, there is no limit)
ini_set('max_execution_time', 300); // 5 mins
ini_set('session.gc_probability', null); // garbage data probability
ini_set('upload_max_filesize', '8M'); // maximum uploadable file size

// database configurations
$hostname = "localhost";
$database = "aybist";
$database_username = "muhammed";
$database_password = "muhammed.1234";
$database_port = 3306;
$dsn = "mysql:host=$hostname;dbname=$database";
$pdo = null;

try {
    $pdo = new PDO($dsn, $database_username, $database_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("SET CHARSET utf8mb4");

} catch (PDOException $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "</pre>";
    exit(-1);
}


