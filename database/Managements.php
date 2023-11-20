<?php

require_once __DIR__ . '/FormElement.php';

class Managements {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $block_id;
    public FormElement $floor_id;
    public FormElement $flat_id;
    public FormElement $manager_owner_id;
    public FormElement $manager_rental_id;
    public FormElement $name;
    public FormElement $description;
    public FormElement $fee_status;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha_numeric;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->block_id = new FormElement('block_id');
        $this->floor_id = new FormElement('floor_id');
        $this->flat_id = new FormElement('flat_id');
        $this->manager_owner_id = new FormElement('manager_owner_id');
        $this->manager_rental_id = new FormElement('manager_rental_id');
        $this->name = new FormElement('name');
        $this->description = new FormElement('description');
        $this->fee_status = new FormElement('fee_status');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->name->maxlength = -1;
        $this->name->pattern = $regex_alpha_numeric;
        $this->name->pattern_msg = $lang['regex_alpha_numeric'];
        $this->description->maxlength = -1;
        $this->description->pattern = $regex_alpha_numeric;
        $this->description->pattern_msg = $lang['regex_alpha_numeric'];
        $this->description->required = false;
        $this->fee_status->required = false;
    }
}
