<?php

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/../database/Users.php';

// CREATE EXTRA CLASS FOR THIS 

class Auth {
    public Users $user;
    // private string $token;

    function __construct() {
        $this->user = new Users();
        // $this->token = "";
    }

    public function setUser(Users $user):void {
        $this->user = $user;
    }

    public function getUser():Users {
        return $this->user;
    }

/*     public function setToken(string $token):void {
        $this->token = $token;
    }

    public function getToken():string {
        return $this->token;
    } */

    /**
     * Lets the registered user to sign in with email and password
     * 
     * @return bool
     */
    public function login(): bool {
        global $pdo;

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
            // get user information
            $stmt = $pdo->prepare("SELECT u.id, u.fullname, u.email, u.phone, c.phone_code, u.address, u.password,
                                    u.avatar, u.is_admin, u.created_at, u.updated_at
                                    FROM users u
                                    INNER JOIN countries c ON c.id = u.phone_code_id
                                    WHERE u.id = :id");
            $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            // if it is verified then grab user info
            $user_info = [
                "id" => $result["id"],
                "fullname" => $result["fullname"],
                "phone" => $result["phone"],
                "phone_code" => $result["phone_code"],
                "address" => $result["address"],
                "avatar" => $result["avatar"],
                "is_admin" => $result["is_admin"],
                "created_at" => $result["created_at"],
                "updated_at" => $result["updated_at"],
            ];
            $_SESSION['user'] = json_encode($user_info);
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
        global $locale;

        unset($_SESSION['user']);
        redirectAuthenticate($locale);
    }

    public function changePassword() {
        
    }
}

$auth = new Auth();

// if user did not sign in then redirect user to login page
if (!isset($_SESSION['user'])) {
    redirectAuthenticate($locale);
}
