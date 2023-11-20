<?php

function changeLocale(string $new_locale): string {
    global $locale;
    $query = $_SERVER['QUERY_STRING'];
    return sprintf("%s", str_replace("locale=$locale", "locale=$new_locale", $query));
}

function getLocaleId(string $language_code): int {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id FROM languages WHERE code = :code");
    $stmt->bindParam(":code", $language_code, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result['id'] ?? 0;
}

function getLocaleDict(int $language_id): array {
    global $pdo;
    $stmt = $pdo->prepare("SELECT keyword, value FROM languages_def WHERE language_id = :language_id");
    $stmt->bindParam(':language_id', $language_id, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    // format the data according to the lang array
    $formatted_data = [];
    foreach($results as $result) {
        $formatted_data[$result['keyword']] = $result['value'];
    }

    return $formatted_data;
}

// check if that locale exists otherwise redirect user to home page with default locale
$language_id = getLocaleId($locale);

if (!$language_id > 0) {
    header("Location: " . $_SERVER['HTTP_SERVER'] . "/?locale=$default_locale&page=$page&action=$action");
}

$lang = getLocaleDict($language_id);
