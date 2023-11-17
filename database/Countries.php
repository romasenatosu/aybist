<?php

require_once __DIR__ . '/FormElement.php';

class Countries {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $country;
    public FormElement $phone_code;
    public FormElement $flag;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->country = new FormElement('country');
        $this->phone_code = new FormElement('phone_code');
        $this->flag = new FormElement('flag');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->country->maxlength = -1;
        $this->phone_code->maxlength = 8;
        $this->flag->maxlength = -1;
    }
}
