<?php

if (Helpers::getRequestMethod() == 'POST') {
    // delete related recordings

    try {
        $pdo->beginTransaction();

        // do not delete language if it is default one
        $stmt_default = $pdo->prepare("SELECT id FROM languages WHERE code = :code");
        $stmt_default->bindParam(':code', $default_locale, PDO::PARAM_STR);
        $stmt_default->execute();
        $default_lang = $stmt_default->fetch(PDO::FETCH_ASSOC);
        $stmt_default->closeCursor();

        if ($default_lang['id'] == $id) {
            // redirect to index page after failed deletion
            Flash::addFlash($lang['flash_fail_deleted'], 'danger');
            Helpers::redirect($page);
        }

        // delete districts
        $stmt_districts = $pdo->prepare("DELETE d FROM districts d
                            INNER JOIN cities c ON c.id = d.city_id
                            INNER JOIN countries co ON co.id = c.country_id
                            WHERE co.language_id = :language_id");
        $stmt_districts->bindParam(':language_id', $id, PDO::PARAM_INT);
        $stmt_districts->execute();
        $stmt_districts->closeCursor();

        // delete cities definitions
        $stmt_cities = $pdo->prepare("DELETE c FROM cities c
                            INNER JOIN countries co ON co.id = c.country_id
                            WHERE co.language_id = :language_id");
        $stmt_cities->bindParam(':language_id', $id, PDO::PARAM_INT);
        $stmt_cities->execute();
        $stmt_cities->closeCursor();

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
        $stmt_upload = $pdo->prepare("SELECT flag FROM languages WHERE id = :id");
        $stmt_upload->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_upload->execute();
        $result = $stmt_upload->fetch(PDO::FETCH_ASSOC);
        $stmt_upload->closeCursor();

        // delete related file
        $flag_exists = $result['flag'];
        if (file_exists(ltrim($flag_exists, "/"))) {
            unlink(ltrim($flag_exists, "/"));
        }

        // sql for deletion
        $stmt_language = $pdo->prepare("DELETE FROM languages WHERE id = :id");

        // bind parameters
        $stmt_language->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt_language->execute();

        // close statement
        $stmt_language->closeCursor();

        $pdo->commit();

        

        // redirect to index page after deletion
        Flash::addFlash($lang['flash_success_deleted'], 'success');
        Helpers::redirect($page);
    }

    catch (PDOException $e) {
        // rollback changes
        $pdo->rollback();

        // show error message
        Flash::addFlash($lang['flash_fail_deleted'], 'danger');
        Helpers::redirect("$page/delete");
    }
}
