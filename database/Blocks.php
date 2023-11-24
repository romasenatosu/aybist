<?php

class Blocks {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $block;
    public FormElement $description;
    public FormElement $floor_count;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $regex_alpha_numeric, $regex_numeric, $lang;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->block = new FormElement('block');
        $this->description = new FormElement('description');
        $this->floor_count = new FormElement('floor_count');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->block->maxlength = -1;
        $this->block->pattern = $regex_alpha_numeric;
        $this->block->pattern_msg = $lang['regex_alpha_numeric'];
        $this->block->help_msg = $lang['help_block'];
        $this->description->maxlength = -1;
        $this->description->required = false;
        $this->description->pattern = $regex_alpha_numeric;
        $this->description->pattern_msg = $lang['regex_alpha_numeric'];
        $this->floor_count->maxlength = 32767;
        $this->floor_count->pattern = $regex_numeric;
        $this->floor_count->pattern_msg = $lang['regex_numeric'];
    }
}
