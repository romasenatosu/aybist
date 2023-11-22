<?php

require_once __DIR__ . '/FormElement.php';

class Users {
    public FormElement $id;
    public FormElement $fullname;
    public FormElement $email;
    public FormElement $phone;
    public FormElement $phone_code_id;
    public FormElement $address;
    public FormElement $password;
    public FormElement $password_confirm;
    public FormElement $avatar;
    public FormElement $is_admin;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha_numeric, $regex_email, $regex_phone, $regex_url, $photo_files_extensions;

        $this->id = new FormElement('id');
        $this->fullname = new FormElement('fullname');
        $this->email = new FormElement('email');
        $this->phone = new FormElement('phone');
        $this->phone_code_id = new FormElement('phone_code_id');
        $this->address = new FormElement('address');
        $this->password = new FormElement('password');
        $this->password_confirm = new FormElement('password_confirm');
        $this->avatar = new FormElement('avatar');
        $this->is_admin = new FormElement('is_admin');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->fullname->maxlength = -1;
        $this->fullname->pattern = $regex_alpha_numeric;
        $this->fullname->pattern_msg = $lang['regex_alpha_numeric'];
        $this->email->maxlength = -1;
        $this->email->pattern = $regex_email;
        $this->email->pattern_msg = $lang['regex_email'];
        $this->phone->maxlength = 24;
        $this->phone->pattern = $regex_phone;
        $this->phone->pattern_msg = $lang['regex_phone'];
        $this->address->maxlength = -1;
        $this->address->required = false;
        $this->password->maxlength = -1;
        $this->password_confirm->maxlength = -1;
        $this->avatar->required = false;
        $this->avatar->maxlength = -1;
        $this->avatar->pattern = $regex_url;
        $this->avatar->pattern_msg = $lang['regex_url'];
        $this->avatar->accept = $photo_files_extensions;
        $this->avatar->help_msg = sprintf($lang['help_photo_files'], $photo_files_extensions);
        $this->is_admin->required = false;
    }
}
