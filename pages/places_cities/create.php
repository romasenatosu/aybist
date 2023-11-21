<?php

require_once __DIR__ . '/../../database/Cities.php';

$cities = new Cities();

if (get_request_method() == 'POST') {
    try {
        $cities->title->value = $_POST[$cities->title->name];
        $cities->income_type->value = $_POST[$cities->income_type->name];

        $checks = $cities->title->check() || $cities->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO cities (title) VALUES (:title)");
            $stmt->bindParam(':title', $cities->title->value, PDO::PARAM_STR);

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
