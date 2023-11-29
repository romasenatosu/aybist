<?php

if (Helpers::getRequestMethod() == 'POST') {
    try {
        // sql for deletion
        $stmt = $pdo->prepare("DELETE FROM managements WHERE id = :id");
    
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
