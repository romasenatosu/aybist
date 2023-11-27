<?php

// create entity
$settingsContact = new SettingsContact();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields
    
    $stmt = $pdo->prepare("SELECT address, phone, phone_code_id, cell_phone, cell_phone_code_id, fax, fax_code_id, email,
    captcha_key, captcha_secret_key, google_maps
    FROM settings_contact
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
    $settingsContact->address->value = $result['address'];
    $settingsContact->phone->value = $result['phone'];
    $settingsContact->phone_code_id->value = $result['phone_code_id'];
    $settingsContact->cell_phone->value = $result['cell_phone'];
    $settingsContact->cell_phone_code_id->value = $result['cell_phone_code_id'];
    $settingsContact->fax->value = $result['fax'];
    $settingsContact->fax_code_id->value = $result['fax_code_id'];
    $settingsContact->email->value = $result['email'];
    $settingsContact->captcha_key->value = $result['captcha_key'];
    $settingsContact->captcha_secret_key->value = $result['captcha_secret_key'];
    $settingsContact->google_maps->value = $result['google_maps'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $settingsContact->address->value = htmlspecialchars($_POST[$settingsContact->address->name] ?? '');
    $settingsContact->phone->value = htmlspecialchars($_POST[$settingsContact->phone->name] ?? '');
    $settingsContact->phone_code_id->value = htmlspecialchars($_POST[$settingsContact->phone_code_id->name] ?? '');
    $settingsContact->cell_phone->value = htmlspecialchars($_POST[$settingsContact->cell_phone->name] ?? '');
    $settingsContact->cell_phone_code_id->value = htmlspecialchars($_POST[$settingsContact->cell_phone_code_id->name] ?? '');
    $settingsContact->fax->value = htmlspecialchars($_POST[$settingsContact->fax->name] ?? '');
    $settingsContact->fax_code_id->value = htmlspecialchars($_POST[$settingsContact->fax_code_id->name] ?? '');
    $settingsContact->email->value = htmlspecialchars($_POST[$settingsContact->email->name] ?? '');
    $settingsContact->captcha_key->value = htmlspecialchars($_POST[$settingsContact->captcha_key->name] ?? '');
    $settingsContact->captcha_secret_key->value = htmlspecialchars($_POST[$settingsContact->captcha_secret_key->name] ?? '');
    $settingsContact->google_maps->value = htmlspecialchars($_POST[$settingsContact->google_maps->name] ?? '');

    // check if given data is ok
    $checks = $settingsContact->address->check() && $settingsContact->phone->check() && $settingsContact->phone_code_id->check() && 
            $settingsContact->cell_phone->check() && $settingsContact->cell_phone_code_id->check() && $settingsContact->fax->check() && 
            $settingsContact->fax_code_id->check() && $settingsContact->email->check() && $settingsContact->captcha_key->check() && 
            $settingsContact->captcha_secret_key->check() && $settingsContact->google_maps->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $settingsContact->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE settings_contact SET address = :address, phone = :phone, phone_code_id = :phone_code_id,
                            cell_phone = :cell_phone, cell_phone_code_id = :cell_phone_code_id, fax = :fax, fax_code_id = :fax_code_id,
                            email = :email, captcha_key = :captcha_key, captcha_secret_key = :captcha_secret_key, google_maps = :google_maps,
                            updated_at = :updated_at
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':address', $settingsContact->address->value, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $settingsContact->phone->value, PDO::PARAM_STR);
        $stmt->bindParam(':phone_code_id', $settingsContact->phone_code_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':cell_phone', $settingsContact->cell_phone->value, PDO::PARAM_STR);
        $stmt->bindParam(':cell_phone_code_id', $settingsContact->cell_phone_code_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':fax', $settingsContact->fax->value, PDO::PARAM_STR);
        $stmt->bindParam(':fax_code_id', $settingsContact->fax_code_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':email', $settingsContact->email->value, PDO::PARAM_STR);
        $stmt->bindParam(':captcha_key', $settingsContact->captcha_key->value, PDO::PARAM_STR);
        $stmt->bindParam(':captcha_secret_key', $settingsContact->captcha_secret_key->value, PDO::PARAM_STR);
        $stmt->bindParam(':google_maps', $settingsContact->google_maps->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("settings_contact");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
