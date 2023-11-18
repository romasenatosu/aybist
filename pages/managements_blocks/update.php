<?php

require_once __DIR__ . '/../../database/Blocks.php';

// check for request
$blocks = new Blocks();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM blocks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $blocks->id->value = $data['id'];
        // $blocks->title->value = "blocks başlık";
        // $blocks->description->value = "blocks açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $blocks->title->value = $_POST[$blocks->title->name];
        $blocks->income_type->value = $_POST[$blocks->income_type->name];

        $checks = $blocks->title->check() || $blocks->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE blocks SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $blocks->title->value, PDO::PARAM_STR);

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
