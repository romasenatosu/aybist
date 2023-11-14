<?php

class FormElement {
    public string $name;
    public mixed $value;
    public bool $required;
    public int $minlength;
    public int $maxlength;
    public string $pattern;
    public string $error_msg;
    public string $help_msg;

    public function __construct(string $name, mixed $value = null, bool $required = true,
                                int $minlength = 3, int $maxlength = 255, string $pattern = '',
                                string $error_msg = '', string $help_msg = '') {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->minlength = $minlength;
        $this->maxlength = $maxlength;
        $this->pattern = $pattern;
        $this->error_msg = $error_msg;
        $this->help_msg = $help_msg;
    }
}
