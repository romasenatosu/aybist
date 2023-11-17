<?php

require_once __DIR__ . '/FormElement.php';

class Test {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $keyword;
    public FormElement $value;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->keyword = new FormElement('keyword');
        $this->value = new FormElement('value');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->keyword->maxlength = 128;
        $this->value->maxlength = -1;
    }
}
