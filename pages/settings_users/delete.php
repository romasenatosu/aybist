<?php

if (Helpers::getRequestMethod() == 'POST') {
    // get previously uploaded files
    $stmt = $pdo->prepare("SELECT avatar FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    // delete related file
    unlink(ltrim($result['avatar'], "/"));

    // sql for deletion
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");

    // bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // close statement
    $stmt->closeCursor();

    // redirect to index page after deletion
    Helpers::redirect("$page");
}
