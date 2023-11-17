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

    // think about non string fields

    public function get_text_attr(): string {
        return sprintf("id = '%s' name = '%s' %s minlength='%d' maxlength='%d' pattern='%s' value='%s'", $this->name,
                        $this->name, (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength,
                        $this->pattern, $this->getValue());
    }

    public function get_number_attr(): string {
        return sprintf("id = '%s' name = '%s' %s min='%d' max='%d' value='%s'", $this->name, $this->name,
                        (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength,
                        $this->getValue());
    }

    public function get_check_attr(): string {
        return sprintf("id = '%s' name = '%s' %s %s", $this->name, $this->name,
                        (($this->required) ? 'required=required': ''), (($this->value > 0) ? 'checked=checked': ''));
    }

    public function check(): bool {
        // make encoded buffer
        $buff = json_encode($this->value);

        // check for required field
        if (empty($buff) and $this->required) {
            $this->error_msg = "Bu alan doldurulmak zorundadır.";
            return false;
        }

        // check for length of the value
        if (strlen($buff) > $this->maxlength or strlen($buff) < $this->minlength) {
            $this->error_msg = sprintf("Bu alan %d ile %d arasında olmalıdır.", $this->minlength, $this->maxlength);
            return false;
        }

        // check for regex
        if (!empty($this->pattern)) {
            try {
                if (!preg_match($this->pattern, $buff)) {
                    return false;
                }

            } catch (Exception $e) {
                $this->error_msg = "Geçersiz 'Düzenli ifade' satırı!";
                return false;
            }
        }

        return true;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getValue(): mixed {
        if ($this->value) {
            if (is_string($this->value)) {
                return $this->value;
            } else {
                return json_encode($this->value);
            }
        }

        return null;
    }

    public function setValue(mixed $value): void {
        $this->value = $value;
    }

    public function getRequired(): bool {
        return $this->required;
    }

    public function setRequired(bool $required): void {
        $this->required = $required;
    }

    public function getMinlength(): int {
        return $this->minlength;
    }

    public function setMinlength(int $minlength): void {
        $this->minlength = $minlength;
    }

    public function getMaxlength(): int {
        return $this->maxlength;
    }

    public function setMaxlength(string $maxlength): void {
        $this->maxlength = $maxlength;
    }

    public function getPattern(): string {
        return $this->pattern;
    }

    public function setPattern(string $pattern): void {
        $this->pattern = $pattern;
    }

    public function getErrorMsg(): string {
        return $this->error_msg;
    }

    public function setErrorMsg(string $error_msg): void {
        $this->error_msg = $error_msg;
    }

    public function getHelpMsg(): string {
        return $this->help_msg;
    }

    public function setHelpMsg(string $help_msg): void {
        $this->help_msg = $help_msg;
    }
}
