<?php

require_once __DIR__ . '/../../database/Users.php';

// create entity
$users = new Users();

// check for method
if (getRequestMethod() == "GET") {
    // show values

    $stmt = $pdo->prepare("SELECT fullname, email, phone, phone_code_id, address, avatar, is_admin 
    FROM users
    WHERE id = :id");

    //  bind values and parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // flush database
    $stmt->execute();

    // fetch result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // close the statement
    $stmt->closeCursor();

    // show values
    $users->fullname->value = $result['fullname'];
    $users->email->value = $result['email'];
    $users->phone->value = $result['phone'];
    $users->phone_code_id->value = $result['phone_code_id'];
    $users->address->value = $result['address'];
    $users->avatar->value = $result['avatar'];
    $users->is_admin->value = $result['is_admin'];
}

// check for method
if (getRequestMethod() == 'POST') {
    // grab data from form inputs

    $users->fullname->value = htmlspecialchars($_POST[$users->fullname->name] ?? '');
    $users->email->value = htmlspecialchars($_POST[$users->email->name] ?? '');
    $users->phone->value = htmlspecialchars($_POST[$users->phone->name] ?? '');
    $users->phone_code_id->value = htmlspecialchars($_POST[$users->phone_code_id->name] ?? '');
    $users->address->value = htmlspecialchars($_POST[$users->address->name] ?? '');
    $users->old_password->value = htmlspecialchars($_POST[$users->old_password->name] ?? '');
    $users->password->value = htmlspecialchars($_POST[$users->password->name] ?? '');
    $users->password_confirm->value = htmlspecialchars($_POST[$users->password_confirm->name] ?? '');
    $users->avatar->value = htmlspecialchars($_POST[$users->avatar->name] ?? '');
    $users->is_admin->value = htmlspecialchars($_POST[$users->is_admin->name] ?? '');

    // check if given data is ok
    $checks = $users->fullname->check() || $users->email->check() || $users->phone->check() || 
                $users->phone_code_id->check() || $users->address->check() || 
                $users->old_password->check() || $users->password->check() || $users->password_confirm->check() ||
                $users->avatar->check() || $users->is_admin->check();

    // password confirming/hashing
    $password = "";

    if ($users->password->value == $users->password_confirm->value) {
        // if (password_verify())

        // hash the password
        $password = password_hash($users->password->value, $hash_algorithm, $hash_options);
    }

    else {
        // passwords doesn't match
        $users->password_confirm->error_msg = $lang['errors_passwords_mismatch'];
        $users->password->error_msg = $lang['errors_passwords_mismatch'];
        $checks = false;
    }

    if ($checks) {
        // convert DateTime object to string

        $updated_at = date($datetime_format, $users->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE users SET fullname = :fullname, email = :email, phone = :phone, phone_code_id = :phone_code_id,
                            address = :address, password = :password, avatar = :avatar, is_admin = :is_admin,
                            updated_at = :updated_at 
                            WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':fullname', $users->fullname->value, PDO::PARAM_STR);
        $stmt->bindParam(':email', $users->email->value, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $users->phone->value, PDO::PARAM_STR);
        $stmt->bindParam(':phone_code_id', $users->phone_code_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':address', $users->address->value, PDO::PARAM_STR);
        $stmt->bindParam(':password', $users->password->value, PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $users->avatar->value, PDO::PARAM_STR);
        $stmt->bindValue(':is_admin', ($users->is_admin->value) ? true : false, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        redirect("?locale=$locale&page=settings_users");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
