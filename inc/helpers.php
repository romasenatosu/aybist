<?php

// TODO: change function names camelCase

/**
 * returns buffer with html pre tags
 * 
 * @param mixed buff
 * @return void
 */
function dump(mixed $buff): void {
    echo '<pre>';
    print_r($buff);
    echo '</pre>';
}

/**
 * get request method of script
 * 
 * @return string request_method
 */
function get_request_method(): string {
    return $_SERVER['REQUEST_METHOD'];
}

/**
 * get request uri of script
 * 
 * @return string request_uri
 */
function get_request_uri(): string {
    return $_SERVER['REQUEST_URI'];
}


/**
 * get url of the current server
 * 
 * @return string url
 */
function get_server(): string {
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/';
}

/**
 * checks if id exists within provided table
 * 
 * @param string table
 * @param int column_id
 * @return bool
 */
function check_id(string $table):bool {
    global $pdo, $id;
    $stmt = $pdo->prepare("SELECT id FROM $table WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result['id'] ?? false;
}

/**
 * Redirects user to home page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectHome(string $language_code): void {
    header("Location: " . get_server() . "?locale=$language_code&page=home");
    header("HTTP/1.1 302");
}

/**
 * Redirects user to not found error page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectNotFound(string $language_code): void {
    global $page;

    if (!str_starts_with($page, "error_")) {
        header("Location: " . get_server() . "?locale=$language_code&page=error_404");
        header("HTTP/1.1 404");
    }
}
