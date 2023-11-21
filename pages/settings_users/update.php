<?php

require_once __DIR__ . '/../../database/Users.php';

// check for request
$users = new Users();
// $users->avatar->value = 'assets/images/flags/tr.png';

if (get_request_method() == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $users->id->value = $data['id'];
        // $users->title->value = "users başlık";
        // $users->description->value = "users açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if (get_request_method() == 'POST') {
    try {
        $users->title->value = $_POST[$users->title->name];
        $users->income_type->value = $_POST[$users->income_type->name];

        $checks = $users->title->check() || $users->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE users SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $users->title->value, PDO::PARAM_STR);

            // .
            // .
            // .
            // .
            // .

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // $stmt->execute();

            // return to index page
        }

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else {
    // throw error: bad request
}

// show form field
include_once __DIR__ . '/_form.php';
