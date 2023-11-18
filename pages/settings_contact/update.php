<?php

require_once __DIR__ . '/../../database/SettingsContact.php';

// check for request
$settingsContact = new SettingsContact();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM settingsContact WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $settingsContact->id->value = $data['id'];
        // $settingsContact->title->value = "settingsContact başlık";
        // $settingsContact->description->value = "settingsContact açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $settingsContact->title->value = $_POST[$settingsContact->title->name];
        $settingsContact->income_type->value = $_POST[$settingsContact->income_type->name];

        $checks = $settingsContact->title->check() || $settingsContact->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE settingsContact SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $settingsContact->title->value, PDO::PARAM_STR);

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
