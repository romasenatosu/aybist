<?php

require_once __DIR__ . '/../../database/Test.php';

$test = new Test();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $test->title->value = $_POST[$test->title->name];
        $test->income_type->value = $_POST[$test->income_type->name];

        $checks = $test->title->check() || $test->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO test (title) VALUES (:title)");
            $stmt->bindParam(':title', $test->title->value, PDO::PARAM_STR);

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
