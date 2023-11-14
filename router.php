<?php

// get URL parameters
$page = htmlspecialchars($_GET['page'] ?? 'home');  // if no page was given then redirect to home eventually
$action = htmlspecialchars($_GET['action'] ?? '');
$id = filter_var(htmlspecialchars($_GET['id'] ?? ''), FILTER_VALIDATE_INT);

switch ($page) {
    case 'dukkanlar':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/dukkanlar/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/dukkanlar/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/dukkanlar/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/dukkanlar/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/dukkanlar/index.php';
            }
        break;

    case 'bloklar':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/bloklar/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/bloklar/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/bloklar/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/bloklar/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/bloklar/index.php';
            }
        break;

    case 'gelir-yonetimi':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/gelir-yonetimi/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/gelir-yonetimi/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/gelir-yonetimi/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/gelir-yonetimi/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/gelir-yonetimi/index.php';
            }
        break;

    case 'gider-yonetimi':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/gider-yonetimi/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/gider-yonetimi/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/gider-yonetimi/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/gider-yonetimi/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/gider-yonetimi/index.php';
            }
        break;
    
    case 'uye-yonetimi':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/uye-yonetimi/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/uye-yonetimi/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/uye-yonetimi/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/uye-yonetimi/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/uye-yonetimi/index.php';
            }
        break;

    case 'ucretler':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/ucretler/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/ucretler/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/ucretler/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/ucretler/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/ucretler/index.php';
            }
        break;

    case 'raporlar':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/raporlar/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/raporlar/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/raporlar/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/raporlar/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/raporlar/index.php';
            }
        break;

    case 'mesajlar':
        include_once __DIR__ . '/pages/mesajlar/index.php';
        break;
    
    case 'ilanlar':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/ilanlar/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/ilanlar/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/ilanlar/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/ilanlar/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/ilanlar/index.php';
            }
        break;
    
    case 'mevzuatlar':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/mevzuatlar/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/mevzuatlar/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/mevzuatlar/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/mevzuatlar/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/mevzuatlar/index.php';
            }
        break;
    
    case 'sms-gonder':
        include_once __DIR__ . '/pages/sms-gonder/index.php';
        break;
    
    case 'duyurular':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/duyurular/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/duyurular/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/duyurular/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/duyurular/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/duyurular/index.php';
            }
        break;

    case 'mail-gonder':
        include_once __DIR__ . '/pages/mail-gonder/index.php';
        break;

    case 'belge-yonetimi':
        switch ($action) {
            case 'create':
                include_once __DIR__ . '/pages/belge-yonetimi/create.php';
                break;

            case 'read':
                include_once __DIR__ . '/pages/belge-yonetimi/read.php';
                break;

            case 'update':
                include_once __DIR__ . '/pages/belge-yonetimi/update.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/belge-yonetimi/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/belge-yonetimi/index.php';
            }
        break;
    
    case 'talepler':
        switch ($action) {
            case 'read':
                include_once __DIR__ . '/pages/talepler/read.php';
                break;
            
            case 'delete':
                include_once __DIR__ . '/pages/talepler/delete.php';
                break;
            
            default:
                include_once __DIR__ . '/pages/talepler/index.php';
            }
        break;
    
    case 'ayarlar':
        include_once __DIR__ . '/pages/ayarlar/index.php';
        break;
    
    case 'home':
        include_once __DIR__ . '/home.php';
        break;

    default:
        include_once __DIR__ . '/pages/errors/404.php'; 
}
