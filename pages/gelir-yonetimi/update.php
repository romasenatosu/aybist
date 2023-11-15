<?php

require_once __DIR__ . '/../../database/GelirYonetimi.php';

$gelirYonetimi = new GelirYonetimi();

// submit button
$text_action = 'Düzenle';

// show form field
include_once __DIR__ . '/_form.php';
