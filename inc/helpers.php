<?php

/**
 * returns buffer with html pre tags
 * 
 * @param mixed buff
 * @return void
 */
function dump(mixed ...$buff): void {
    array_map(function ($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }, $buff);
}

/**
 * get request method of script
 * 
 * @return string request_method
 */
function getRequestMethod(): string {
    return $_SERVER['REQUEST_METHOD'];
}

/**
 * get request uri of script
 * 
 * @return string request_uri
 */
function getRequestUri(): string {
    return $_SERVER['REQUEST_URI'];
}


/**
 * get url of the current server
 * 
 * @return string url
 */
function getServer(): string {
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/';
}

/**
 * checks if id exists within provided table
 * 
 * @param string table
 * @param int column_id
 * @return bool
 */
function checkId(string $table):bool {
    global $pdo, $id;
    $stmt = $pdo->prepare("SELECT id FROM $table WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result['id'] ?? false;
}

/**
 * Redirects user to desired route
 * 
 * @param string route
 * @return void
 */
function redirect(string $route): void {
    header("Location: " . getServer() .$route);
    header("HTTP/1.1 302 Redirected");
    exit(0);
}

/**
 * Redirects user to home page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectHome(string $language_code): void {
    redirect("?locale=$language_code&page=home");
    header("HTTP/1.1 302");
    exit(0);
}

/**
 * Redirects user to invalid request error page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectInvalidRequest(string $language_code): void {
    global $page;

    if (!str_starts_with($page, "error_")) {
        redirect("?locale=$language_code&page=error_400");
        // header("HTTP/1.1 400 Invalid Request");
        exit(0);
    }
}

/**
 * Redirects user to unauthorized access error page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectUnauthorized(string $language_code): void {
    global $page;

    if (!str_starts_with($page, "error_")) {
        redirect("?locale=$language_code&page=error_401");
        // header("HTTP/1.1 401 Unauthorized");
        exit(0);
    }
}

/**
 * Redirects user to payment required error page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectPaymentRequired(string $language_code): void {
    global $page;

    if (!str_starts_with($page, "error_")) {
        redirect("?locale=$language_code&page=error_402");
        // header("HTTP/1.1 402 Payment Required");
        exit(0);
    }
}

/**
 * Redirects user to not found error page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectAccessDenied(string $language_code): void {
    global $page;

    if (!str_starts_with($page, "error_")) {
        redirect("?locale=$language_code&page=error_403");
        // header("HTTP/1.1 403 Access Denied");
        exit(0);
    }
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
        redirect("?locale=$language_code&page=error_404");
        // header("HTTP/1.1 404 Not Found");
        exit(0);
    }
}

/**
 * Redirects user to server error page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectServerError(string $language_code): void {
    global $page;

    if (!str_starts_with($page, "error_")) {
        redirect("?locale=$language_code&page=error_500");
        // header("HTTP/1.1 500 Server Error");
        exit(0);
    }
}

/**
 * Redirects user to server error page with the current locale
 * 
 * @param string language_code
 * @return void
 */
function redirectAuthenticate(string $language_code): void {
    global $page;

    if (!str_starts_with($page, "login")) {
        redirect("?locale=$language_code&page=login");
        header("HTTP/1.1 302 Redirected");
        exit(0);
    }
}
