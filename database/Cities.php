<?php

require_once __DIR__ . '/FormElement.php';

class Cities {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $country_id;
    public FormElement $city;
    public FormElement $zip_code;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $regex_alpha_numeric, $regex_numeric, $lang;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->country_id = new FormElement('country_id');
        $this->city = new FormElement('city');
        $this->zip_code = new FormElement('zip_code');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->city->maxlength = -1;
        $this->city->pattern = $regex_alpha_numeric;
        $this->city->pattern_msg = $lang['regex_alpha_numeric'];
        $this->zip_code->maxlength = 6;
        $this->zip_code->pattern = $regex_numeric;
        $this->zip_code->pattern_msg = $lang['regex_numeric'];
        $this->zip_code->help_msg = $lang['help_zip_code'];
    }
}
