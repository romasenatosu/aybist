<?php

require_once __DIR__ . '/FormElement.php';

class Blocks {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $name;
    public FormElement $description;
    public FormElement $floor_count;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->name = new FormElement('name');
        $this->description = new FormElement('description');
        $this->floor_count = new FormElement('floor_count');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->name->maxlength = -1;
        $this->name->pattern = "";
        $this->description->maxlength = -1;
        $this->description->required = false;
        $this->description->pattern = "";
        $this->floor_count->maxlength = 32767;
    }
}
