<?php

// create entity
$languages = new Languages();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs
    $languages->code->value = htmlspecialchars($_POST[$languages->code->name] ?? '');
    $languages->lang->value = htmlspecialchars($_POST[$languages->lang->name] ?? '');
    $languages->flag->value = $_FILES[$languages->flag->name];

    // check if photo is required
    $flag_check = $languages->flag->check();

    if (!empty($languages->flag->value['tmp_name'])) {
        // upload
        if ($flag_check) {
            $flag_status = Helpers::upload($languages->flag->value);

            // assign values from upload function
            $flag_check = $flag_status['code'];
            $languages->flag->value = $flag_status['file'];
            $languages->flag->error_msg = $flag_status['msg'];
        }
    } else {
        // if no photo was attempted to be uploaded then assign its value
        $languages->flag->value = null;
    }

    $photo_checks = [$flag_check];

    // check if given data is ok
    $checks = $languages->code->check() && $languages->lang->check();

    if ($checks and Helpers::all($photo_checks)) {
        // convert DateTime object to string

        $created_at = date($datetime_format, $languages->created_at->value->getTimestamp());
        $updated_at = date($datetime_format, $languages->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("INSERT INTO languages (code, lang, flag, created_at, updated_at)
                                    VALUES (:code, :lang, :flag, :created_at, :updated_at)");

        //  bind values and parameters
        $stmt->bindParam(':code', $languages->code->value, PDO::PARAM_STR);
        $stmt->bindParam(':lang', $languages->lang->value, PDO::PARAM_STR);
        $stmt->bindParam(':flag', $languages->flag->value, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

        // flush database
        $stmt->execute();

        // get last inserted language_id
        $lang_code_id = $pdo->lastInsertId();

        // close the statement
        $stmt->closeCursor();

        // create related default data (get from database by default lang code)

        // default languages_def
        $stmt = $pdo->prepare("SELECT keyword, value FROM languages_def WHERE language_id = :language_id");
        $stmt->bindParam(":language_id", $language_id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($results as $result) {
            $keyword = $result['keyword'];
            $value = $result['value'];

            // create language definitions
            $stmt = $pdo->prepare("INSERT INTO languages_def (language_id, keyword, value, created_at, updated_at) 
                                    VALUES (:language_id, :keyword, :value, :created_at, :updated_at)");
            $stmt->bindParam(":language_id", $lang_code_id, PDO::PARAM_INT);
            $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $stmt->bindParam(":value", $value, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
        }

        // default settings
        $stmt = $pdo->prepare("SELECT company, slogan, description, keywords, site_title, site_url, smtp_url, smtp_password, smtp_port,
                            normal_photo, normal_photo_width, normal_photo_height, top_photo, top_photo_width, top_photo_height,
                            small_photo, small_photo_width, small_photo_height, debug_mode, maintenance_mode, maintenance_mode_content
                            FROM settings WHERE language_id = :language_id");
        $stmt->bindParam(":language_id", $language_id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($results as $result) {
            $company = $result['company'];
            $slogan = $result['slogan'];
            $description = $result['description'];
            $keywords = $result['keywords'];
            $site_title = $result['site_title'];
            $site_url = $result['site_url'];
            $smtp_url = $result['smtp_url'];
            $smtp_password = $result['smtp_password'];
            $smtp_port = $result['smtp_port'];
            $normal_photo = $result['normal_photo'];
            $normal_photo_width = $result['normal_photo_width'];
            $normal_photo_height = $result['normal_photo_height'];
            $normal_photo_height = $result['normal_photo_height'];
            $top_photo = $result['top_photo'];
            $top_photo_width = $result['top_photo_width'];
            $top_photo_height = $result['top_photo_height'];
            $small_photo = $result['small_photo'];
            $small_photo_width = $result['small_photo_width'];
            $small_photo_width = $result['small_photo_width'];
            $small_photo_height = $result['small_photo_height'];
            $debug_mode = $result['debug_mode'];
            $maintenance_mode = $result['maintenance_mode'];
            $maintenance_mode_content = $result['maintenance_mode_content'];

            // create settings
            $stmt = $pdo->prepare("INSERT INTO settings (language_id, company, slogan, description,
                                keywords, site_title, site_url, smtp_url, smtp_password, smtp_port,
                                normal_photo, normal_photo_width, normal_photo_height, top_photo, top_photo_width, top_photo_height,
                                small_photo, small_photo_width, small_photo_height, debug_mode,
                                maintenance_mode, maintenance_mode_content, created_at, updated_at)
                                VALUES (:language_id, :company, :slogan, :description,
                                :keywords, :site_title, :site_url, :smtp_url, :smtp_password, :smtp_port,
                                :normal_photo, :normal_photo_width, :normal_photo_height, :top_photo, :top_photo_width, :top_photo_height,
                                :small_photo, :small_photo_width, :small_photo_height, :debug_mode,
                                :maintenance_mode, :maintenance_mode_content, :created_at, :updated_at)");
            $stmt->bindParam(":language_id", $lang_code_id, PDO::PARAM_INT);
            $stmt->bindParam(":company", $company, PDO::PARAM_STR);
            $stmt->bindParam(":slogan", $slogan, PDO::PARAM_STR);
            $stmt->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt->bindParam(":keywords", $keywords, PDO::PARAM_STR);
            $stmt->bindParam(":site_title", $site_title, PDO::PARAM_STR);
            $stmt->bindParam(":site_url", $site_url, PDO::PARAM_STR);
            $stmt->bindParam(":smtp_url", $smtp_url, PDO::PARAM_STR);
            $stmt->bindParam(":smtp_password", $smtp_password, PDO::PARAM_STR);
            $stmt->bindParam(":smtp_port", $smtp_port, PDO::PARAM_INT);
            $stmt->bindParam(":normal_photo", $normal_photo, PDO::PARAM_STR);
            $stmt->bindParam(":normal_photo_width", $normal_photo_width, PDO::PARAM_INT);
            $stmt->bindParam(":normal_photo_height", $normal_photo_height, PDO::PARAM_INT);
            $stmt->bindParam(":top_photo", $top_photo, PDO::PARAM_STR);
            $stmt->bindParam(":top_photo_width", $top_photo_width, PDO::PARAM_INT);
            $stmt->bindParam(":top_photo_height", $top_photo_height, PDO::PARAM_INT);
            $stmt->bindParam(":small_photo", $small_photo, PDO::PARAM_STR);
            $stmt->bindParam(":small_photo_width", $small_photo_width, PDO::PARAM_INT);
            $stmt->bindParam(":small_photo_height", $small_photo_height, PDO::PARAM_INT);
            $stmt->bindParam(":debug_mode", $debug_mode, PDO::PARAM_INT);
            $stmt->bindParam(":maintenance_mode", $maintenance_mode, PDO::PARAM_INT);
            $stmt->bindParam(":maintenance_mode_content", $maintenance_mode_content, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
        }

        // redirect to index page if everything is successfull
        Helpers::redirect("languages");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
