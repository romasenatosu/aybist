<?php

require_once __DIR__ . '/../../database/Languages.php';

$languages = new Languages();

if (get_request_method() == 'POST') {
    try {
        $languages->title->value = $_POST[$languages->title->name];
        $languages->income_type->value = $_POST[$languages->income_type->name];

        $checks = $languages->title->check() || $languages->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO languages (title) VALUES (:title)");
            $stmt->bindParam(':title', $languages->title->value, PDO::PARAM_STR);

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
