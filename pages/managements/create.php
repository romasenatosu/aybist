<?php

require_once __DIR__ . '/../../database/Managements.php';

$managements = new Managements();

if (get_request_method() == 'POST') {
    try {
        $managements->title->value = $_POST[$managements->title->name];
        $managements->income_type->value = $_POST[$managements->income_type->name];

        $checks = $managements->title->check() || $managements->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO managements (title) VALUES (:title)");
            $stmt->bindParam(':title', $managements->title->value, PDO::PARAM_STR);

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
