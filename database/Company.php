<?php

require_once __DIR__ . '/FormElement.php';

class Company {
    public FormElement $id;
    public FormElement $title;
    public FormElement $name_surname;
    public FormElement $address;
    public FormElement $tax_office;
    public FormElement $tax_number;
    public FormElement $registration_number;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->title = new FormElement('title');
        $this->name_surname = new FormElement('name_surname');
        $this->address = new FormElement('address');
        $this->tax_office = new FormElement('tax_office');
        $this->tax_number = new FormElement('tax_number');
        $this->registration_number = new FormElement('registration_number');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
