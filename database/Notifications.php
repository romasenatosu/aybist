<?php

require_once __DIR__ . '/FormElement.php';

class Notifications {
    public FormElement $id;
    public FormElement $user_id;
    public FormElement $code;
    public FormElement $msg;
    public FormElement $trace;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->user_id = new FormElement('user_id');
        $this->code = new FormElement('code');
        $this->msg = new FormElement('msg');
        $this->trace = new FormElement('trace');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
    }
}
