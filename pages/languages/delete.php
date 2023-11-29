<?php

if (Helpers::getRequestMethod() == 'POST') {
    // delete related recordings

        // delete districts
    $stmt = $pdo->prepare("DELETE d FROM districts d
                        INNER JOIN cities c ON c.id = d.city_id
                        INNER JOIN countries co ON co.id = c.country_id
                        WHERE co.language_id = :language_id");
    $stmt->bindParam(':language_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();

    // delete cities definitions
    $stmt = $pdo->prepare("DELETE c FROM cities c
                        INNER JOIN countries co ON co.id = c.country_id
                        WHERE co.language_id = :language_id");
    $stmt->bindParam(':language_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();

    // delete language definitions, countries, managements, blocks, floors, flats, settings, settings_contact, settings_vat
    $stmt = $pdo->prepare("DELETE FROM countries WHERE language_id = :language_id;
                            DELETE FROM languages_def WHERE language_id = :language_id;
                            DELETE FROM managements WHERE language_id = :language_id;
                            DELETE FROM blocks WHERE language_id = :language_id;
                            DELETE FROM flats WHERE language_id = :language_id;
                            DELETE FROM floors WHERE language_id = :language_id;
                            DELETE FROM settings WHERE language_id = :language_id;
                            DELETE FROM settings_contact WHERE language_id = :language_id;
                            DELETE FROM settings_currency WHERE language_id = :language_id");
    $stmt->bindParam(':language_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();

    // get previously uploaded files
    $stmt = $pdo->prepare("SELECT flag FROM languages WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    // delete related file
    unlink(ltrim($result['flag'], "/"));

    // sql for deletion
    $stmt = $pdo->prepare("DELETE FROM languages WHERE id = :id");

    // bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // close statement
    $stmt->closeCursor();

    // redirect to index page after deletion
    Helpers::redirect("$page");
}
