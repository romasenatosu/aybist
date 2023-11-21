<?php

require_once __DIR__ . '/../../database/Settings.php';

// check for request
$settings = new Settings();

if (get_request_method() == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM settings WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $settings->id->value = $data['id'];
        // $settings->title->value = "settings başlık";
        // $settings->description->value = "settings açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if (get_request_method() == 'POST') {
    try {
        $settings->title->value = $_POST[$settings->title->name];
        $settings->income_type->value = $_POST[$settings->income_type->name];

        $checks = $settings->title->check() || $settings->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE settings SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $settings->title->value, PDO::PARAM_STR);

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
