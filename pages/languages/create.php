<?php

// create entity
$languages = new Languages();

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    try {
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
                $languages->flag->error_msg = ($flag_status['code']) ? '' : $flag_status['msg'];
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

            $pdo->beginTransaction();

            // sql statement
            $stmt_languages = $pdo->prepare("INSERT INTO languages (code, lang, flag, created_at, updated_at)
                                        VALUES (:code, :lang, :flag, :created_at, :updated_at)");

            //  bind values and parameters
            $stmt_languages->bindParam(':code', $languages->code->value, PDO::PARAM_STR);
            $stmt_languages->bindParam(':lang', $languages->lang->value, PDO::PARAM_STR);
            $stmt_languages->bindParam(':flag', $languages->flag->value, PDO::PARAM_STR);
            $stmt_languages->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt_languages->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

            // flush database
            $stmt_languages->execute();

            // get last inserted language_id
            $lang_code_id = $pdo->lastInsertId();

            // close the statement
            $stmt_languages->closeCursor();

            // create related default data (get from database by default lang code)

            $defualt_lang_code_id = $language->getLocaleId($pdo, $default_locale);

            // default languages_def
            $stmt_languages_def = $pdo->prepare("SELECT keyword, value FROM languages_def WHERE language_id = :language_id");
            $stmt_languages_def->bindParam(":language_id", $defualt_lang_code_id, PDO::PARAM_INT);
            $stmt_languages_def->execute();
            $results = $stmt_languages_def->fetchAll(PDO::FETCH_ASSOC);
            $stmt_languages_def->closeCursor();

            foreach($results as $result) {
                $keyword = $result['keyword'];
                $value = $result['value'];

                // create language definitions
                $stmt_languages_def_create = $pdo->prepare("INSERT INTO languages_def (language_id, keyword, value, created_at, updated_at) 
                                        VALUES (:language_id, :keyword, :value, :created_at, :updated_at)");
                $stmt_languages_def_create->bindParam(":language_id", $lang_code_id, PDO::PARAM_INT);
                $stmt_languages_def_create->bindParam(":keyword", $keyword, PDO::PARAM_STR);
                $stmt_languages_def_create->bindParam(":value", $value, PDO::PARAM_STR);
                $stmt_languages_def_create->bindParam(':created_at', $created_at, PDO::PARAM_STR);
                $stmt_languages_def_create->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
                $stmt_languages_def_create->execute();
                $stmt_languages_def_create->closeCursor();
            }

            // default settings
            $stmt_settings = $pdo->prepare("SELECT company, slogan, description, keywords, site_title, site_url, smtp_url, smtp_password, smtp_port,
                                normal_photo, normal_photo_width, normal_photo_height, top_photo, top_photo_width, top_photo_height,
                                small_photo, small_photo_width, small_photo_height, debug_mode, maintenance_mode, maintenance_mode_content
                                FROM settings WHERE language_id = :language_id");
            $stmt_settings->bindParam(":language_id", $defualt_lang_code_id, PDO::PARAM_INT);
            $stmt_settings->execute();
            $result = $stmt_settings->fetch(PDO::FETCH_ASSOC);
            $stmt_settings->closeCursor();

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
            $stmt_settings_create = $pdo->prepare("INSERT INTO settings (language_id, company, slogan, description,
                                keywords, site_title, site_url, smtp_url, smtp_password, smtp_port,
                                normal_photo, normal_photo_width, normal_photo_height, top_photo, top_photo_width, top_photo_height,
                                small_photo, small_photo_width, small_photo_height, debug_mode,
                                maintenance_mode, maintenance_mode_content, created_at, updated_at)
                                VALUES (:language_id, :company, :slogan, :description,
                                :keywords, :site_title, :site_url, :smtp_url, :smtp_password, :smtp_port,
                                :normal_photo, :normal_photo_width, :normal_photo_height, :top_photo, :top_photo_width, :top_photo_height,
                                :small_photo, :small_photo_width, :small_photo_height, :debug_mode,
                                :maintenance_mode, :maintenance_mode_content, :created_at, :updated_at)");
            $stmt_settings_create->bindParam(":language_id", $lang_code_id, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":company", $company, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":slogan", $slogan, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":keywords", $keywords, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":site_title", $site_title, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":site_url", $site_url, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":smtp_url", $smtp_url, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":smtp_password", $smtp_password, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":smtp_port", $smtp_port, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":normal_photo", $normal_photo, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":normal_photo_width", $normal_photo_width, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":normal_photo_height", $normal_photo_height, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":top_photo", $top_photo, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":top_photo_width", $top_photo_width, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":top_photo_height", $top_photo_height, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":small_photo", $small_photo, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(":small_photo_width", $small_photo_width, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":small_photo_height", $small_photo_height, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":debug_mode", $debug_mode, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":maintenance_mode", $maintenance_mode, PDO::PARAM_INT);
            $stmt_settings_create->bindParam(":maintenance_mode_content", $maintenance_mode_content, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt_settings_create->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $stmt_settings_create->execute();
            $stmt_settings_create->closeCursor();

            // default settings_contact
            $stmt_settings_contact = $pdo->prepare("SELECT address, phone, phone_code_id, cell_phone, cell_phone_code_id, fax, fax_code_id, email, 
                                    captcha_key, captcha_secret_key, google_maps
                                    FROM settings_contact WHERE language_id = :language_id");
            $stmt_settings_contact->bindParam(":language_id", $defualt_lang_code_id, PDO::PARAM_INT);
            $stmt_settings_contact->execute();
            $result = $stmt_settings_contact->fetch(PDO::FETCH_ASSOC);
            $stmt_settings_contact->closeCursor();

            $address = $result['address'];
            $phone = $result['phone'];
            $phone_code_id = $result['phone_code_id'];
            $cell_phone = $result['cell_phone'];
            $cell_phone_code_id = $result['cell_phone_code_id'];
            $fax = $result['fax'];
            $fax_code_id = $result['fax_code_id'];
            $email = $result['email'];
            $captcha_key = $result['captcha_key'];
            $captcha_secret_key = $result['captcha_secret_key'];
            $google_maps = $result['google_maps'];

            // create language definitions
            $stmt_settings_contact_create = $pdo->prepare("INSERT INTO settings_contact (language_id, address, phone, phone_code_id, 
                                    cell_phone, cell_phone_code_id, fax, fax_code_id, email,
                                    captcha_key, captcha_secret_key, google_maps, created_at, updated_at) 
                                    VALUES (:language_id, :address, :phone, :phone_code_id, :cell_phone, :cell_phone_code_id, :fax, :fax_code_id, 
                                    :email, :captcha_key, :captcha_secret_key, :google_maps,
                                    :created_at, :updated_at)");
            $stmt_settings_contact_create->bindParam(":language_id", $lang_code_id, PDO::PARAM_INT);
            $stmt_settings_contact_create->bindParam(":address", $address, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(":phone", $phone, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(":phone_code_id", $phone_code_id, PDO::PARAM_INT);
            $stmt_settings_contact_create->bindParam(":cell_phone", $cell_phone, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(":cell_phone_code_id", $cell_phone_code_id, PDO::PARAM_INT);
            $stmt_settings_contact_create->bindParam(":fax", $fax, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(":fax_code_id", $fax_code_id, PDO::PARAM_INT);
            $stmt_settings_contact_create->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(":captcha_key", $captcha_key, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(":captcha_secret_key", $captcha_secret_key, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(":google_maps", $google_maps, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt_settings_contact_create->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $stmt_settings_contact_create->execute();
            $stmt_settings_contact_create->closeCursor();

            $pdo->commit();

            // redirect to index page if everything is successfull
            Flash::addFlash($lang['flash_success_created'], 'success');
            Helpers::redirect($page);
        }
    }

    catch (PDOException $e) {
        // rollback changes
        $pdo->rollback();

        if (file_exists(ltrim($languages->flag->value, "/"))) {
            unlink(ltrim($languages->flag->value, "/"));
        }

        // show error message
        if ($e->getCode() == $UNIQUE_KEY_ERROR) {
            Flash::addFlash(sprintf($lang['flash_fail_unique'], $lang["label_code"]), 'danger');
        } else {
            Flash::addFlash($lang['flash_fail_created'], 'danger');
        }

        Helpers::redirect("$page/create");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
