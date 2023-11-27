<?php

// create entity
$settings = new Settings();

// check for method
if (Helpers::getRequestMethod() == "GET") {
    // get values from database to show them in inputs fields
    $stmt = $pdo->prepare("SELECT company, slogan, keywords, site_title, site_url, smtp_url, smtp_port, 
    normal_photo, normal_photo_width, normal_photo_height, top_photo, top_photo_width, top_photo_height, 
    small_photo, small_photo_width, small_photo_height, debug_mode, maintenance_mode, maintenance_mode_content
    FROM settings
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
    $settings->company->value = $result['company'];
    $settings->slogan->value = $result['slogan'];
    $settings->keywords->value = $result['keywords'];
    $settings->site_title->value = $result['site_title'];
    $settings->site_url->value = $result['site_url'];
    $settings->smtp_url->value = $result['smtp_url'];
    $settings->smtp_port->value = $result['smtp_port'];
    $settings->normal_photo->value = $result['normal_photo'];
    $settings->normal_photo_width->value = $result['normal_photo_width'];
    $settings->normal_photo_height->value = $result['normal_photo_height'];
    $settings->top_photo->value = $result['top_photo'];
    $settings->top_photo_width->value = $result['top_photo_width'];
    $settings->top_photo_height->value = $result['top_photo_height'];
    $settings->small_photo->value = $result['small_photo'];
    $settings->small_photo_width->value = $result['small_photo_width'];
    $settings->small_photo_height->value = $result['small_photo_height'];
    $settings->debug_mode->value = $result['debug_mode'];
    $settings->maintenance_mode->value = $result['maintenance_mode'];
    $settings->maintenance_mode_content->value = $result['maintenance_mode_content'];
}

// check for method
if (Helpers::getRequestMethod() == 'POST') {
    // grab data from form inputs

    $settings->company->value = htmlspecialchars($_POST[$settings->company->name] ?? '');
    $settings->slogan->value = htmlspecialchars($_POST[$settings->slogan->name] ?? '');
    $settings->keywords->value = htmlspecialchars($_POST[$settings->keywords->name] ?? '');
    $settings->site_title->value = htmlspecialchars($_POST[$settings->site_title->name] ?? '');
    $settings->site_url->value = htmlspecialchars($_POST[$settings->site_url->name] ?? '');
    $settings->smtp_url->value = htmlspecialchars($_POST[$settings->smtp_url->name] ?? '');
    $settings->smtp_password->value = htmlspecialchars($_POST[$settings->smtp_password->name] ?? '');
    $settings->smtp_port->value = htmlspecialchars($_POST[$settings->smtp_port->name] ?? '');
    $settings->normal_photo->value = htmlspecialchars($_POST[$settings->normal_photo->name] ?? '');
    $settings->normal_photo_width->value = htmlspecialchars($_POST[$settings->normal_photo_width->name] ?? '');
    $settings->normal_photo_height->value = htmlspecialchars($_POST[$settings->normal_photo_height->name] ?? '');
    $settings->top_photo->value = htmlspecialchars($_POST[$settings->top_photo->name] ?? '');
    $settings->top_photo_width->value = htmlspecialchars($_POST[$settings->top_photo_width->name] ?? '');
    $settings->top_photo_height->value = htmlspecialchars($_POST[$settings->top_photo_height->name] ?? '');
    $settings->small_photo->value = htmlspecialchars($_POST[$settings->small_photo->name] ?? '');
    $settings->small_photo_width->value = htmlspecialchars($_POST[$settings->small_photo_width->name] ?? '');
    $settings->small_photo_height->value = htmlspecialchars($_POST[$settings->small_photo_height->name] ?? '');
    $settings->debug_mode->value = htmlspecialchars($_POST[$settings->debug_mode->name] ?? '');
    $settings->maintenance_mode->value = htmlspecialchars($_POST[$settings->maintenance_mode->name] ?? '');
    $settings->maintenance_mode_content->value = htmlspecialchars($_POST[$settings->maintenance_mode_content->name] ?? '');

    // check if given data is ok
    $checks = $settings->company->check() && $settings->slogan->check() && $settings->keywords->check() && 
                $settings->site_title->check() && $settings->site_url->check() && $settings->smtp_url->check() && 
                $settings->smtp_password->check() && $settings->smtp_port->check() && $settings->normal_photo->check() && 
                $settings->normal_photo_width->check() && $settings->normal_photo_height->check() && $settings->top_photo->check() && 
                $settings->top_photo_width->check() && $settings->top_photo_height->check() && $settings->small_photo->check()  || 
                $settings->small_photo_width->check() && $settings->small_photo_height->check() && $settings->debug_mode->check() && 
                $settings->maintenance_mode->check() && $settings->maintenance_mode_content->check();

    if ($checks) {
        // convert DateTime object to string
        $updated_at = date($datetime_format, $settings->updated_at->value->getTimestamp());

        // sql statement
        $stmt = $pdo->prepare("UPDATE settings SET company = :company, slogan = :slogan, keywords = :keywords,
                                site_title = :site_title, site_url = :site_url, smtp_url = :smtp_url,
                                smtp_password = :smtp_password, smtp_port = :smtp_port, normal_photo = :normal_photo,
                                normal_photo_width = :normal_photo_width, normal_photo_height = :normal_photo_height,
                                top_photo = :top_photo, top_photo_width = :top_photo_width, top_photo_height = :top_photo_height,
                                small_photo = :small_photo, small_photo_width = :small_photo_width, small_photo_height = :small_photo_height,
                                debug_mode = :debug_mode, maintenance_mode = :maintenance_mode, maintenance_mode_content = :maintenance_mode_content
                                updated_at = :updated_at
                                WHERE id = :id");

        //  bind values and parameters
        $stmt->bindParam(':company', $settings->company->value, PDO::PARAM_STR);
        $stmt->bindParam(':slogan', $settings->slogan->value, PDO::PARAM_STR);
        $stmt->bindParam(':keywords', $settings->keywords->value, PDO::PARAM_STR);
        $stmt->bindParam(':site_title', $settings->site_title->value, PDO::PARAM_STR);
        $stmt->bindParam(':site_url', $settings->site_url->value, PDO::PARAM_STR);
        $stmt->bindParam(':smtp_url', $settings->smtp_url->value, PDO::PARAM_STR);
        $stmt->bindParam(':smtp_password', $settings->smtp_password->value, PDO::PARAM_STR);
        $stmt->bindParam(':smtp_port', $settings->smtp_port->value, PDO::PARAM_INT);
        $stmt->bindParam(':normal_photo', $settings->normal_photo->value, PDO::PARAM_STR);
        $stmt->bindParam(':normal_photo_width', $settings->normal_photo_width->value, PDO::PARAM_INT);
        $stmt->bindParam(':normal_photo_height', $settings->normal_photo_height->value, PDO::PARAM_INT);
        $stmt->bindParam(':small_photo', $settings->normal_photo->value, PDO::PARAM_STR);
        $stmt->bindParam(':small_photo_width', $settings->normal_photo_width->value, PDO::PARAM_INT);
        $stmt->bindParam(':small_photo_height', $settings->normal_photo_height->value, PDO::PARAM_INT);
        $stmt->bindParam(':top_photo', $settings->normal_photo->value, PDO::PARAM_STR);
        $stmt->bindParam(':top_photo_width', $settings->normal_photo_width->value, PDO::PARAM_INT);
        $stmt->bindParam(':top_photo_height', $settings->normal_photo_height->value, PDO::PARAM_INT);
        $stmt->bindParam(':debug_mode', $settings->debug_mode->value, PDO::PARAM_INT);
        $stmt->bindParam(':maintenance_mode', $settings->maintenance_mode->value, PDO::PARAM_INT);
        $stmt->bindParam(':maintenance_mode_content', $settings->maintenance_mode_content->value, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // flush database
        $stmt->execute();

        // close the statement
        $stmt->closeCursor();

        // redirect to index page if everything is successfull
        Helpers::redirect("settings");
    }

    // this will open the current page so no reason to redirect again
}

// show form field
include_once __DIR__ . '/_form.php';
