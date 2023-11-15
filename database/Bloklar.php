<?php

require_once __DIR__ . '/FormElement.php';

class Bloklar {
    public FormElement $id;
    public FormElement $complex_name;
    public FormElement $level_count;
    public FormElement $description;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->complex_name = new FormElement('complex_name');
        $this->level_count = new FormElement('level_count');
        $this->description = new FormElement('description');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
