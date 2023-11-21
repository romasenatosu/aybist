<?php

require_once __DIR__ . '/../../database/SettingsVat.php';

// check for request
$settingsVat = new SettingsVat();

if (get_request_method() == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM settingsVat WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $settingsVat->id->value = $data['id'];
        // $settingsVat->title->value = "settingsVat başlık";
        // $settingsVat->description->value = "settingsVat açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if (get_request_method() == 'POST') {
    try {
        $settingsVat->title->value = $_POST[$settingsVat->title->name];
        $settingsVat->income_type->value = $_POST[$settingsVat->income_type->name];

        $checks = $settingsVat->title->check() || $settingsVat->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE settingsVat SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $settingsVat->title->value, PDO::PARAM_STR);

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
