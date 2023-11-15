<?php

require_once __DIR__ . '/FormElement.php';

class Test {
    public FormElement $id;
    public FormElement $title;
    public FormElement $column1;
    public FormElement $column2;
    public FormElement $column3;
    public FormElement $description;
    public FormElement $created_at;
    public FormElement $updated_at;
    public FormElement $deleted_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->title = new FormElement('title');
        $this->column1 = new FormElement('column1');
        $this->column2 = new FormElement('column2');
        $this->column3 = new FormElement('column3');
        $this->description = new FormElement('description');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
        $this->deleted_at = new FormElement('deleted_at');
    }
}
