<?php

require_once __DIR__ . '/../../database/Floors.php';

// check for request
$floors = new Floors();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM floors WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $floors->id->value = $data['id'];
        // $floors->title->value = "floors başlık";
        // $floors->description->value = "floors açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $floors->title->value = $_POST[$floors->title->name];
        $floors->income_type->value = $_POST[$floors->income_type->name];

        $checks = $floors->title->check() || $floors->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE floors SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $floors->title->value, PDO::PARAM_STR);

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
