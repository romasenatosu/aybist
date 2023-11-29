<?php

// create entity
$countries = new Countries();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    try {
        // grab data from form inputs

        $countries->language_id->value = $language->getLocaleId($pdo, $locale);
        $countries->country->value = htmlspecialchars($_POST[$countries->country->name] ?? '');
        $countries->phone_code->value = htmlspecialchars($_POST[$countries->phone_code->name] ?? '');

        // check if given data is ok
        $checks = $countries->country->check() && $countries->phone_code->check();

        if ($checks) {
            // convert DateTime object to string

            $created_at = date($datetime_format, $countries->created_at->value->getTimestamp());
            $updated_at = date($datetime_format, $countries->created_at->value->getTimestamp());

            // get all locale id to create this entity for each one of them
            $all_locale_id = $language->getAllLocaleId($pdo);
            foreach ($all_locale_id as $locale_id) {
                // sql statement
                $stmt = $pdo->prepare("INSERT INTO countries (language_id, country, phone_code, created_at, updated_at)
                                        VALUES (:language_id, :country, :phone_code, :created_at, :updated_at)");

                //  bind values and parameters
                $stmt->bindValue(':language_id', $locale_id['id'], PDO::PARAM_INT);
                $stmt->bindParam(':country', $countries->country->value, PDO::PARAM_STR);
                $stmt->bindParam(':phone_code', $countries->phone_code->value, PDO::PARAM_STR);
                $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
                $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

                // flush database
                $stmt->execute();

                // close the statement
                $stmt->closeCursor();
            }

            // redirect to index page if everything is successfull
            Flash::addFlash($lang['flash_success_created'], 'success');
            Helpers::redirect($page);

        }
    }

    catch (PDOException $e) {
        // show error message
        Flash::addFlash($lang['flash_fail_created'], 'danger');
        Helpers::redirect("$page/create");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
