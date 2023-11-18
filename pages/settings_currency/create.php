<?php

require_once __DIR__ . '/../../database/SettingsCurrency.php';

$settingsCurrency = new SettingsCurrency();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $settingsCurrency->title->value = $_POST[$settingsCurrency->title->name];
        $settingsCurrency->income_type->value = $_POST[$settingsCurrency->income_type->name];

        $checks = $settingsCurrency->title->check() || $settingsCurrency->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO settingsCurrency (title) VALUES (:title)");
            $stmt->bindParam(':title', $settingsCurrency->title->value, PDO::PARAM_STR);

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
