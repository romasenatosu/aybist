<?php

require_once __DIR__ . '/FormElement.php';

class SettingsCurrency {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $name;
    public FormElement $symbol;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha_numeric;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->name = new FormElement('name');
        $this->symbol = new FormElement('symbol');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->name->maxlength = 32;
        $this->name->pattern = $regex_alpha_numeric;
        $this->name->pattern_msg = $lang['regex_alpha_numeric'];
        $this->symbol->maxlength = 8;
    }
}
