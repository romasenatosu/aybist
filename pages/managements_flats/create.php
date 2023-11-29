<?php

// create entity
$flats = new Flats();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    try {
        // grab data from form inputs

        $flats->language_id->value = $language->getLocaleId($pdo, $locale);
        $flats->flat->value = htmlspecialchars($_POST[$flats->flat->name] ?? '');
        $flats->square_meter->value = htmlspecialchars($_POST[$flats->square_meter->name] ?? '');
        $flats->fee->value = htmlspecialchars($_POST[$flats->fee->name] ?? '');
        $flats->currency_id->value = htmlspecialchars($_POST[$flats->currency_id->name] ?? '');

        // check if given data is ok
        $checks = $flats->flat->check() && $flats->square_meter->check() && $flats->fee->check() && $flats->currency_id->check();

        if ($checks) {
            // convert DateTime object to string

            $created_at = date($datetime_format, $flats->created_at->value->getTimestamp());
            $updated_at = date($datetime_format, $flats->updated_at->value->getTimestamp());

            // get all locale id to create this entity for each one of them
            $all_locale_id = $language->getAllLocaleId($pdo);
            foreach ($all_locale_id as $locale_id) {
                // sql statement
                $stmt = $pdo->prepare("INSERT INTO flats (language_id, flat, square_meter, fee, currency_id, created_at, updated_at)
                                        VALUES (:language_id, :flat, :square_meter, :fee, :currency_id, :created_at, :updated_at)");

                //  bind values and parameters
                $stmt->bindValue(':language_id', $locale_id['id'], PDO::PARAM_INT);
                $stmt->bindParam(':flat', $flats->flat->value, PDO::PARAM_STR);
                $stmt->bindParam(':square_meter', $flats->square_meter->value, PDO::PARAM_INT);
                $stmt->bindParam(':fee', $flats->fee->value, PDO::PARAM_INT);
                $stmt->bindParam(':currency_id', $flats->currency_id->value, PDO::PARAM_INT);
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
