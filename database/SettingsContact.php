<?php

require_once __DIR__ . '/FormElement.php';

class SettingsContact {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $address;
    public FormElement $phone;
    public FormElement $cell_phone;
    public FormElement $fax;
    public FormElement $email;
    public FormElement $captcha_key;
    public FormElement $captcha_secret_key;
    public FormElement $google_maps;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->address = new FormElement('address');
        $this->phone = new FormElement('phone');
        $this->cell_phone = new FormElement('cell_phone');
        $this->fax = new FormElement('fax');
        $this->email = new FormElement('email');
        $this->captcha_key = new FormElement('captcha_key');
        $this->captcha_secret_key = new FormElement('captcha_secret_key');
        $this->google_maps = new FormElement('google_maps');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->address->maxlength = -1;
        $this->address->required = false;
        $this->phone->maxlength = 16;
        $this->phone->required = false;
        $this->cell_phone->maxlength = 16;
        $this->fax->maxlength = 16;
        $this->fax->required = false;
        $this->email->maxlength = -1;
        $this->captcha_key->maxlength = 64;
        $this->captcha_key->required = false;
        $this->captcha_secret_key->maxlength = 64;
        $this->captcha_secret_key->maxlength = false;
        $this->google_maps->maxlength = -1;
        $this->google_maps->required = false;
    }
}
