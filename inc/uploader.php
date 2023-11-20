<?php

function upload(string $name): array {
    global $photo_files_extensions, $upload_dir, $lang;
    $extensions = str_replace('.', '', $photo_files_extensions);
    $allowed_extensions = explode(', ', $extensions);

    $file_name = $_FILES[$name]['name'];
    $file_error = $_FILES[$name]['error'];
    $file_tmp = $_FILES[$name]['tmp_name'];
    $result = ["code" => false, "msg" => ""];

    // check for uploading errors
    if ($file_error === UPLOAD_ERR_OK) {
        // get extension of file by more secure way
        $file_extension = pathinfo($file_name, PATHINFO_EXTESION);

        // check for allowed extensions
        if (in_array($file_extension, $allowed_extensions)) {
            // create unique file name
            $unique_file_name = sprintf("%s_%s.%s", $file_name, uniqid(), $file_extension);
            $target = $upload_dir . '/' . $unique_file_name;

            // check if target file exists
            if (file_exists($target)) {
                $result['msg'] = $lang['file_exists'];
            } else {
                // upload file
                if (move_uploaded_file($file_tmp, $target)) {
                    $result['code'] = true;
                    $result['msg'] = $lang['file_success'];
                } else {
                    $result['msg'] = $lang['file_fail'];
                }
            }
        } else {
            $result['msg'] = sprintf($lang['file_invalid_extension'], $photo_files_extensions);
        }
    } else {
        $result['msg'] = sprintf($lang['file_upload_error'], $file_error);
    }

    return $result;
}
