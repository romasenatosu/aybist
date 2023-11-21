<?php

require_once __DIR__ . '/../../database/Managements.php';

// check for request
$managements = new Managements();

if (get_request_method() == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM managements WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $managements->id->value = $data['id'];
        // $managements->title->value = "managements başlık";
        // $managements->description->value = "managements açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if (get_request_method() == 'POST') {
    try {
        $managements->title->value = $_POST[$managements->title->name];
        $managements->income_type->value = $_POST[$managements->income_type->name];

        $checks = $managements->title->check() || $managements->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE managements SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $managements->title->value, PDO::PARAM_STR);

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
