<?php

class Managements {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $block_id;
    public FormElement $floor_id;
    public FormElement $flat_id;
    public FormElement $manager_owner_id;
    public FormElement $manager_rental_id;
    public FormElement $management;
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
        $this->management = new FormElement('management');
        $this->description = new FormElement('description');
        $this->fee_status = new FormElement('fee_status');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->block_id->type = "select";
        $this->floor_id->type = "select";
        $this->flat_id->type = "select";
        $this->manager_owner_id->type = "select";
        $this->manager_rental_id->type = "select";
        $this->management->maxlength = -1;
        $this->management->pattern = $regex_alpha_numeric;
        $this->management->pattern_msg = $lang['regex_alpha_numeric'];
        $this->description->type = "textarea";
        $this->description->maxlength = -1;
        $this->description->pattern = $regex_alpha_numeric;
        $this->description->pattern_msg = $lang['regex_alpha_numeric'];
        $this->description->required = false;
        $this->fee_status->type = "checkbox";
        $this->fee_status->required = false;
    }
}
