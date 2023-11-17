<?php

require_once __DIR__ . '/FormElement.php';

class Users {
    public FormElement $id;
    public FormElement $fullname;
    public FormElement $email;
    public FormElement $phone;
    public FormElement $address;
    public FormElement $password;
    public FormElement $is_admin;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->fullname = new FormElement('fullname');
        $this->email = new FormElement('email');
        $this->phone = new FormElement('phone');
        $this->address = new FormElement('address');
        $this->password = new FormElement('password');
        $this->is_admin = new FormElement('is_admin');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->fullname->maxlength = -1;
        $this->email->maxlength = -1;
        $this->phone->maxlength = 16;
        $this->address->maxlength = -1;
        $this->address->required = false;
        $this->password->maxlength = -1;
    }
}
