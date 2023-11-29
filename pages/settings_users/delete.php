<?php

if (Helpers::getRequestMethod() == 'POST') {
    try {
        // do not delete user if it is root one
        $stmt_default = $pdo->prepare("SELECT is_root FROM users WHERE id = :id");
        $stmt_default->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_default->execute();
        $root_user = $stmt_default->fetch(PDO::FETCH_ASSOC);
        $stmt_default->closeCursor();

        if ($root_user['is_root']) {
            // redirect to index page after failed deletion
            Flash::addFlash($lang['flash_fail_deleted'], 'danger');
            Helpers::redirect($page);
        }

        // get previously uploaded files
        $stmt = $pdo->prepare("SELECT avatar FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        // delete related file
        $avatar_exists = $result['avatar'];
        if (file_exists(ltrim($avatar_exists, "/"))) {
            unlink(ltrim($avatar_exists, "/"));
        }

        // sql for deletion
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");

        // bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close statement
        $stmt->closeCursor();

        // redirect to index page after deletion
        Flash::addFlash($lang['flash_success_deleted'], 'success');
        Helpers::redirect($page);
    }

    catch (PDOException $e) {
        // show error message
        Flash::addFlash($lang['flash_fail_deleted'], 'danger');
        Helpers::redirect("$page/delete");
    }
}
