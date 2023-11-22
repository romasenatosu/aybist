<?php

session_set_cookie_params(365 * 24 * 60 * 60, 'session.cookie_lifetime'); // that makes 1 year
session_start();

// CREATE EXTRA CLASS FOR THIS 

class Auth {
    public mixed $user;
    private string $token;

    function __construct() {
        $this->user = true; // NOTE: make it true for now...
        $this->token = "";
    }

    public function setUser($user):void {
        $this->user = $user;
    }

    public function getUser():mixed {
        return $this->user;
    }

    public function setToken(string $token):void {
        $this->token = $token;
    }

    public function getToken():string {
        return $this->token;
    }

    public function login() {

    }

    public function changePassword() {
        
    }
}

$auth = new Auth();

// if no page was provided then redirect automatically
/* if (empty($page)) {
    if ($auth->getToken()) {
        header("Location: " . get_server() . "?locale=$locale&page=home");
    } else {
        header("Location: " . get_server() . "?locale=$locale&page=login");
    }
}
 */