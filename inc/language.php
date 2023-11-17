<?php

// TODO: get language values from database

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

    "page_home" => "Ana Sayfa",
    "page_test" => "Test",
    "page_settings" => "Ayarlar",
    "page_settings_general" => "Genel Ayarlar",
    "page_settings_contact" => "İletişim Ayarları",
    "page_settings_currency" => "Kur Ayarları",
    "page_settings_vat" => "KDV Ayarları",

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
];

function changeLocale(string $new_locale) {
    global $locale;
    $query = $_SERVER['QUERY_STRING'];
    return sprintf("%s", str_replace("locale=$locale", "locale=$new_locale", $query));
}
