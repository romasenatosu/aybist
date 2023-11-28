<?php

class Settings {
    public FormElement $id;
    public FormElement $language_id;
    public FormElement $company;
    public FormElement $slogan;
    public FormElement $description;
    public FormElement $keywords;
    public FormElement $site_title;
    public FormElement $site_url;
    public FormElement $smtp_url;
    public FormElement $smtp_password;
    public FormElement $smtp_port;
    public FormElement $normal_photo;
    public FormElement $normal_photo_width;
    public FormElement $normal_photo_height;
    public FormElement $top_photo;
    public FormElement $top_photo_width;
    public FormElement $top_photo_height;
    public FormElement $small_photo;
    public FormElement $small_photo_width;
    public FormElement $small_photo_height;
    public FormElement $maintenance_mode;
    public FormElement $maintenance_mode_content;
    public FormElement $debug_mode;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        global $lang, $regex_alpha_numeric, $regex_keywords, $regex_url, $photo_files_extensions;

        $this->id = new FormElement('id');
        $this->language_id = new FormElement('language_id');
        $this->company = new FormElement('company');
        $this->slogan = new FormElement('slogan');
        $this->description = new FormElement('description');
        $this->keywords = new FormElement('keywords');
        $this->site_title = new FormElement('site_title');
        $this->site_url = new FormElement('site_url');
        $this->smtp_url = new FormElement('smtp_url');
        $this->smtp_password = new FormElement('smtp_password');
        $this->smtp_port = new FormElement('smtp_port');
        $this->normal_photo = new FormElement('normal_photo');
        $this->normal_photo_width = new FormElement('normal_photo_width');
        $this->normal_photo_height = new FormElement('normal_photo_height');
        $this->top_photo = new FormElement('top_photo');
        $this->top_photo_width = new FormElement('top_photo_width');
        $this->top_photo_height = new FormElement('top_photo_height');
        $this->small_photo = new FormElement('small_photo');
        $this->small_photo_width = new FormElement('small_photo_width');
        $this->small_photo_height = new FormElement('small_photo_height');
        $this->debug_mode = new FormElement('debug_mode');
        $this->maintenance_mode = new FormElement('maintenance_mode');
        $this->maintenance_mode_content = new FormElement('maintenance_mode_content');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());

        // configurations
        $this->company->maxlength = -1;
        $this->company->pattern = $regex_alpha_numeric;
        $this->company->pattern_msg = $lang['regex_alpha_numeric'];

        $this->slogan->maxlength = -1;
        $this->slogan->pattern = $regex_alpha_numeric;
        $this->slogan->pattern_msg = $lang['regex_alpha_numeric'];
        $this->slogan->required = false;

        $this->description->type = "textarea";
        $this->description->maxlength = -1;
        $this->description->required = false;
        $this->description->pattern = $regex_alpha_numeric;
        $this->description->pattern_msg = $lang['regex_alpha_numeric'];

        $this->keywords->type = "textarea";
        $this->keywords->maxlength = -1;
        $this->keywords->required = false;
        $this->keywords->pattern = $regex_keywords;
        $this->keywords->pattern_msg = $lang['regex_keywords'];

        $this->site_title->maxlength = -1;
        $this->site_title->pattern = $regex_alpha_numeric;
        $this->site_title->pattern_msg = $lang['regex_alpha_numeric'];

        $this->site_url->type = "url";
        $this->site_url->maxlength = -1;
        $this->site_url->required = false;
        $this->site_url->pattern = $regex_url;
        $this->site_url->pattern_msg = $lang['regex_url'];

        $this->smtp_url->type = "url";
        $this->smtp_url->maxlength = -1;
        $this->smtp_url->required = false;
        $this->smtp_url->pattern = $regex_url;
        $this->smtp_url->pattern_msg = $lang['regex_url'];

        $this->smtp_password->type = "password";
        $this->smtp_password->maxlength = -1;
        $this->smtp_password->required = false;

        $this->smtp_port->type = "number";
        $this->smtp_port->maxlength = 32767;
        $this->smtp_port->required = false;

        $this->normal_photo->maxlength = -1;
        $this->normal_photo->type = "file";
        $this->normal_photo->accept = $photo_files_extensions;
        $this->normal_photo->help_msg = sprintf($lang['help_photo_files'], $photo_files_extensions);

        $this->normal_photo_width->type = "number";
        $this->normal_photo_width->maxlength = 32767;

        $this->normal_photo_height->type = "number";
        $this->normal_photo_height->maxlength = 32767;

        $this->top_photo->type = "file";
        $this->top_photo->accept = $photo_files_extensions;
        $this->top_photo->help_msg = sprintf($lang['help_photo_files'], $photo_files_extensions);

        $this->top_photo_width->type = "number";
        $this->top_photo_width->maxlength = 32767;

        $this->top_photo_height->type = "number";
        $this->top_photo_height->maxlength = 32767;

        $this->small_photo->type = "file";
        $this->small_photo->accept = $photo_files_extensions;
        $this->small_photo->help_msg = sprintf($lang['help_photo_files'], $photo_files_extensions);

        $this->small_photo_width->type = "number";
        $this->small_photo_width->maxlength = 32767;

        $this->small_photo_height->type = "number";
        $this->small_photo_height->maxlength = 32767;

        $this->debug_mode->type = "checkbox";
        $this->debug_mode->required = false;

        $this->maintenance_mode->type = "checkbox";
        $this->maintenance_mode->required = false;

        $this->maintenance_mode_content->required = false;
        $this->maintenance_mode_content->type = "textarea";
        $this->maintenance_mode_content->maxlength = -1;

        $this->top_photo->required = false;
        $this->top_photo_width->required = false;
        $this->top_photo_height->required = false;

        $this->normal_photo->required = false;
        $this->normal_photo_width->required = false;
        $this->normal_photo_height->required = false;

        $this->small_photo->required = false;
        $this->small_photo_width->required = false;
        $this->small_photo_height->required = false;
    }
}
