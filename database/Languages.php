<?php

require_once __DIR__ . '/FormElement.php';

class Languages {
    public FormElement $id;
    public FormElement $code;
    public FormElement $lang;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->code = new FormElement('code');
        $this->lang = new FormElement('lang');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->code->maxlength = 8;
        $this->lang->maxlength = 16;
    }
}
