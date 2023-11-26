<?php

class SettingsContact {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $address;
    public FormElement $phone;
    public FormElement $phone_code_id;
    public FormElement $cell_phone;
    public FormElement $cell_phone_code_id;
    public FormElement $fax;
    public FormElement $fax_code_id;
    public FormElement $email;
    public FormElement $captcha_key;
    public FormElement $captcha_secret_key;
    public FormElement $google_maps;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha_numeric, $regex_phone, $regex_email;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->address = new FormElement('address');
        $this->phone = new FormElement('phone');
        $this->phone_code_id = new FormElement('phone_code_id');
        $this->cell_phone = new FormElement('cell_phone');
        $this->cell_phone_code_id = new FormElement('cell_phone_code_id');
        $this->fax = new FormElement('fax');
        $this->fax_code_id = new FormElement('fax_code_id');
        $this->email = new FormElement('email');
        $this->captcha_key = new FormElement('captcha_key');
        $this->captcha_secret_key = new FormElement('captcha_secret_key');
        $this->google_maps = new FormElement('google_maps');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->address->maxlength = -1;
        $this->address->required = false;
        $this->phone->maxlength = 24;
        $this->phone->required = false;
        $this->phone->pattern = $regex_phone;
        $this->phone->pattern_msg = $lang['regex_phone'];
        $this->cell_phone->maxlength = 24;
        $this->cell_phone->pattern = $regex_phone;
        $this->cell_phone->pattern_msg = $lang['regex_phone'];
        $this->fax->maxlength = 24;
        $this->fax->required = false;
        $this->fax->pattern = $regex_phone;
        $this->fax->pattern_msg = $lang['regex_phone'];
        $this->email->maxlength = 255;
        $this->email->pattern = $regex_email;
        $this->email->pattern_msg = $lang['regex_email'];
        $this->captcha_key->maxlength = 64;
        $this->captcha_key->required = false;
        $this->captcha_key->pattern = $regex_alpha_numeric;
        $this->captcha_key->pattern_msg = $lang['regex_alpha_numeric'];
        $this->captcha_secret_key->maxlength = 64;
        $this->captcha_secret_key->required = false;
        $this->captcha_secret_key->pattern = $regex_alpha_numeric;
        $this->captcha_secret_key->pattern_msg = $lang['regex_alpha_numeric'];
        $this->google_maps->maxlength = -1;
        $this->google_maps->required = false;
    }
}
