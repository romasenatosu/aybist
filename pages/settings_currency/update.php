<?php

// create entity
$settingsCurrency = new SettingsCurrency();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields

    $stmt = $pdo->prepare("SELECT name, symbol
    FROM settings_currency
    WHERE id = :id");

    //  bind values and parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // fetch result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // close the statement
    $stmt->closeCursor();

    // show values
    $settingsCurrency->name->value = $result['name'];
    $settingsCurrency->symbol->value = $result['symbol'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $settingsCurrency->name->value = htmlspecialchars($_POST[$settingsCurrency->name->name] ?? '');
    $settingsCurrency->symbol->value = htmlspecialchars($_POST[$settingsCurrency->symbol->name] ?? '');

    // check if given data is ok
    $checks = $settingsCurrency->name->check() || $settingsCurrency->symbol->check();

    if ($checks) {
        // convert DateTime object to string

        $updated_at = date($datetime_format, $settingsCurrency->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE settings_currency SET name = :name, symbol = :symbol, updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':name', $settingsCurrency->name->value, PDO::PARAM_STR);
        $stmt->bindParam(':symbol', $settingsCurrency->symbol->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("settings_currency");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
