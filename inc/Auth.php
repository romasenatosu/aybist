<?php

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

class Auth {
    private Users $user;
    // private string $token;

    function __construct() {
        $this->user = new Users();
        // $this->token = "";
    }

    public function setUser(Users $users): void {
        $this->user = $users;
    }

    public function getUser(): Users {
        return $this->user;
    }

    /**
     * gets user information from database and saves it to session as json encoded
     * 
     * @param PDO pdo
     * @param int id
     * @return void
     */
    public function encodeUserSession(PDO $pdo, int $id):void {
        // get user information
        $stmt = $pdo->prepare("SELECT u.id, u.fullname, u.email, u.phone, c.phone_code, u.address, u.password,
        u.avatar, u.is_admin, u.created_at, u.updated_at
        FROM users u
        INNER JOIN countries c ON c.id = u.phone_code_id
        WHERE u.id = :id");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        // if it is verified then grab user info
        $user_info = [
            "id" => $result["id"],
            "fullname" => $result["fullname"],
            "email" => $result["email"],
            "phone" => $result["phone"],
            "phone_code" => $result["phone_code"],
            "address" => $result["address"],
            "avatar" => $result["avatar"],
            "is_admin" => $result["is_admin"],
            "created_at" => $result["created_at"],
            "updated_at" => $result["updated_at"],
        ];

        $_SESSION['user'] = json_encode($user_info);
    }

    /**
     * decodes user session array
     * 
     * @return array
     */
    public function decodeUserSession(): array {
        $user_session = [];

        if (session_status() == PHP_SESSION_ACTIVE) {
            if (isset($_SESSION['user'])) {
                $user_session = json_decode($_SESSION['user'], true);
            }
        }

        return $user_session;
    }

    /**
     * returns the id of currently logged-in user
     * 
     * @return int|null
     */
    public function getCurrentUserId(): int|null {
        $user_session = $this->decodeUserSession();
        $user_id = filter_var($user_session['id'] ?? null, FILTER_VALIDATE_INT);
        return ($user_id > 0) ? $user_id : null;
    }

    /**
     * Lets the registered user to sign in with email and password
     * 
     * @return bool
     */
    public function login(PDO $pdo): bool {
        // user info
        $email = $this->user->email->value;
        $plain_password = $this->user->password->value;

        // get the hashed password by email
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        $user_id = $result['id'];
        $hash_password = $result['password'];

        // verify password
        if (password_verify($plain_password, $hash_password)) {
            // save user session
            $this->encodeUserSession($pdo, $user_id);
            return true;
        }

        return false;
    }

    /**
     * Lets the registered sign out
     * 
     * @return bool
     */
    public function logout(): bool {
        unset($_SESSION['user']);
        Helpers::redirectAuthenticate();
    }

    public function changePassword() {
        
    }
}

$auth = new Auth();
