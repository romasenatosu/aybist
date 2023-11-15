<?php

require_once __DIR__ . '/../../database/Raporlar.php';

// check for request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $raporlar = new Raporlar();

    try {
        $id = intval(htmlspecialchars($_GET['id'] ?? ''));
    
        $stmt = $pdo->prepare("SELECT * FROM raporlar WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // $stmt->execute();
    
        $rapor = $stmt->fetch(PDO::FETCH_ASSOC);
        print_pre($rapor);
    
        $raporlar->id->value = $rapor['id'];

    } catch (Exception $e) {
        print_pre($e);
        die();
        // do something when error happens
    }
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $raporlar = new Raporlar();

    try {
        $id = intval(htmlspecialchars($_GET['id'] ?? ''));
        
        $raporlar->member_name_surname->value = $_POST[$raporlar->member_name_surname->name];
        $raporlar->income_type->value = $_POST[$raporlar->income_type->name];

        $checks = $raporlar->member_name_surname->check() || $raporlar->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("UPDATE raporlar SET member_name_surname = :member_name_surname WHERE id = :id");
            $stmt->bindParam(':member_name_surname', $raporlar->member_name_surname->value, PDO::PARAM_STR);

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
        print_pre($e);
        die();
        // do something when error happens
    }
}

else {
    // throw error: bad request
}

// submit button
$text_action = 'Düzenle';

// show form field
include_once __DIR__ . '/_form.php';
