<?php

require_once __DIR__ . '/FormElement.php';

class Flats {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $flat;
    public FormElement $square_meter;
    public FormElement $fee;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->flat = new FormElement('flat');
        $this->square_meter = new FormElement('square_meter');
        $this->fee = new FormElement('fee');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->flat->maxlength = -1;
        $this->square_meter->maxlength = 32767;
    }
}
