<?php

session_set_cookie_params(365 * 24 * 60 * 60, 'session.cookie_lifetime'); // that makes 1 year
session_start();

// CREATE EXTRA CLASS FOR THIS 

class Auth {
    public $user;

    function __construct() {
        $this->user = true; // NOTE: make it true for now...
    }


    function setUser($user):void {
        $this->user = $user;
    }

    function getUser() {
        return $this->user;
    }
}

$auth = new Auth();

// if no page was provided then redirect automatically
if (empty($page)) {
    if ($auth->getUser()) {
        header("Location: " . get_server() . "?locale=$locale&page=home");
    } else {
        header("Location: " . get_server() . "?locale=$locale&page=login");
    }
}
