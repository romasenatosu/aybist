<?php

// create entity
$blocks = new Blocks();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields
    $stmt = $pdo->prepare("SELECT block, description, floor_count 
    FROM blocks
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
    $blocks->block->value = $result['block'];
    $blocks->description->value = $result['description'];
    $blocks->floor_count->value = $result['floor_count'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    try {
        // grab data from form inputs

        $blocks->block->value = htmlspecialchars($_POST[$blocks->block->name] ?? '');
        $blocks->description->value = htmlspecialchars($_POST[$blocks->description->name] ?? '');
        $blocks->floor_count->value = htmlspecialchars($_POST[$blocks->floor_count->name] ?? '');

        // check if given data is ok
        $checks = $blocks->block->check() && $blocks->description->check() && $blocks->floor_count->check();

        if ($checks) {
            // convert DateTime object to string
            $updated_at = date($datetime_format, $blocks->updated_at->value->getTimestamp());

            // sql statement
            $stmt = $pdo->prepare("UPDATE blocks SET block = :block, description = :description, floor_count = :floor_count, updated_at = :updated_at 
                                WHERE id = :id");

            //  bind values and parameters
            $stmt->bindParam(':block', $blocks->block->value, PDO::PARAM_STR);
            $stmt->bindParam(':description', $blocks->description->value, PDO::PARAM_STR);
            $stmt->bindParam(':floor_count', $blocks->floor_count->value, PDO::PARAM_INT);
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
