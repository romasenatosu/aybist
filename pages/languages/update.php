<?php

require_once __DIR__ . '/../../database/Languages.php';

// check for request
$languages = new Languages();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM languages WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $languages->id->value = $data['id'];
        // $languages->title->value = "languages başlık";
        // $languages->description->value = "languages açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $languages->title->value = $_POST[$languages->title->name];
        $languages->income_type->value = $_POST[$languages->income_type->name];

        $checks = $languages->title->check() || $languages->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE languages SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $languages->title->value, PDO::PARAM_STR);

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
