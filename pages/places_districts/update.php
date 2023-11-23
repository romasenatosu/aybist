<?php

require_once __DIR__ . '/../../database/Districts.php';

// create entity
$districts = new Districts();

// check for method
if (getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields

    $stmt = $pdo->prepare("SELECT city_id, district
    FROM districts
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
    $districts->city_id->value = $result['city_id'];
    $districts->district->value = $result['district'];
}

// check for method
if (getRequestMethod() == 'POST') {
    // grab data from form inputs

    $districts->city_id->value = htmlspecialchars($_POST[$districts->city_id->name] ?? '');
    $districts->district->value = htmlspecialchars($_POST[$districts->district->name] ?? '');

    // check if given data is ok
    $checks = $districts->city_id->check() || $districts->district->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $districts->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE districts SET city_id = :city_id, district = :district, updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':city_id', $districts->city_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':district', $districts->district->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        redirect("?locale=$locale&page=places_districts");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
