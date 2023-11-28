<?php

class Languages {
    public FormElement $id;
    public FormElement $code;
    public FormElement $lang;
    public FormElement $flag;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha, $regex_lang_code, $regex_url, $photo_files_extensions;

        $this->id = new FormElement('id');
        $this->code = new FormElement('code');
        $this->lang = new FormElement('lang');
        $this->flag = new FormElement('flag');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->code->maxlength = 8;
        $this->code->pattern = $regex_lang_code;
        $this->code->pattern_msg = $lang['regex_lang_code'];
        $this->code->help_msg = $lang['help_lang_code'];
        $this->lang->maxlength = 16;
        $this->lang->pattern = $regex_alpha;
        $this->lang->pattern_msg = $lang['regex_alpha'];
        $this->lang->help_msg = $lang['help_lang'];
        $this->flag->type = "file";
        $this->flag->maxlength = -1;
        $this->flag->accept = $photo_files_extensions;
        $this->flag->help_msg = sprintf($lang['help_photo_files'], $photo_files_extensions);
    }
}
