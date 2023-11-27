<?php

// create entity
$cities = new Cities();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $cities->country_id->value = htmlspecialchars($_POST[$cities->country_id->name] ?? '');
    $cities->city->value = htmlspecialchars($_POST[$cities->city->name] ?? '');
    $cities->zip_code->value = htmlspecialchars($_POST[$cities->zip_code->name] ?? '');

    // check if given data is ok
    $checks = $cities->country_id->check() && $cities->city->check() && $cities->zip_code->check();

    if ($checks) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $cities->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $cities->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("INSERT INTO cities (country_id, city, zip_code, created_at, updated_at)
                                    VALUES (:country_id, :city, :zip_code, :created_at, :updated_at)");

        //  bind values and parameters
        $stmt->bindParam(':country_id', $cities->country_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':city', $cities->city->value, PDO::PARAM_STR);
        $stmt->bindParam(':zip_code', $cities->zip_code->value, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("places_cities");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
