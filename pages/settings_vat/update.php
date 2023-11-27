<?php

// create entity
$settingsVat = new SettingsVat();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields

    $stmt = $pdo->prepare("SELECT name, rate
    FROM settings_vat
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
    $settingsVat->name->value = $result['name'];
    $settingsVat->rate->value = $result['rate'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $settingsVat->name->value = htmlspecialchars($_POST[$settingsVat->name->name] ?? '');
    $settingsVat->rate->value = htmlspecialchars($_POST[$settingsVat->rate->name] ?? '');

    // check if given data is ok
    $checks = $settingsVat->name->check() && $settingsVat->rate->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $settingsVat->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE settings_vat SET name = :name, rate = :rate, updated_at = :updated_at WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':name', $settingsVat->name->value, PDO::PARAM_STR);
        $stmt->bindParam(':rate', $settingsVat->rate->value, PDO::PARAM_INT);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("settings_vat");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
