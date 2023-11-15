<?php

require_once __DIR__ . '/FormElement.php';

class UyeYonetimi {
    public FormElement $id;
    public FormElement $name_surname;
    public FormElement $identification;
    public FormElement $email;
    public FormElement $password;
    public FormElement $phone;
    public FormElement $birthdate;
    public FormElement $birthplace;
    public FormElement $description;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->name_surname = new FormElement('name_surname');
        $this->identification = new FormElement('identification');
        $this->email = new FormElement('email');
        $this->password = new FormElement('password');
        $this->phone = new FormElement('phone');
        $this->birthdate = new FormElement('birthdate');
        $this->birthplace = new FormElement('birthplace');
        $this->description = new FormElement('description');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
