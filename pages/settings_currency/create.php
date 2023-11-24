<?php

// create entity
$settingsCurrency = new SettingsCurrency();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $settingsCurrency->language_id->value = $language->getLocaleId($pdo, $locale);
    $settingsCurrency->name->value = htmlspecialchars($_POST[$settingsCurrency->name->name] ?? '');
    $settingsCurrency->symbol->value = htmlspecialchars($_POST[$settingsCurrency->symbol->name] ?? '');

    // check if given data is ok
    $checks = $settingsCurrency->name->check() || $settingsCurrency->symbol->check();

    if ($checks) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $settingsCurrency->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $settingsCurrency->updated_at->value->getTimestamp());

        // get all locale id to create this entity for each one of them
        $all_locale_id = $language->getAllLocaleId($pdo);
        foreach ($all_locale_id as $locale_id) {
            // sql statement
            $stmt = $pdo->prepare("INSERT INTO settingsCurrency (language_id, name, symbol, created_at, updated_at)
                                     VALUES (:language_id, :name, :symbol, :created_at, :updated_at)");

            //  bind values and parameters
            $stmt->bindValue(':language_id', $locale_id['id'], PDO::PARAM_INT);
            $stmt->bindParam(':name', $settingsCurrency->name->value, PDO::PARAM_STR);
            $stmt->bindParam(':symbol', $settingsCurrency->symbol->value, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

            // flush database
            $stmt->execute();

            // close the statement
            $stmt->closeCursor();
        }

        // redirect to index page if everything is successfull
        Helpers::redirect("settings_currency");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
