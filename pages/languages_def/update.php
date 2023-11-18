<?php

require_once __DIR__ . '/../../database/LanguagesDef.php';

// check for request
$languagesDef = new LanguagesDef();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $stmt = $pdo->prepare("SELECT * FROM languagesDef WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $languagesDef->id->value = $data['id'];
        // $languagesDef->title->value = "languagesDef başlık";
        // $languagesDef->description->value = "languagesDef açıklama";

    } catch (Exception $e) {
        dump($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $languagesDef->title->value = $_POST[$languagesDef->title->name];
        $languagesDef->income_type->value = $_POST[$languagesDef->income_type->name];

        $checks = $languagesDef->title->check() || $languagesDef->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE languagesDef SET title = :title WHERE id = :id");
            $stmt->bindParam(':title', $languagesDef->title->value, PDO::PARAM_STR);

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
