<?php

// create entity
$blocks = new Blocks();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $blocks->language_id->value = $language->getLocaleId($pdo, $locale);
    $blocks->block->value = htmlspecialchars($_POST[$blocks->block->name] ?? '');
    $blocks->description->value = htmlspecialchars($_POST[$blocks->description->name] ?? '');
    $blocks->floor_count->value = htmlspecialchars($_POST[$blocks->floor_count->name] ?? '');

    // check if given data is ok
    $checks = $blocks->block->check() && $blocks->description->check() && $blocks->floor_count->check();

    if ($checks) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $blocks->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $blocks->updated_at->value->getTimestamp());

        // get all locale id to create this entity for each one of them
        $all_locale_id = $language->getAllLocaleId($pdo);
        foreach ($all_locale_id as $locale_id) {
            // sql statement
            $stmt = $pdo->prepare("INSERT INTO blocks (language_id, block, description, floor_count, created_at, updated_at)
                                     VALUES (:language_id, :block, :description, :floor_count, :created_at, :updated_at)");

            //  bind values and parameters
            $stmt->bindValue(':language_id', $locale_id['id'], PDO::PARAM_INT);
            $stmt->bindParam(':block', $blocks->block->value, PDO::PARAM_STR);
            $stmt->bindParam(':description', $blocks->description->value, PDO::PARAM_STR);
            $stmt->bindParam(':floor_count', $blocks->floor_count->value, PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

            // flush database
            $stmt->execute();

            // close the statement
            $stmt->closeCursor();
        }

        // redirect to index page if everything is successfull
        Helpers::redirect("managements_blocks");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
