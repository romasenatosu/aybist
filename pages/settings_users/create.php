<?php

require_once __DIR__ . '/../../database/Users.php';

$users = new Users();

if (get_request_method() == 'POST') {
    try {
        $users->title->value = $_POST[$users->title->name];
        $users->income_type->value = $_POST[$users->income_type->name];

        $checks = $users->title->check() || $users->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO users (title) VALUES (:title)");
            $stmt->bindParam(':title', $users->title->value, PDO::PARAM_STR);

            // .
            // .
            // .
            // .
            // .

            // $stmt->execute();

            // return to index page
        }

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

// show form field
include_once __DIR__ . '/_form.php';
