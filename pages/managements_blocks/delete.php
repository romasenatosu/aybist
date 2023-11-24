<?php

if (Helpers::getRequestMethod() == 'POST') {
    

    // sql for deletion
    $stmt = $pdo->prepare("DELETE FROM blocks WHERE id = :id");

    // bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // close statement
    $stmt->closeCursor();
    
    // redirect to index page after deletion
    Helpers::redirect("$page");
}
