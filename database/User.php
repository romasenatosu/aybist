<?php

require_once __DIR__ . '/FormElement.php';

class User {
    public FormElement $id;
    public FormElement $name_surname;
    public FormElement $email;
    public FormElement $phone;
    public FormElement $password;
    public FormElement $new_password;
    public FormElement $new_password_again;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->name_surname = new FormElement('name_surname');
        $this->email = new FormElement('email');
        $this->phone = new FormElement('phone');
        $this->password = new FormElement('password');
        $this->new_password = new FormElement('new_password');
        $this->new_password_again = new FormElement('new_password_again');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
