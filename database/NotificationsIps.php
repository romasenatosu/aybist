<?php

require_once __DIR__ . '/FormElement.php';

class NotificationsIps {
    public FormElement $id;
    public FormElement $user_id;
    public FormElement $ipv4;
    public FormElement $ipv6;
    public FormElement $created_at;
    public FormElement $updated_at;

    function __construct() {
        $this->id = new FormElement('id');
        $this->user_id = new FormElement('user_id');
        $this->ipv4 = new FormElement('ipv4');
        $this->ipv6 = new FormElement('ipv6');
        $this->created_at = new FormElement('created_at', new DateTime());
        $this->updated_at = new FormElement('updated_at', new DateTime());
    }
}
