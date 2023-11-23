<?php

if (getRequestMethod() == 'POST') {
    

    // sql for deletion
    $stmt = $pdo->prepare("DELETE FROM floors WHERE id = :id");

    // bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // close statement
    $stmt->closeCursor();
    
    // redirect to index page after deletion
    redirect("?locale=$locale&page=$page");
}
