<?php

// TODO: get language values from database

$stmt = $pdo->prepare("SELECT `id` FROM `languages` WHERE `code` = :code");
$stmt->bindParam(":code", $locale, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$language_id = $result['id'] ?? 0;
$stmt->closeCursor();

$stmt = $pdo->prepare("SELECT `keyword`, `value` FROM `languages_def` WHERE `language_id` = :language_id");
$stmt->bindParam(':language_id', $language_id, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$lang = $result; // format here if needed
$stmt->closeCursor();
die();

$lang = [
    "text_new" => "Yeni Ekle",
    "text_create" => "Ekle",
    "text_read" => "Göster",
    "text_update" => "Düzenle",
    "text_delete" => "Sil",
    "text_forgot_password" => "Şifremi unuttum",
    "text_back_to_home" => "Ana Sayfaya Dön",
    "text_go_back" => "Geri Dön",
    "text_login" => "Giriş Yap",
    "text_logout" => "Çıkış Yap",
    "text_yes" => "Evet",
    "text_no" => "Hayır",

    "page_home" => "Ana Sayfa",
    "page_test" => "Test",
    "page_settings" => "Ayarlar",
    "page_settings_general" => "Genel Ayarlar",
    "page_settings_contact" => "İletişim Ayarları",
    "page_settings_currency" => "Kur Ayarları",
    "page_settings_vat" => "KDV Ayarları",
    "page_settings_users" => "Kullanıcı Ayarları",
    "page_languages" => "Diller",
    "page_languages_def" => "Dil Tanımlamaları",
    "page_notifications" => "Bildirimler",
    "page_notifications_ips" => "Ziyaret Eden IP'ler",
    "page_places_districts" => "İlçeler",
    "page_places_cities" => "Şehirler",
    "page_places_countries" => "Ülkeler",
    "page_places" => "Yerleşim Yerleri",
    "page_managements" => "İşletmeler",
    "page_managements_blocks" => "Bloklar",
    "page_managements_flats" => "Daireler",
    "page_managements_floors" => "Katlar",

    "table_title" => "BAŞLIK",
    "table_description" => "AÇIKLAMA",
    "table_created_at" => "KAYIT TARİHİ",
    "table_updated_at" => "GÜNCELLEME TARİHİ",
    "table_action" => "İŞLEM",

    "error_400" => "Geçersiz İstek.",
    "error_401" => "Yetkilendirilmemiş istek.",
    "error_402" => "Ödeme Gerekli.",
    "error_403" => "Bu sayfaya erişiminiz kapalı.",
    "error_404" => "İstediğiniz sayfaya ulaşılamıyor.",
    "error_500" => "Server Hatası.",

    "label_username" => "Kullanıcı Adı",
    "label_password" => "Şifre",
    "label_remember_me" => "Beni Hatırla",
    "label_title" => "Başlık",
    "label_description" => "Açıklama",

    "placeholder_username" => "Kullanıcı Adı",
    "placeholder_password" => "Şifre",
    "placeholder_title" => "Başlık",
    "placeholder_description" => "Açıklama",

    "datatable_emptyTable" => "Tabloda hiçbir veri yok",
    "datatable_info" => "Toplam %s veri arasından %s ila %s arası gösteriliyor",
    "datatable_infoEmpty" => "Toplam 0 veri arasından 0 ila 0 arası gösteriliyor",
    "datatable_infoFiltered" => "(Toplam %s veri arasından filtrelenenler gösteriliyor)",
    "datatable_lengthMenu" => "%s adet veri göster",
    "datatable_loadingRecords" => "Yükleniyor...",
    "datatable_processing" => "İşleniyor...",
    "datatable_search" => "Ara:",
    "datatable_zeroRecords" => "Buna ilişkin hiçbir veri bulunamadı.",
    "datatable_paginate_first" => "İlk",
    "datatable_paginate_last" => "Son",
    "datatable_paginate_next" => "Sonraki",
    "datatable_paginate_previous" => "Önceki",
    "datatable_buttons_colvis" => "Görünürlük",
    "datatable_buttons_copy" => "Kopyala",
    "datatable_buttons_csv" => "CSV",
    "datatable_buttons_excel" => "EXCEL",
    "datatable_buttons_pdf" => "PDF",
    "datatable_buttons_print" => "YAZDIR",

    "swal_title_delete_confirm" => "Bu veriyi silmek istediğinize emin misiniz?",
];

function changeLocale(string $new_locale) {
    global $locale;
    $query = $_SERVER['QUERY_STRING'];
    return sprintf("%s", str_replace("locale=$locale", "locale=$new_locale", $query));
}
