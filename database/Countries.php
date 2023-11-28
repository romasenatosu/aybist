<?php

class Countries {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $country;
    public FormElement $phone_code;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $regex_alpha_numeric, $lang;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->country = new FormElement('country');
        $this->phone_code = new FormElement('phone_code');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->country->maxlength = -1;
        $this->country->pattern = $regex_alpha_numeric;
        $this->country->pattern_msg = $lang['regex_alpha_numeric'];
        $this->phone_code->type = "number";
        $this->phone_code->maxlength = 32767;
        $this->phone_code->help_msg = $lang['help_phone_code'];
    }
}
