<?php

require_once __DIR__ . '/../../database/Flats.php';

// check for request
$flats = new Flats();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM flats WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $flats->id->value = $data['id'];
        // $flats->title->value = "flats başlık";
        // $flats->description->value = "flats açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $flats->title->value = $_POST[$flats->title->name];
        $flats->income_type->value = $_POST[$flats->income_type->name];

        $checks = $flats->title->check() || $flats->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE flats SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $flats->title->value, PDO::PARAM_STR);

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
