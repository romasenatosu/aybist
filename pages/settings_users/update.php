<?php

// create entity
$users = new Users();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // set not required fields
    $users->old_password->required = false;
    $users->password->required = false;
    $users->password_confirm->required = false;

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
if (Helpers::getRequestMethod() == 'POST') {
    try {
        $pdo->beginTransaction();

        // get previously uploaded files and old password
        $stmt = $pdo->prepare("SELECT avatar, password
        FROM users
        WHERE id = :id");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $avatar_exists = $result['avatar'];
        $old_password = $result['password'];

        // grab data from form inputs

        $users->fullname->value = htmlspecialchars($_POST[$users->fullname->name] ?? '');
        $users->email->value = htmlspecialchars($_POST[$users->email->name] ?? '');
        $users->phone->value = htmlspecialchars($_POST[$users->phone->name] ?? '');
        $users->phone_code_id->value = htmlspecialchars($_POST[$users->phone_code_id->name] ?? '');
        $users->address->value = htmlspecialchars($_POST[$users->address->name] ?? '');
        $users->old_password->value = htmlspecialchars($_POST[$users->old_password->name] ?? '');
        $users->password->value = htmlspecialchars($_POST[$users->password->name] ?? '');
        $users->password_confirm->value = htmlspecialchars($_POST[$users->password_confirm->name] ?? '');
        $users->avatar->value = $_FILES[$users->avatar->name];
        $users->is_admin->value = htmlspecialchars($_POST[$users->is_admin->name] ?? '');

        // compare new photos with previously uploaded ones
        // check if photo is required
        $avatar_check = $users->avatar->check();

        if (!empty($users->avatar->value['tmp_name'])) {
            // upload
            if ($avatar_check) {
                $avatar_status = Helpers::upload($users->avatar->value);

                // delete old file
                if ($avatar_status['code'] and file_exists(ltrim($avatar_exists, "/"))) {
                    unlink(ltrim($avatar_exists, "/"));
                }

                // assign values from upload function
                $avatar_check = $avatar_status['code'];
                $users->avatar->value = $avatar_status['file'];
                $users->avatar->error_msg = ($avatar_status['code']) ? '' : $avatar_status['msg'];
            }
        } else {
            // if no photo was attempted to be uploaded then assign its value
            if ($avatar_exists) {
                $users->avatar->value = $avatar_exists;
                $avatar_check = true;
            } else {
                $users->avatar->value = null;
            }
        }

        $photo_checks = [$avatar_check];

        // check if given data is ok
        $checks = $users->fullname->check() && $users->email->check() && $users->phone->check() && 
                    $users->phone_code_id->check() && $users->address->check() && 
                    $users->old_password->check() && $users->password->check() && $users->password_confirm->check() &&
                    $users->is_admin->check();

        // check if old password is correct
        if (password_verify($users->old_password->value, $old_password)) {

        } else {
            // old password is wrong show error message
            $pdo->rollback();
            $$users->old_password->error_msg = $lang['errors_passwords_'];
        }

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

        if ($checks and Helpers::all($photo_checks)) {
            // convert DateTime object to string

            $updated_at = date($datetime_format, $users->updated_at->value->getTimestamp());

            // sql statement
            $stmt_users = $pdo->prepare("UPDATE users SET fullname = :fullname, email = :email, phone = :phone, phone_code_id = :phone_code_id,
                                address = :address, password = :password, avatar = :avatar, is_admin = :is_admin,
                                updated_at = :updated_at 
                                WHERE id = :id");

            //  bind values and parameters
            $stmt_users->bindParam(':fullname', $users->fullname->value, PDO::PARAM_STR);
            $stmt_users->bindParam(':email', $users->email->value, PDO::PARAM_STR);
            $stmt_users->bindParam(':phone', $users->phone->value, PDO::PARAM_STR);
            $stmt_users->bindParam(':phone_code_id', $users->phone_code_id->value, PDO::PARAM_INT);
            $stmt_users->bindParam(':address', $users->address->value, PDO::PARAM_STR);
            $stmt_users->bindParam(':password', $users->password->value, PDO::PARAM_STR);
            $stmt_users->bindParam(':avatar', $users->avatar->value, PDO::PARAM_STR);
            $stmt_users->bindValue(':is_admin', ($users->is_admin->value) ? true : false, PDO::PARAM_INT);
            $stmt_users->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);
            $stmt_users->bindParam(':id', $id, PDO::PARAM_INT);

            // flush database
            $stmt_users->execute();

            // close the statement
            $stmt_users->closeCursor();

            $pdo->commit();

            // update session info
            $user_session = $auth->decodeUserSession();
            $auth->encodeUserSession($pdo, $user_session['id']);

            // redirect to index page if everything is successfull
            Flash::addFlash($lang['flash_success_updated'], 'success');
            Helpers::redirect($page);
        }
    }

    catch (PDOException $e) {
        // rollback the changes
        $pdo->rollback();

        // show error message
        Flash::addFlash($lang['flash_fail_updated'], 'danger');
        Helpers::redirect("$page/update");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
