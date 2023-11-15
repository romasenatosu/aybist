<?php

require_once __DIR__ . '/../../database/Mevzuatlar.php';

$mevzuatlar = new Mevzuatlar();

// submit button
$text_action = 'Düzenle';

// show form field
include_once __DIR__ . '/_form.php';
