<?php

/**
 * returns new url according to the requested locale
 * 
 * @param string $new_locale
 * @return string request_uri
 */
function changeLocale(string $new_locale): string {
    global $locale;
    $request = get_request_uri();
    return sprintf("%s", str_replace("locale=$locale", "locale=$new_locale", $request));
}

/**
 * returns id of the locale by language code
 * 
 * @param string $language_code
 * @return int language_id
 */
function getLocaleId(string $language_code): int {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id FROM languages WHERE code = :code");
    $stmt->bindParam(":code", $language_code, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result['id'] ?? 0;
}

/**
 * returns all id of locales in database
 * 
 * @return array id of locales
 */
function getAllLocaleId(): array {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id FROM languages");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result;
}

/**
 * returns all locale codes of locales in database
 * 
 * @return array code of locales
 */
function getAllLocales(): array {
    global $pdo;
    $stmt = $pdo->prepare("SELECT code FROM languages");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result;
}

/**
 * gets all predefined language variables according to the given language_id
 * 
 * @param int $language_id
 * @return array dictionary of language
 */
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

// check if that locale exists otherwise redirect user with default locale
$language_id = getLocaleId($locale);
if (!$language_id > 0) {
    if (empty($locale)) {
        redirectHome($default_locale);
    } else {
        redirectHome($default_locale);
        // redirectNotFound($default_locale);
    }
}

$lang = getLocaleDict($language_id);
