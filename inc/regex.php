<?php

$regex_url = "/^(?:[a-zA-Z]:\\|[\/\\])?([a-zA-Z0-9]+[\/\\])+([a-zA-Z0-9]+\.[a-zA-Z0-9]+)$/";
$regex_alpha_numeric = "/^[a-zA-Z0-9 çÇğĞıİöÖşŞüÜ]+$/";
$regex_alpha = "/^[a-zA-Z çÇğĞıİöÖşŞüÜ]+$/";
$regex_keywords = "/^[a-zA-Z0-9çÇğĞıİöÖşŞüÜ]+(?:,\s*[a-zA-Z0-9çÇğĞıİöÖşŞüÜ]+)*$/";
$regex_lang_code = "/^[a-zA-Z_]+$/";
$regex_numeric = "/^[0-9]+$/";
$regex_flat = "/^[0-9\+]+$/";
$regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$regex_phone = "/^\+?[0-9]+[0-9 ]+$/";
