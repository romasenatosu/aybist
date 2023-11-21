<?php

require_once __DIR__ . '/../../database/SettingsCurrency.php';

// check for request
$settingsCurrency = new SettingsCurrency();

if (get_request_method() == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM settingsCurrency WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $settingsCurrency->id->value = $data['id'];
        // $settingsCurrency->title->value = "settingsCurrency başlık";
        // $settingsCurrency->description->value = "settingsCurrency açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if (get_request_method() == 'POST') {
    try {
        $settingsCurrency->title->value = $_POST[$settingsCurrency->title->name];
        $settingsCurrency->income_type->value = $_POST[$settingsCurrency->income_type->name];

        $checks = $settingsCurrency->title->check() || $settingsCurrency->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE settingsCurrency SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $settingsCurrency->title->value, PDO::PARAM_STR);

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
