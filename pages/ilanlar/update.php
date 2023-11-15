<?php

require_once __DIR__ . '/../../database/Ilanlar.php';

$ilanlar = new Ilanlar();

// submit button
$text_action = 'Düzenle';

// show form field
include_once __DIR__ . '/_form.php';
