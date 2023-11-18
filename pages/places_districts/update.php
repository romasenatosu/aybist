<?php

require_once __DIR__ . '/../../database/Districts.php';

// check for request
$districts = new Districts();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM districts WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $districts->id->value = $data['id'];
        // $districts->title->value = "districts başlık";
        // $districts->description->value = "districts açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $districts->title->value = $_POST[$districts->title->name];
        $districts->income_type->value = $_POST[$districts->income_type->name];

        $checks = $districts->title->check() || $districts->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE districts SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $districts->title->value, PDO::PARAM_STR);

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
