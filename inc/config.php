<?php declare(strict_types = 1); // use strict variable types

// program configs

// load environment
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
} catch (Exception $e) {
    echo "Environment File could not loaded!" . PHP_EOL;
    die();
}

// * language
$default_locale = $_ENV['DEFAULT_LOCALE'];

// * date
$date_format = $_ENV['DATE_FORMAT'];
$datetime_format = $_ENV['DATETIME_FORMAT'];

// * uploading
$photo_files_extensions = $_ENV['ALLOWED_PHOTO_FILES'];
$upload_dir = __DIR__ . '/..' . $_ENV['PATH_UPLOAD_DIR'];

// * the path of the error.log file
$error_log_path = __DIR__ . '/..' . $_ENV['PATH_ERROR_LOGS'];

// * passwords
$hash_options = [
    'cost' => $_ENV['PASSWORD_COST']
];
$hash_algorithm = PASSWORD_BCRYPT;

// * table rendering
$max_abbr = $_ENV['TABLE_MAX_SHOW_CHARS'];

// * get URL parameters
$request_uri = $_SERVER["REQUEST_URI"];
$queries = explode("/", $request_uri);
array_shift($queries);

$locale = htmlspecialchars($queries[0] ?? '');
$page = htmlspecialchars($queries[1] ?? '');
$action = htmlspecialchars($queries[2] ?? '');
$id = filter_var(htmlspecialchars($queries[3] ?? ''), FILTER_VALIDATE_INT);

// ! please write all regex in this format "/^[YOUR REGEX]$/"
$regex_url = "/^(?:[a-zA-Z]:\\|[\/\\])?([a-zA-Z0-9]+[\/\\])+([a-zA-Z0-9]+\.[a-zA-Z0-9]+)$/";
$regex_alpha_numeric = "/^[a-zA-Z0-9 çÇğĞıİöÖşŞüÜ]+$/";
$regex_alpha = "/^[a-zA-Z çÇğĞıİöÖşŞüÜ]+$/";
$regex_keywords = "/^[a-zA-Z0-9çÇğĞıİöÖşŞüÜ]+(?:,\s*[a-zA-Z0-9çÇğĞıİöÖşŞüÜ]+)*$/";
$regex_lang_code = "/^[a-zA-Z_]+$/";
$regex_numeric = "/^[0-9]+$/";
$regex_flat = "/^[0-9\+]+$/";
$regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$regex_phone = "/^\+?[0-9]+[0-9 ]+$/";

// * initialize settings as default
try {
    error_reporting(E_ALL); // show all errors
    ini_set("display_errors", 1); // display errors as printable text
    ini_set("display_startup_errors", 1); // show startup errors
    ini_set("log_errors", 1); // log all errors to log file
    ini_set("error_log", $error_log_path); // set error.log file path
    date_default_timezone_set("Europe/Istanbul"); // Turkey <3
    ini_set("memory_limit", -1); // max amount of bytes php can use (-1 means, there is no limit)
    ini_set("max_execution_time", 300); // 5 mins
    ini_set("session.gc_probability", null); // garbage data probability
} catch (Exception $e) {
    echo "Ini Set Exception!" . PHP_EOL;
    die();
}

// * set max session expiring time

// ini_set('session.gc_maxlifetime', $year_in_seconds);
// session_set_cookie_params([
//     "lifetime" => $_ENV['COOKIE_MAX_EXPIRES'],
//     "path" => "session.cookie_lifetime",
//     "domain" => $_SERVER["HTTP_HOST"], 
//     "secure" => true,
//     "httponly" => true,
//     "samesite" => $samesite,
// ]);

// * start PDO
$pdo = null;

try {
    $pdo = new PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("SET CHARSET utf8mb4");
} catch (PDOException $e) {
    echo "PDO Initialization Exception!" . PHP_EOL;
    die();
}

// * attach listeners
function exceptionListener($exception) {
    ob_clean();

    echo "<code>";
    echo "<pre>";
    echo "<h1>EXCEPTION!</h1>";
    print_r($exception);
    echo "</code>";
    echo "</pre>";
    die();
}

function errorListener($severity, $message, $file, $line) {
    ob_clean();

    echo "<code>";
    echo "<pre>";
    echo "<h1>ERROR!</h1>";
    echo "<h3>Message: $message</h3>";
    echo "<h3>File: $file</h3>";
    echo "<h3>On line: $line</h3>";
    echo "</code>";
    echo "</pre>";
    die();
}

set_error_handler('errorListener');
set_exception_handler('exceptionListener');

// update language definitions
/* include_once __DIR__ . '/../language_en.php';
foreach ($lang_defaults_en as $key => $value) {
    $stmt = $pdo->prepare("INSERT INTO languages_def (language_id, keyword, value) VALUES (:language_id, :keyword, :value)");
    $stmt->bindValue(':language_id', 2, PDO::PARAM_INT);
    $stmt->bindParam(':keyword', $key, PDO::PARAM_STR);
    $stmt->bindParam(':value', $value, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
}

die(); */
