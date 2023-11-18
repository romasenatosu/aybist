<?php

require_once __DIR__ . '/../../database/Flats.php';

$flats = new Flats();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $flats->title->value = $_POST[$flats->title->name];
        $flats->income_type->value = $_POST[$flats->income_type->name];

        $checks = $flats->title->check() || $flats->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO flats (title) VALUES (:title)");
            $stmt->bindParam(':title', $flats->title->value, PDO::PARAM_STR);

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
