<?php

class SettingsVat {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $name;
    public FormElement $rate;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha_numeric, $regex_numeric;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->name = new FormElement('name');
        $this->rate = new FormElement('rate');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->name->maxlength = -1;
        $this->name->pattern = $regex_alpha_numeric;
        $this->name->pattern_msg = $lang['regex_alpha_numeric'];
        $this->rate->maxlength = 127;
        $this->rate->pattern = $regex_numeric;
        $this->rate->pattern_msg = $lang['regex_numeric'];
    }
}
