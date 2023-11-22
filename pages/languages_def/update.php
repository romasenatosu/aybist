<?php

require_once __DIR__ . '/../../database/LanguagesDef.php';

// create entity
$languagesDef = new LanguagesDef();

// check for method
if (get_request_method() == "GET") {
    // get values from database to show them in inputs fields
    $stmt = $pdo->prepare("SELECT keyword, value 
    FROM languages_def
    WHERE id = :id");

    // bind values and parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // fetch result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // close the statement
    $stmt->closeCursor();

    // show values
    $languagesDef->keyword->value = $result['keyword'];
    $languagesDef->value->value = $result['value'];
}

// check for method
if (get_request_method() == 'POST') {
    // grab data from form inputs

    $languagesDef->value->value = htmlspecialchars($_POST[$languagesDef->value->name] ?? '');

    // check if given data is ok
    $checks = $languagesDef->keyword->check() || $languagesDef->value->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $languagesDef->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE languagesDef SET value = :value, updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':value', $languagesDef->value->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        header("Location: " . get_server() . "?locale=$locale&page=languages_def");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
