<?php

// create entity
$flats = new Flats();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields
    $stmt = $pdo->prepare("SELECT flat, square_meter, fee, currency_id 
    FROM flats
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
    $flats->flat->value = $result['flat'];
    $flats->square_meter->value = $result['square_meter'];
    $flats->fee->value = $result['fee'];
    $flats->currency_id->value = $result['currency_id'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    try {
        // grab data from form inputs

        $flats->flat->value = htmlspecialchars($_POST[$flats->flat->name] ?? '');
        $flats->square_meter->value = htmlspecialchars($_POST[$flats->square_meter->name] ?? '');
        $flats->fee->value = htmlspecialchars($_POST[$flats->fee->name] ?? '');
        $flats->currency_id->value = htmlspecialchars($_POST[$flats->currency_id->name] ?? '');

        // check if given data is ok
        $checks = $flats->flat->check() && $flats->square_meter->check() && $flats->fee->check() && $flats->currency_id->check();

        if ($checks) {
            // convert DateTime object to string
            $updated_at = date($datetime_format, $flats->updated_at->value->getTimestamp());

            // sql statement
            $stmt = $pdo->prepare("UPDATE flats SET flat = :flat, square_meter = :square_meter, fee = :fee, currency_id = :currency_id, updated_at = :updated_at 
                                WHERE id = :id");

            //  bind values and parameters
            $stmt->bindParam(':flat', $flats->flat->value, PDO::PARAM_STR);
            $stmt->bindParam(':square_meter', $flats->square_meter->value, PDO::PARAM_INT);
            $stmt->bindParam(':fee', $flats->fee->value, PDO::PARAM_INT);
            $stmt->bindParam(':currency_id', $flats->currency_id->value, PDO::PARAM_INT);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // flush database
            $stmt->execute();

            // close the statement
            $stmt->closeCursor();

            // redirect to index page if everything is successfull
            Flash::addFlash($lang['flash_success_updated'], 'success');
            Helpers::redirect($page);
        }
    }

    catch (PDOException $e) {
        // show error message
        Flash::addFlash($lang['flash_fail_updated'], 'danger');
        Helpers::redirect("$page/update");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
