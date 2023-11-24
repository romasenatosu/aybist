<?php

class Floors {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $floor;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha_numeric;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->floor = new FormElement('floor');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        
        // configurations
        $this->floor->maxlength = -1;
        $this->floor->pattern = $regex_alpha_numeric;
        $this->floor->pattern_msg = $lang['regex_alpha_numeric'];
    }
}
