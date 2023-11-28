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
    // get previously uploaded files
    $stmt = $pdo->prepare("SELECT flag
    FROM languages
    WHERE id = :id");

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    $flag_exists = $result['flag'];

    // grab data from form inputs
    $languages->code->value = htmlspecialchars($_POST[$languages->code->name] ?? '');
    $languages->lang->value = htmlspecialchars($_POST[$languages->lang->name] ?? '');
    $languages->flag->value = $_FILES[$languages->flag->name];

    // compare new photos with previously uploaded ones
    // check if photo is required
    $flag_check = $languages->flag->check();

    if (!empty($languages->flag->value['tmp_name'])) {
        // upload
        if ($flag_check) {
            $flag_status = Helpers::upload($languages->flag->value);

            // delete old file
            if ($flag_status['code']) {
                unlink(ltrim($flag_exists, "/"));
            }

            // assign values from upload function
            $flag_check = $flag_status['code'];
            $languages->flag->value = $flag_status['file'];
            $languages->flag->error_msg = $flag_status['msg'];
        }
    } else {
        // if no photo was attempted to be uploaded then assign its value
        if ($flag_exists) {
            $languages->flag->value = $flag_exists;
            $flag_check = true;
        } else {
            $languages->flag->value = null;
        }
    }

    $photo_checks = [$flag_check];

    // check if given data is ok
    $checks = $languages->code->check() && $languages->lang->check();

    if ($checks and Helpers::all($photo_checks)) {
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
