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

            default:
                include_once __DIR__ . '/pages/test/index.php';
            }
        break;

    case 'settings':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/settings/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/settings/update.php';
                break;

            default:
                include_once __DIR__ . '/pages/settings/index.php';
            }
        break;

    case 'settings_contact':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/settings_contact/read.php';
                break;

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
