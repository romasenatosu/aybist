<?php

require_once __DIR__ . '/FormElement.php';

class Floors {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $floor;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->floor = new FormElement('floor');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        
        // configurations
        $this->floor->maxlength = -1;
    }
}
