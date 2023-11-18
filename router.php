<?php

switch ($page) {
    case 'test':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/test/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/test/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/test/update.php';
                break;

                // TODO: don't redirect to index here instead show 403 error

            default:
                include_once __DIR__ . '/pages/test/index.php';
            }
        break;

    case 'managements':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/managements/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/managements/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/managements/update.php';
                break;

            default:
                include_once __DIR__ . '/pages/managements/index.php';
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

            default:
                include_once __DIR__ . '/pages/managements_blocks/index.php';
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

            default:
                include_once __DIR__ . '/pages/managements_flats/index.php';
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

            default:
                include_once __DIR__ . '/pages/managements_floors/index.php';
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

            default:
                include_once __DIR__ . '/pages/places_countries/index.php';
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

            default:
                include_once __DIR__ . '/pages/places_cities/index.php';
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

            default:
                include_once __DIR__ . '/pages/places_districts/index.php';
            }
        break;

    case 'notifications':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/notifications/read.php';
                break;

            default:
                include_once __DIR__ . '/pages/notifications/index.php';
            }
        break;

    case 'notifications_ips':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/notifications_ips/read.php';
                break;

            default:
                include_once __DIR__ . '/pages/notifications_ips/index.php';
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

            default:
                include_once __DIR__ . '/pages/languages/index.php';
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

            default:
                include_once __DIR__ . '/pages/languages_def/index.php';
            }
        break;

    case 'settings_general':
        switch ($action) {
            case 'update':
                include_once __DIR__ . '/pages/settings_general/update.php';
                break;

            default:
                include_once __DIR__ . '/pages/settings_general/index.php';
            }
        break;

    case 'settings_contact':
        switch ($action) {
            case 'update':
                include_once __DIR__ . '/pages/settings_contact/update.php';
                break;

            default:
                include_once __DIR__ . '/pages/settings_contact/index.php';
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

            default:
                include_once __DIR__ . '/pages/settings_currency/index.php';
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

            default:
                include_once __DIR__ . '/pages/settings_vat/index.php';
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

            default:
                include_once __DIR__ . '/pages/settings_users/index.php';
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

    default:
        include_once __DIR__ . '/pages/errors/404.php'; 
}
