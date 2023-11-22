<?php

// start listening status codes
$status_code = http_response_code();

// 100 = HTTP INFO
// 200 = HTTP OK
// 300 = HTTP REDIRECT
// 400 = HTTP CLIENT ERROR
// 500 = HTTP SERVER ERROR

/**
 * checks if the response code really returned by server otherwise redirects to home page
 * 
 * @param int code
 * @return void
 */
function checkResponse(int $code): void {
    global $locale, $status_code;

    // var_dump($status_code, $code);
    // die();

    if ($status_code == $code) {
        include_once __DIR__ . "/pages/errors/$code.php";
    } else {
        redirectHome($locale);
    }
}

// myurl = ?locale(required) &page(required) &action(optional) &id(optional)
// locale is being handled by language.php

switch ($page) {
    case 'error_400':
        checkResponse(400);
        break;

    case 'error_401':
        checkResponse(401);
        break;

    case 'error_402':
        checkResponse(402);
        break;

    case 'error_403':
        checkResponse(403);
        break;

    case 'error_404':
        checkResponse(404);
        break;

    case 'error_500':
        checkResponse(500);
        break;

    case 'managements':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/managements/create.php';
                break;

            case 'read':
                if (check_id('managements')) {
                    include_once __DIR__ . '/pages/managements/read.php';
                } else {
                    redirectNotFound($locale);
                }

                break;

            case 'update':
                if (check_id('managements')) {
                    include_once __DIR__ . '/pages/managements/update.php';
                } else {
                    redirectNotFound($locale);
                }

                break;

            case 'delete':
                if (check_id('managements')) {
                    include_once __DIR__ . '/pages/managements/delete.php';
                } else {
                    redirectNotFound($locale);
                }

                break;

            case '':
                include_once __DIR__ . '/pages/managements/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;
        
    case 'managements_blocks':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/managements_blocks/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/managements_blocks/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/managements_blocks/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/managements_blocks/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/managements_blocks/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'managements_flats':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/managements_flats/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/managements_flats/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/managements_flats/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/managements_flats/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/managements_flats/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'managements_floors':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/managements_floors/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/managements_floors/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/managements_floors/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/managements_floors/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/managements_floors/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'places_countries':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/places_countries/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/places_countries/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/places_countries/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/places_countries/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/places_countries/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'places_cities':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/places_cities/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/places_cities/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/places_cities/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/places_cities/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/places_cities/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'places_districts':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/places_districts/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/places_districts/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/places_districts/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/places_districts/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/places_districts/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'notifications':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/notifications/read.php';
                break;

            case '':
                include_once __DIR__ . '/pages/notifications/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'notifications_ips':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/notifications_ips/read.php';
                break;

            case '':
                include_once __DIR__ . '/pages/notifications_ips/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'languages':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/languages/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/languages/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/languages/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/languages/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/languages/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'languages_def':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/languages_def/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/languages_def/update.php';
                break;

            case '':
                include_once __DIR__ . '/pages/languages_def/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'settings_general':
        switch ($action) {
            case 'update':
                include_once __DIR__ . '/pages/settings_general/update.php';
                break;

            case '':
                include_once __DIR__ . '/pages/settings_general/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'settings_contact':
        switch ($action) {
            case 'update':
                include_once __DIR__ . '/pages/settings_contact/update.php';
                break;

            case '':
                include_once __DIR__ . '/pages/settings_contact/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'settings_currency':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/settings_currency/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/settings_currency/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/settings_currency/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/settings_currency/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/settings_currency/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'settings_vat':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/settings_vat/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/settings_vat/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/settings_vat/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/settings_vat/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/settings_vat/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'settings_users':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/settings_users/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/settings_users/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/settings_users/update.php';
                break;

            case 'delete':
                include_once __DIR__ . '/pages/settings_users/delete.php';
                break;

            case '':
                include_once __DIR__ . '/pages/settings_users/index.php';
                break;

            default:
                redirectNotFound($locale);
            }
        break;

    case 'home':
        include_once __DIR__ . '/home.php';
        break;

    case 'login':
        include_once __DIR__ . '/login.php';
        break;

    case 'logout':
        include_once __DIR__ . '/logout.php';
        break;

    case '':
        redirectHome($locale);
        break;

    default:
        redirectNotFound($locale);
}
