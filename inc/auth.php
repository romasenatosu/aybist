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

if ($auth->getUser()) {
    // redirect to home page after login
    $page = htmlspecialchars($_GET['page']);
    if (empty($page)) {
        header("Location: " . $_SERVER['HTTP_SERVER'] . "/?page=home");
    }

} else {
    // redirect to login page
}
