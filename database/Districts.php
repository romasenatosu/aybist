<?php

require_once __DIR__ . '/FormElement.php';

class Districts {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $city_id;
    public FormElement $district;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->city_id = new FormElement('city_id');
        $this->district = new FormElement('district');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->district->maxlength = -1;
    }
}
