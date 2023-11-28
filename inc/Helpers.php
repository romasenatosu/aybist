<?php

class Helpers {
    /**
     * returns buffer with html pre tags
     * 
     * @param mixed buff
     * @return void
     */
    public static function dump(mixed ...$buff): void {
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
    public static function getRequestMethod(): string {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * get uri of request
     * 
     * @return string uri
     */
    public static function getRequestUri(): string {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * get url of the current server
     * 
     * @return string url
     */
    public static function getHost(): string {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/';
    }

    /**
     * get server name
     * 
     * @return string url
     */
    public static function getServer(): string {
        return $_SERVER['SERVER_NAME'];
    }

    /**
     * checks if id exists within provided table
     * 
     * @param string table
     * @param int column_id
     * @return bool
     */
    public static function checkId(string $table):bool {
        global $pdo, $id;
        $stmt = $pdo->prepare("SELECT id FROM $table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
    
        return $result['id'] ?? false;
    }

    /**
     * Refreshes the page with the desired route
     * 
     * @param string route
     * @param int after
     * @return void
     */
    public static function refresh(string $route="/", int $after=0): void {
        header("Refresh:$after; url=$route");
        exit(0);
    }
    
    /**
     * Redirects user to desired route
     * 
     * @param string route
     * @return void
     */
    public static function redirect(string $route, string $redirect_method="HTTP/1.1 302 Redirected"): void {
        global $locale;
        ob_clean();
        header("Location: " . "/$locale/$route");
        // header($redirect_method);
        exit(0);
    }

    /**
     * Redirects user to home page with the current locale
     * 
     * @return void
     */
    public static function redirectHome(): void {
        Helpers::redirect("home");
    }
    
    /**
     * Redirects user to invalid request error page with the current locale
     * 
     * @return void
     */
    public static function redirectInvalidRequest(): void {
        Helpers::redirect("error_400", "HTTP/1.1 400 Invalid Request");
    }
    
    /**
     * Redirects user to unauthorized access error page with the current locale
     * 
     * @return void
     */
    public static function redirectUnauthorized(): void {
        Helpers::redirect("error_401", "HTTP/1.1 401 Unauthorized");
    }
    
    /**
     * Redirects user to payment required error page with the current locale
     * 
     * @return void
     */
    public static function redirectPaymentRequired(): void {
        Helpers::redirect("error_402", "HTTP/1.1 402 Payment Required");
    }
    
    /**
     * Redirects user to not found error page with the current locale
     * 
     * @return void
     */
    public static function redirectAccessDenied(): void {
        Helpers::redirect("error_403", "HTTP/1.1 403 Access Denied");
    }
    
    /**
     * Redirects user to not found error page with the current locale
     * 
     * @return void
     */
    public static function redirectNotFound(): void {
        Helpers::redirect("error_404", "HTTP/1.1 404 Not Found");
    }
    
    /**
     * Redirects user to method not allowed error page with the current locale
     * 
     * @return void
     */
    public static function redirectMethodNotAllowed(): void {
        Helpers::redirect("error_405", "HTTP/1.1 405 Method Not Allowed");
    }
    
    /**
     * Redirects user to server error page with the current locale
     * 
     * @return void
     */
    public static function redirectServerError(): void {
        Helpers::redirect("error_500", "HTTP/1.1 500 Server Error");
    }
    
    /**
     * Redirects user to server error page with the current locale
     * 
     * @return void
     */
    public static function redirectAuthenticate(): void {
        Helpers::redirect("login");
    }

    /**
     * checks for allowed methods for desired path
     * 
     * @param string path
     * @param array allowed_methods
     * @return string
     */
    public static function checkMethods(string $path, array $allowed_methods=["GET"]):string {
        // get requested method from server
        $method = Helpers::getRequestMethod();

        // check if method is in allowed methods otherwise redirect to method not allowed error page
        if (in_array($method, $allowed_methods)) {
            return __DIR__ . '/../' . $path;
        }

        Helpers::redirectMethodNotAllowed();
    }

    /**
     * Useful when uploading new file to server
     * 
     * @param ?array file_element
     * @return array status of file uploading
     */
    public static function upload(?array $file_element): array {
        global $photo_files_extensions, $upload_dir, $lang;

        $result = ["code" => false, "msg" => "", "file" => null];

        if (is_null($file_element)) {
            return $result;
        }

        $extensions = str_replace('.', '', $photo_files_extensions);
        $allowed_extensions = explode(', ', $extensions);
    
        $file_name = $file_element['name'];
        $file_error = $file_element['error'];
        $file_tmp = $file_element['tmp_name'];

        // check for uploading errors
        if ($file_error === UPLOAD_ERR_OK) {
            // get extension of file by more secure way
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name_only = pathinfo($file_name, PATHINFO_FILENAME);
    
            // check for allowed extensions
            if (in_array($file_extension, $allowed_extensions)) {
                // create unique file name
                $unique_file_name = sprintf("%s_%s.%s", $file_name_only, uniqid(), $file_extension);
                $target = $upload_dir . $unique_file_name;
    
                // check if target file exists
                if (file_exists($target)) {
                    $result['msg'] = $lang['file_exists'];
                } else {
                    // upload file
                    if (move_uploaded_file($file_tmp, $target)) {
                        $result['code'] = true;
                        $result['msg'] = $lang['file_success'];
                        $result['file'] = $_ENV['PATH_UPLOAD_DIR'] . $unique_file_name;
                    } else {
                        $result['msg'] = $lang['file_fail'];
                    }
                }
            } else {
                $result['msg'] = sprintf($lang['file_invalid_extension'], $photo_files_extensions);
            }
        } else {
            $result['msg'] = sprintf($lang['file_upload_error'], $file_error);
        }
    
        return $result;
    }

    /**
     * Checks if all values are true
     * 
     * @param array values
     * @return bool
     */
    public static function all(array $values): bool {
        return array_reduce($values, function ($carry, $item) {
            return $carry && $item;
        }, true);
    }
}






