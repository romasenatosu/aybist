<?php

require_once __DIR__ . '/FormElement.php';

class Dukkanlar {
    public FormElement $id;
    public FormElement $name_surname;
    public FormElement $identification;
    public FormElement $email;
    public FormElement $password;
    public FormElement $phone;
    public FormElement $company_name;
    public FormElement $company_id;
    public FormElement $company_description;
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
        $this->company_name = new FormElement('company_name');
        $this->company_id = new FormElement('company_id');
        $this->company_description = new FormElement('company_description');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
