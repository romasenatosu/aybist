<?php

// create entity
$managements = new Managements();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $managements->language_id->value = $language->getLocaleId($pdo, $locale);
    $managements->block_id->value = htmlspecialchars($_POST[$managements->block_id->name] ?? '');
    $managements->floor_id->value = htmlspecialchars($_POST[$managements->floor_id->name] ?? '');
    $managements->flat_id->value = htmlspecialchars($_POST[$managements->flat_id->name] ?? '');
    $managements->manager_owner_id->value = htmlspecialchars($_POST[$managements->manager_owner_id->name] ?? '');
    $managements->manager_rental_id->value = htmlspecialchars($_POST[$managements->manager_rental_id->name] ?? '');
    $managements->management->value = htmlspecialchars($_POST[$managements->management->name] ?? '');
    $managements->description->value = htmlspecialchars($_POST[$managements->description->name] ?? '');
    $managements->fee_status->value = htmlspecialchars($_POST[$managements->fee_status->name] ?? '');

    // check if given data is ok
    $checks = $managements->block_id->check() || $managements->floor_id->check() ||
              $managements->flat_id->check() || $managements->manager_owner_id->check() || 
              $managements->manager_rental_id->check() || $managements->management->check() || 
              $managements->description->check() || $managements->fee_status->check();

    if ($checks) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $managements->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $managements->updated_at->value->getTimestamp());

        // get all locale id to create this entity for each one of them
        $all_locale_id = $language->getAllLocaleId($pdo);
        foreach ($all_locale_id as $locale_id) {
            // sql statement
            $stmt = $pdo->prepare("INSERT INTO managements (language_id, block_id, floor_id, flat_id, manager_owner_id, manager_rental_id, management, description, fee_status, created_at, updated_at)
                                     VALUES (:language_id, :block_id, :floor_id, :flat_id, :manager_owner_id, :manager_rental_id, :management, :description, :fee_status, :created_at, :updated_at)");

            //  bind values and parameters
            $stmt->bindValue(':language_id', $locale_id['id'], PDO::PARAM_INT);
            $stmt->bindParam(':block_id', $managements->block_id->value, PDO::PARAM_INT);
            $stmt->bindParam(':floor_id', $managements->floor_id->value, PDO::PARAM_INT);
            $stmt->bindParam(':flat_id', $managements->flat_id->value, PDO::PARAM_INT);
            $stmt->bindParam(':manager_owner_id', $managements->manager_owner_id->value, PDO::PARAM_INT);
            $stmt->bindParam(':manager_rental_id', $managements->manager_rental_id->value, PDO::PARAM_INT);
            $stmt->bindParam(':management', $managements->management->value, PDO::PARAM_STR);
            $stmt->bindParam(':description', $managements->description->value, PDO::PARAM_STR);
            $stmt->bindValue(':fee_status', ($managements->fee_status->value) ? true : false, PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

            // flush database
            $stmt->execute();

            // close the statement
            $stmt->closeCursor();
        }

        // redirect to index page if everything is successfull
        Helpers::redirect("managements");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
