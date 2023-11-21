<?php

require_once __DIR__ . '/../../database/Cities.php';

// check for request
$cities = new Cities();

if (get_request_method() == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM cities WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $cities->id->value = $data['id'];
        // $cities->title->value = "cities başlık";
        // $cities->description->value = "cities açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if (get_request_method() == 'POST') {
    try {
        $cities->title->value = $_POST[$cities->title->name];
        $cities->income_type->value = $_POST[$cities->income_type->name];

        $checks = $cities->title->check() || $cities->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE cities SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $cities->title->value, PDO::PARAM_STR);

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
