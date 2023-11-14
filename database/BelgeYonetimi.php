<?php

require_once __DIR__ . '/FormElement.php';

class BelgeYonetimi {
    public FormElement $id;
    public FormElement $title;
    public FormElement $file;
    public FormElement $description;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->title = new FormElement('title');
        $this->file = new FormElement('file');
        $this->description = new FormElement('description');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
