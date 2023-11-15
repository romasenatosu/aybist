<?php

require_once __DIR__ . '/../../database/GiderYonetimi.php';

$giderYonetimi = new GiderYonetimi();

// submit button
$text_action = 'Düzenle';

// show form field
include_once __DIR__ . '/_form.php';
