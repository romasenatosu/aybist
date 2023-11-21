<?php declare(strict_types = 1); // use strict variable types

// program configs
$default_locale = "tr";

$date_format = "d.m.Y";
$datetime_format = "d.m.Y h:i:s";

$photo_files_extensions = ".jpg, .jpeg, .png";
$document_files_extensions = ".pdf, .doc, .docx, .rtf, .txt, .csv";
$upload_dir = __DIR__ . "/uploads";

$hash_cost = 12; // 4 - 32
$hash_algorithm = PASSWORD_BCRYPT;

$max_abbr = 25;

// initialization settings as default
ini_set("display_errors", 1); // display errors as printable text
ini_set("display_startup_errors", 1); // show startup errors
error_reporting(E_ALL); // show all errors
date_default_timezone_set("Europe/Istanbul"); // Turkey <3
ini_set("memory_limit", -1); // max amount of bytes php can use (-1 means, there is no limit)
ini_set("max_execution_time", 300); // 5 mins
ini_set("session.gc_probability", null); // garbage data probability

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
    die(print_r($e->getMessage()));
}

// update initialization settings from database
// ini_set("display_errors", 1);
// ini_set("display_startup_errors", 1);
// error_reporting(E_ALL);


