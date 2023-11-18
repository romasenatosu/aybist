<?php

require_once __DIR__ . '/../../database/SettingsVat.php';

$settingsVat = new SettingsVat();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $settingsVat->title->value = $_POST[$settingsVat->title->name];
        $settingsVat->income_type->value = $_POST[$settingsVat->income_type->name];

        $checks = $settingsVat->title->check() || $settingsVat->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO settingsVat (title) VALUES (:title)");
            $stmt->bindParam(':title', $settingsVat->title->value, PDO::PARAM_STR);

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
