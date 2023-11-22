<?php

require_once __DIR__ . '/../../database/Cities.php';

// create entity
$cities = new Cities();

// check for method
if (get_request_method() == "GET") {
    // get values from database to show them in inputs fields

    $stmt = $pdo->prepare("SELECT country_id, city, zip_code 
    FROM cities
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
    $cities->country_id->value = $result['country_id'];
    $cities->city->value = $result['city'];
    $cities->zip_code->value = $result['zip_code'];
}

// check for method
if (get_request_method() == 'POST') {
    // grab data from form inputs

    $cities->country_id->value = htmlspecialchars($_POST[$cities->country_id->name] ?? '');
    $cities->city->value = htmlspecialchars($_POST[$cities->city->name] ?? '');
    $cities->zip_code->value = htmlspecialchars($_POST[$cities->zip_code->name] ?? '');

    // convert DateTime object to string
    $checks = $cities->country_id->check() || $cities->city->check() || $cities->zip_code->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $cities->created_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE cities SET country_id = :country_id, city = :city, zip_code = :zip_code, updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':country_id', $cities->country_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':city', $cities->city->value, PDO::PARAM_STR);
        $stmt->bindParam(':zip_code', $cities->zip_code->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        header("Location: " . get_server() . "?locale=$locale&page=places_cities");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
