<?php

require_once __DIR__ . '/../../database/Raporlar.php';

$raporlar = new Raporlar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id = intval(htmlspecialchars($_GET['id'] ?? ''));
        
        $raporlar->member_name_surname->value = $_POST[$raporlar->member_name_surname->name];
        $raporlar->income_type->value = $_POST[$raporlar->income_type->name];

        $checks = $raporlar->member_name_surname->check() || $raporlar->income_type->check();

        if ($checks) {
            $stmt = $pdo->prepare("INSERT INTO raporlar (member_name_surname) VALUES (:member_name_surname)");
            $stmt->bindParam(':member_name_surname', $raporlar->member_name_surname->value, PDO::PARAM_STR);

            // .
            // .
            // .
            // .
            // .

            // $stmt->execute();

            // return to index page
        }

    } catch (Exception $e) {
        print_pre($e);
        die();
        // do something when error happens
    }
}

// show form field
include_once __DIR__ . '/_form.php';
