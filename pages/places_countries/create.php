<?php

require_once __DIR__ . '/../../database/Countries.php';

$countries = new Countries();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $countries->title->value = $_POST[$countries->title->name];
        $countries->income_type->value = $_POST[$countries->income_type->name];

        $checks = $countries->title->check() || $countries->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO countries (title) VALUES (:title)");
            $stmt->bindParam(':title', $countries->title->value, PDO::PARAM_STR);

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
