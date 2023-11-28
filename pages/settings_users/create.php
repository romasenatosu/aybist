<?php

// create entity
$users = new Users();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $users->fullname->value = htmlspecialchars($_POST[$users->fullname->name] ?? '');
    $users->email->value = htmlspecialchars($_POST[$users->email->name] ?? '');
    $users->phone->value = htmlspecialchars($_POST[$users->phone->name] ?? '');
    $users->phone_code_id->value = htmlspecialchars($_POST[$users->phone_code_id->name] ?? '');
    $users->address->value = htmlspecialchars($_POST[$users->address->name] ?? '');
    $users->password->value = htmlspecialchars($_POST[$users->password->name] ?? '');
    $users->password_confirm->value = htmlspecialchars($_POST[$users->password_confirm->name] ?? '');
    $users->avatar->value = $_FILES[$users->avatar->name];
    $users->is_admin->value = htmlspecialchars($_POST[$users->is_admin->name] ?? '');

    // check if photo is required
    $avatar_check = $users->avatar->check();

    if (!empty($users->avatar->value['tmp_name'])) {
        // upload
        if ($avatar_check) {
            $avatar_status = Helpers::upload($users->avatar->value);

            // assign values from upload function
            $avatar_check = $avatar_status['code'];
            $users->avatar->value = $avatar_status['file'];
            $users->avatar->error_msg = $avatar_status['msg'];
        }
    } else {
        // if no photo was attempted to be uploaded then assign its value
        $users->avatar->value = null;
    }

    $photo_checks = [$avatar_check];

    // check if given data is ok
    $checks = $users->fullname->check() && $users->email->check() && $users->phone->check() && 
                $users->phone_code_id->check() && $users->address->check() && 
                $users->password->check() && $users->old_password->check() &&
                $users->is_admin->check();

    // password confirming/hashing
    $password = "";

    if ($users->password->value == $users->password_confirm->value) {
        // hash the password
        $password = password_hash($users->password->value, $hash_algorithm, $hash_options);
    } else {
        // passwords doesn't match
        $users->password_confirm->error_msg = $lang['errors_passwords_mismatch'];
        $users->password->error_msg = $lang['errors_passwords_mismatch'];
        $checks = false;
    }

    if ($checks and Helpers::all($photo_checks)) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $users->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $users->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("INSERT INTO users (fullname, email, phone, phone_code_id, address, password, avatar, is_admin, created_at, updated_at)
                                    VALUES (:fullname, :email, :phone, :phone_code_id, :address, :password, :avatar, :is_admin, :created_at, :updated_at)");

        //  bind values and parameters
        $stmt->bindParam(':fullname', $users->fullname->value, PDO::PARAM_STR);
        $stmt->bindParam(':email', $users->email->value, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $users->phone->value, PDO::PARAM_STR);
        $stmt->bindParam(':phone_code_id', $users->phone_code_id->value, PDO::PARAM_INT);
        $stmt->bindParam(':address', $users->address->value, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':avatar', $users->avatar->value, PDO::PARAM_STR);
        $stmt->bindValue(':is_admin', ($users->is_admin->value) ? true : false, PDO::PARAM_INT);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();


        // redirect to index page if everything is successfull
        Helpers::redirect("settings_users");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
