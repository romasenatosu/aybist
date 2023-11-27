<?php

class Districts {
    public FormElement $id;
    public FormElement $city_id;
    public FormElement $district;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $regex_alpha_numeric, $lang;

        $this->id = new FormElement('id');
        $this->city_id = new FormElement('city_id');
        $this->district = new FormElement('district');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->city_id->type = "select";
        $this->district->maxlength = -1;
        $this->district->pattern = $regex_alpha_numeric;
        $this->district->pattern_msg = $lang['regex_alpha_numeric'];
    }
}
