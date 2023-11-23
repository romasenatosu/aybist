<?php

require_once __DIR__ . '/../../database/Floors.php';

// create entity
$floors = new Floors();

// check for method
if (getRequestMethod() == 'POST') {
    // grab data from form inputs

    $floors->language_id->value = getLocaleId($locale);
    $floors->floor->value = htmlspecialchars($_POST[$floors->floor->name] ?? '');

    // check if given data is ok
    $checks = $floors->floor->check();

    if ($checks) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $floors->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $floors->updated_at->value->getTimestamp());

        // get all locale id to create this entity for each one of them
        $all_locale_id = getAllLocaleId();
        foreach ($all_locale_id as $locale_id) {
            // sql statement
            $stmt = $pdo->prepare("INSERT INTO floors (language_id, floor, created_at, updated_at)
                                     VALUES (:language_id, :floor, :created_at, :updated_at)");

            //  bind values and parameters
            $stmt->bindValue(':language_id', $locale_id['id'], PDO::PARAM_INT);
            $stmt->bindParam(':floor', $floors->floor->value, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

            // flush database
            $stmt->execute();

            // close the statement
            $stmt->closeCursor();
        }

        // redirect to index page if everything is successfull
        redirect("?locale=$locale&page=managements_floors");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
