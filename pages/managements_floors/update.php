<?php

require_once __DIR__ . '/../../database/Floors.php';

// create entity
$floors = new Floors();

// check for method
if (getRequestMethod() == "GET") {

    // get values from database to show them in inputs fields
    $stmt = $pdo->prepare("SELECT floor 
    FROM floors
    WHERE id = :id");
    
    //  bind values and parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // fetch result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // close statement
    $stmt->closeCursor();

    // show values
    $floors->floor->value = $result['floor'];
}

// check for method
if (getRequestMethod() == 'POST') {
    // grab data from form inputs

    $floors->floor->value = htmlspecialchars($_POST[$floors->floor->name] ?? '');

    // check if given data is ok
    $checks = $floors->floor->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $floors->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE floors SET floor = :floor, updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':floor', $floors->floor->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        redirect("?locale=$locale&page=managements_floors");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
