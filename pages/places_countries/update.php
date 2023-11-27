<?php

// create entity
$countries = new Countries();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields

    $stmt = $pdo->prepare("SELECT country, phone_code 
    FROM countries
    WHERE id = :id");

    //  bind values and parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // fetch result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // close the statement
    $stmt->closeCursor();

    // grab data from form inputs
    $countries->country->value = $result['country'];
    $countries->phone_code->value = $result['phone_code'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $countries->country->value = htmlspecialchars($_POST[$countries->country->name] ?? '');
    $countries->phone_code->value = htmlspecialchars($_POST[$countries->phone_code->name] ?? '');

    // check if given data is ok
    $checks = $countries->country->check() && $countries->phone_code->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $countries->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE countries SET country = :country, phone_code = :phone_code, updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':country', $countries->country->value, PDO::PARAM_STR);
        $stmt->bindParam(':phone_code', $countries->phone_code->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("places_countries");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
