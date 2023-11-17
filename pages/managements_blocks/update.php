<?php

require_once __DIR__ . '/../../database/Test.php';

// check for request
$test = new Test();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM test WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $test->id->value = $data['id'];
        // $test->title->value = "test başlık";
        // $test->description->value = "test açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $test->title->value = $_POST[$test->title->name];
        $test->income_type->value = $_POST[$test->income_type->name];

        $checks = $test->title->check() || $test->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE test SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $test->title->value, PDO::PARAM_STR);

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
