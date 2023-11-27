<?php

// create entity
$languages = new Languages();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $languages->code->value = htmlspecialchars($_POST[$languages->code->name] ?? '');
    $languages->lang->value = htmlspecialchars($_POST[$languages->lang->name] ?? '');
    $languages->flag->value = htmlspecialchars($_POST[$languages->flag->name] ?? '');

    // check if given data is ok
    $checks = $languages->code->check() && $languages->lang->check() && $languages->flag->check();

    if ($checks) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $languages->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $languages->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("INSERT INTO languages (code, lang, flag, created_at, updated_at)
                                    VALUES (:code, :lang, :flag, :created_at, :updated_at)");

        //  bind values and parameters
        $stmt->bindParam(':code', $languages->code->value, PDO::PARAM_STR);
        $stmt->bindParam(':lang', $languages->lang->value, PDO::PARAM_STR);
        $stmt->bindParam(':flag', $languages->flag->value, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("languages");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
