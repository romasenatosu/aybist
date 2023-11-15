<?php

require_once __DIR__ . '/../../database/BelgeYonetimi.php';

$belgeYonetimi = new BelgeYonetimi();
$belgeYonetimi->title->value = 'hello';
$belgeYonetimi->description->value = 'lorem ipsum';

// submit button
$text_action = 'Düzenle';

// show form field
include_once __DIR__ . '/_form.php';
