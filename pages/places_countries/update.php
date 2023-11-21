<?php

require_once __DIR__ . '/../../database/Countries.php';

// check for request
$countries = new Countries();

if (get_request_method() == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM countries WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $countries->id->value = $data['id'];
        // $countries->title->value = "countries başlık";
        // $countries->description->value = "countries açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if (get_request_method() == 'POST') {
    try {
        $countries->title->value = $_POST[$countries->title->name];
        $countries->income_type->value = $_POST[$countries->income_type->name];

        $checks = $countries->title->check() || $countries->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE countries SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $countries->title->value, PDO::PARAM_STR);

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
