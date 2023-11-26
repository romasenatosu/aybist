<?php

class Flats {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $flat;
    public FormElement $square_meter;
    public FormElement $fee;
    public FormElement $currency_id;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_flat, $regex_numeric;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->flat = new FormElement('flat');
        $this->square_meter = new FormElement('square_meter');
        $this->fee = new FormElement('fee');
        $this->currency_id = new FormElement('currency_id');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->flat->maxlength = -1;
        $this->flat->pattern = $regex_flat;
        $this->flat->pattern_msg = $lang['regex_flat'];
        $this->flat->help_msg = $lang['help_flat'];
        $this->square_meter->maxlength = 32767;
        $this->square_meter->pattern = $regex_numeric;
        $this->square_meter->pattern_msg = $lang['regex_numeric'];
        $this->square_meter->help_msg = $lang['help_square_meter'];
        $this->fee->maxlength = 2147483647;
        $this->fee->pattern = $regex_numeric;
        $this->fee->pattern_msg = $lang['regex_numeric'];
    }
}
