<?php

require_once __DIR__ . '/../../database/Districts.php';

$districts = new Districts();

if (get_request_method() == 'POST') {
    try {
        $districts->title->value = $_POST[$districts->title->name];
        $districts->income_type->value = $_POST[$districts->income_type->name];

        $checks = $districts->title->check() || $districts->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO districts (title) VALUES (:title)");
            $stmt->bindParam(':title', $districts->title->value, PDO::PARAM_STR);

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
