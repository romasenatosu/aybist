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

    case 'home':
        include_once __DIR__ . '/home.php';
        break;

    case 'logout':
        include_once __DIR__ . '/logout.php';
        break;

    default:
        include_once __DIR__ . '/pages/errors/404.php'; 
}
