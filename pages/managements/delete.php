<?php

if (get_request_method() == 'POST') {
    

    // sql for deletion
    $stmt = $pdo->prepare("DELETE FROM managements WHERE id = :id");

    // bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // close statement
    $stmt->closeCursor();
    
    // redirect to index page after deletion
    header('Location: ' . get_server() . "?locale=$locale&page=$page");
}
