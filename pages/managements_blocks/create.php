<?php

require_once __DIR__ . '/../../database/Blocks.php';

$blocks = new Blocks();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $blocks->title->value = $_POST[$blocks->title->name];
        $blocks->income_type->value = $_POST[$blocks->income_type->name];

        $checks = $blocks->title->check() || $blocks->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO blocks (title) VALUES (:title)");
            $stmt->bindParam(':title', $blocks->title->value, PDO::PARAM_STR);

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
