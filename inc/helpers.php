<?php

function dump(mixed $buff): void {
    echo '<pre>';
    print_r($buff);
    echo '</pre>';
}

function get_request_method(): string {
    return $_SERVER['REQUEST_METHOD'];
}

function get_request_uri(): string {
    return $_SERVER['REQUEST_URI'];
}

function get_server(): string {
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/';
}
