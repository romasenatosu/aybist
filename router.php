<?php

// start listening status codes
// $status_code = http_response_code();

// 100 = HTTP INFO
// 200 = HTTP OK
// 300 = HTTP REDIRECT
// 400 = HTTP CLIENT ERROR
// 500 = HTTP SERVER ERROR

// myurl = ?locale(required) &page(required) &action(optional) &id(optional)
// locale is being handled by language.php

$tablename = "";

// if user did not sign in then redirect user to login page
if (!isset($_SESSION['user']) and !str_starts_with($page, "error_") and !str_starts_with($page, "login")) {
    Helpers::redirectAuthenticate();
}

// do not let users to go error pages without error
// if (str_starts_with($page, "error_") and http_response_code() < 400) {
//     Helpers::redirectInvalidRequest();
// }

switch ($page) {
    case 'error_400':
        include_once Helpers::checkMethods("pages/errors/400.php");
        break;

    case 'error_401':
        include_once Helpers::checkMethods("pages/errors/401.php");
        break;

    case 'error_402':
        include_once Helpers::checkMethods("pages/errors/402.php");
        break;

    case 'error_403':
        include_once Helpers::checkMethods("pages/errors/403.php");
        break;

    case 'error_404':
        include_once Helpers::checkMethods("pages/errors/404.php");
        break;

    case 'error_405':
        include_once Helpers::checkMethods("pages/errors/405.php");
        break;

    case 'error_500':
    case 'error_default':
        include_once Helpers::checkMethods("pages/errors/500.php");
        break;

    case 'managements':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/managements/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "managements";
                include_once Helpers::checkMethods("pages/managements/read.php");
                break;

            case 'update':
                $tablename = "managements";
                include_once Helpers::checkMethods("pages/managements/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "managements";
                include_once Helpers::checkMethods("pages/managements/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/managements/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;
        
    case 'managements_blocks':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/managements_blocks/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "blocks";
                include_once Helpers::checkMethods("pages/managements_blocks/read.php");
                break;

            case 'update':
                $tablename = "blocks";
                include_once Helpers::checkMethods("pages/managements_blocks/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "blocks";
                include_once Helpers::checkMethods("pages/managements_blocks/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/managements_blocks/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'managements_flats':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/managements_flats/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "flats";
                include_once Helpers::checkMethods("pages/managements_flats/read.php");
                break;

            case 'update':
                $tablename = "flats";
                include_once Helpers::checkMethods("pages/managements_flats/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "flats";
                include_once Helpers::checkMethods("pages/managements_flats/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/managements_flats/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'managements_floors':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/managements_floors/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "floors";
                include_once Helpers::checkMethods("pages/managements_floors/read.php");
                break;

            case 'update':
                $tablename = "floors";
                include_once Helpers::checkMethods("pages/managements_floors/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "floors";
                include_once Helpers::checkMethods("pages/managements_floors/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/managements_floors/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'places_countries':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/places_countries/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "countries";
                include_once Helpers::checkMethods("pages/places_countries/read.php");
                break;

            case 'update':
                $tablename = "countries";
                include_once Helpers::checkMethods("pages/places_countries/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "countries";
                include_once Helpers::checkMethods("pages/places_countries/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/places_countries/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'places_cities':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/places_cities/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "cities";
                include_once Helpers::checkMethods("pages/places_cities/read.php");
                break;

            case 'update':
                $tablename = "cities";
                include_once Helpers::checkMethods("pages/places_cities/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "cities";
                include_once Helpers::checkMethods("pages/places_cities/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/places_cities/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'places_districts':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/places_districts/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "districts";
                include_once Helpers::checkMethods("pages/places_districts/read.php");
                break;

            case 'update':
                $tablename = "districts";
                include_once Helpers::checkMethods("pages/places_districts/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "districts";
                include_once Helpers::checkMethods("pages/places_districts/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/places_districts/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'notifications':
        switch ($action) {
            case 'read':
                $tablename = "notifications";
                include_once Helpers::checkMethods("pages/notifications/read.php");
                break;

            case '':
                include_once Helpers::checkMethods("pages/notifications/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'notifications_ips':
        switch ($action) {
            case 'read':
                $tablename = "notifications_ips";
                include_once Helpers::checkMethods("pages/notifications_ips/read.php");
                break;

            case '':
                include_once Helpers::checkMethods("pages/notifications_ips/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'languages':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/languages/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "languages";
                include_once Helpers::checkMethods("pages/languages/read.php");
                break;

            case 'update':
                $tablename = "languages";
                include_once Helpers::checkMethods("pages/languages/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "languages";
                include_once Helpers::checkMethods("pages/languages/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/languages/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'languages_def':
        switch ($action) {
            case 'read':
                $tablename = "languages_def";
                include_once Helpers::checkMethods("pages/languages_def/read.php");
                break;

            case 'update':
                $tablename = "languages_def";
                include_once Helpers::checkMethods("pages/languages_def/update.php", ["GET", "POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/languages_def/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'settings_general':
        switch ($action) {
            case 'update':
                $tablename = "settings";
                include_once Helpers::checkMethods("pages/settings_general/update.php", ["GET", "POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/settings_general/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'settings_contact':
        switch ($action) {
            case 'update':
                $tablename = "settings_contact";
                include_once Helpers::checkMethods("pages/settings_contact/update.php", ["GET", "POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/settings_contact/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'settings_currency':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/settings_currency/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "settings_currency";
                include_once Helpers::checkMethods("pages/settings_currency/read.php");
                break;

            case 'update':
                $tablename = "settings_currency";
                include_once Helpers::checkMethods("pages/settings_currency/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "settings_currency";
                include_once Helpers::checkMethods("pages/settings_currency/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/settings_currency/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'settings_vat':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/settings_vat/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "settings_vat";
                include_once Helpers::checkMethods("pages/settings_vat/read.php");
                break;

            case 'update':
                $tablename = "settings_vat";
                include_once Helpers::checkMethods("pages/settings_vat/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "settings_vat";
                include_once Helpers::checkMethods("pages/settings_vat/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/settings_vat/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case 'settings_users':
        switch ($action) {
            case 'create':
                include_once Helpers::checkMethods("pages/settings_users/create.php", ["GET", "POST"]);
                break;

            case 'read':
                $tablename = "users";
                include_once Helpers::checkMethods("pages/settings_users/read.php");
                break;

            case 'update':
                $tablename = "users";
                include_once Helpers::checkMethods("pages/settings_users/update.php", ["GET", "POST"]);
                break;

            case 'delete':
                $tablename = "users";
                include_once Helpers::checkMethods("pages/settings_users/delete.php", ["POST"]);
                break;

            case '':
                include_once Helpers::checkMethods("pages/settings_users/index.php");
                break;

            default:
                Helpers::redirectNotFound();
            }
        break;

    case '':
        Helpers::redirectHome();
        break;

    case 'home':
        if ($action) {
            Helpers::redirectNotFound();
        }

        include_once Helpers::checkMethods("home.php");
        break;

    case 'login':
        if ($action) {
            Helpers::redirectNotFound();
        }

        if (isset($_SESSION['user'])) {
            Helpers::redirectHome();
        }

        include_once Helpers::checkMethods("login.php", ["GET", "POST"]);
        break;

    case 'logout':
        include_once Helpers::checkMethods("logout.php");
        break;

    default:
        Helpers::redirectNotFound();
}

// look for id

if (!empty($tablename)) {
    if (!Helpers::checkId($tablename)) {
        Helpers::redirectNotFound();
    }
}
