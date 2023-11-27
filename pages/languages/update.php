<?php

// create entity
$languages = new Languages();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields
    $stmt = $pdo->prepare("SELECT code, lang, flag 
    FROM languages
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
    $languages->code->value = $result['code'];
    $languages->lang->value = $result['lang'];
    $languages->flag->value = $result['flag'];
}

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
        $updated_at = date($datetime_format, $languages->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE languages SET code = :code, lang = :lang, flag = :flag, updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':code', $languages->code->value, PDO::PARAM_STR);
        $stmt->bindParam(':lang', $languages->lang->value, PDO::PARAM_STR);
        $stmt->bindParam(':flag', $languages->flag->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

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
