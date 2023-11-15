<?php

require_once __DIR__ . '/FormElement.php';

class Ilanlar {
    public FormElement $id;
    public FormElement $member_name_surname;
    public FormElement $title;
    public FormElement $description;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->member_name_surname = new FormElement('member_name_surname');
        $this->title = new FormElement('title');
        $this->description = new FormElement('description');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
