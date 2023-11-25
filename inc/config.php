<?php declare(strict_types = 1); // use strict variable types

// program configs

// language
$default_locale = "tr";
$lang = [];
$language_id = 0;

// date
$date_format = "Y-m-d";
$datetime_format = "Y-m-d H:i:s";

// uploading
$photo_files_extensions = ".jpg, .jpeg, .png";
$document_files_extensions = ".pdf, .doc, .docx, .rtf, .txt, .csv";
$upload_dir = __DIR__ . "/uploads";

// the path of the error.log file
$error_log_path = __DIR__ . "/../error.log";

// passwords
$hash_options = [
    'cost' => 12 // 4 - 32
];
$hash_algorithm = PASSWORD_BCRYPT;

// table rendering
$max_abbr = 25;

// get URL parameters
$request_uri = $_SERVER["REQUEST_URI"];
$queries = explode("/", $request_uri);
array_shift($queries);

$locale = htmlspecialchars($queries[0] ?? '');
$page = htmlspecialchars($queries[1] ?? '');
$action = htmlspecialchars($queries[2] ?? '');
$id = filter_var(htmlspecialchars($queries[3] ?? ''), FILTER_VALIDATE_INT);

// site title
define('default_title', 'Aybist');
$title = default_title;

// please write all regex in this format "/^[YOUR REGEX]$/"
$regex_url = "/^(?:[a-zA-Z]:\\|[\/\\])?([a-zA-Z0-9]+[\/\\])+([a-zA-Z0-9]+\.[a-zA-Z0-9]+)$/";
$regex_alpha_numeric = "/^[a-zA-Z0-9 çÇğĞıİöÖşŞüÜ]+$/";
$regex_alpha = "/^[a-zA-Z çÇğĞıİöÖşŞüÜ]+$/";
$regex_keywords = "/^[a-zA-Z0-9çÇğĞıİöÖşŞüÜ]+(?:,\s*[a-zA-Z0-9çÇğĞıİöÖşŞüÜ]+)*$/";
$regex_lang_code = "/^[a-zA-Z_]+$/";
$regex_numeric = "/^[0-9]+$/";
$regex_flat = "/^[0-9\+]+$/";
$regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$regex_phone = "/^\+?[0-9]+[0-9 ]+$/";

// initialization settings as default
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
    var_dump($e);
    echo "Ini Set Exception!" . PHP_EOL;
    die();
}

/* An empty value means that no SameSite cookie attribute will be set
Lax and Strict mean that the cookie will not be sent cross-domain for POST requests;
Lax will sent the cookie for cross-domain GET requests, while Strict will not. */
$samesite = '';
$year_in_seconds = 60 * 60 * 24 * 365;

// ini_set('session.gc_maxlifetime', $year_in_seconds);

// session_set_cookie_params([
//     "lifetime" => $year_in_seconds,
//     "path" => "session.cookie_lifetime",
//     "domain" => $_SERVER["HTTP_HOST"], 
//     "secure" => true,
//     "httponly" => true,
//     "samesite" => $samesite,
// ]);

// database configurations
$hostname = "localhost";
$database = "aybist";
$database_username = "muhammed";
$database_password = "muhammed.1234";
$database_port = 3306;
$dsn = "mysql:host=$hostname;dbname=$database";
$pdo = null;

// start PDO
try {
    $pdo = new PDO($dsn, $database_username, $database_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("SET CHARSET utf8mb4");
} catch (Exception $e) {
    var_dump($e);
    echo "PDO Initialization Exception!" . PHP_EOL;
    die();
}

// attach listeners

function exceptionListener($exception) {
    var_dump($exception);
    die();
}

function errorListener($severity, $message, $file, $line) {
    echo "message: $message line:$line file:$file";
    // var_dump($severity, $message, $file, $line);
    die();
}

function requestListener() {
    // TODO: insert into notifications

    // echo $_SERVER['REQUEST_METHOD'] . PHP_EOL;
}

function visitListener() {
    global $pdo, $datetime_format;

    // WARN: can't find user id
    // INFO: what about saving per 24 hours?

    // get user id from session if it is available
    $user_id = null;
    if (session_status() == PHP_SESSION_ACTIVE) {
        $user_id = intval($_SESSION['user']['id']);
    }

    // get ip address of the client (ipv4 or ipv6)
    $ip = $_SERVER['REMOTE_ADDR'];

    // create datetime
    $nowDateTime = new DateTime();
    $created_at = date($datetime_format, $nowDateTime->getTimestamp());
    $updated_at = date($datetime_format, $nowDateTime->getTimestamp());

    // notifications ips table
    $stmt = $pdo->prepare("INSERT INTO notifications_ips (user_id, ip, created_at, updated_at) 
                        VALUES (:user_id, :ip, :created_at, :updated_at)");
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
    $stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
    $stmt->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);

    // be careful about unique ip addresses
    try {
        $stmt->execute();

    } catch (Exception $e) {

    } finally {
        $stmt->closeCursor();
    }
}

// run error/exception listeners
set_error_handler('errorListener');
set_exception_handler('exceptionListener');

// run request listener and log them
// requestListener();

// run client ip listener
// visitListener();

// remove unnecessary variables
unset($samesite, $year_in_seconds);
unset($hostname, $database, $database_username, $database_password, $database_port, $dsn);
