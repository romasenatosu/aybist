<?php

require_once __DIR__ . '/../../database/Floors.php';

$floors = new Floors();

if (get_request_method() == 'POST') {
    try {
        $floors->title->value = $_POST[$floors->title->name];
        $floors->income_type->value = $_POST[$floors->income_type->name];

        $checks = $floors->title->check() || $floors->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO floors (title) VALUES (:title)");
            $stmt->bindParam(':title', $floors->title->value, PDO::PARAM_STR);

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
