<?php

// create entity
$managements = new Managements();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields

    $stmt = $pdo->prepare("SELECT block_id, floor_id, flat_id, manager_owner_id, manager_rental_id, management, description, fee_status 
    FROM managements
    WHERE id = :id");

    // bind values and parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // fetch result
    $stmt->execute();

    // fetch result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // close the statement
    $stmt->closeCursor();
    
    // show values
    $managements->block_id->value = $result['block_id'];
    $managements->floor_id->value = $result['floor_id'];
    $managements->flat_id->value = $result['flat_id'];
    $managements->manager_owner_id->value = $result['manager_owner_id'];
    $managements->manager_rental_id->value = $result['manager_rental_id'];
    $managements->management->value = $result['management'];
    $managements->description->value = $result['description'];
    $managements->fee_status->value = $result['fee_status'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

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
        $updated_at = date($datetime_format, $managements->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE managements SET block_id = :block_id, floor_id = :floor_id, flat_id = :flat_id,
                                manager_owner_id = :manager_owner_id, manager_rental_id = :manager_rental_id, management = :management,
                                description = :description, fee_status = :fee_status, updated_at = :updated_at 
                                WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':block_id', $managements->block_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':floor_id', $managements->floor_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':flat_id', $managements->flat_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':manager_owner_id', $managements->manager_owner_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':manager_rental_id', $managements->manager_rental_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':management', $managements->management->value, PDO::PARAM_STR);
        $stmt->bindParam(':description', $managements->description->value, PDO::PARAM_STR);
        $stmt->bindValue(':fee_status', ($managements->fee_status->value) ? true : false, PDO::PARAM_INT);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("managements");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
