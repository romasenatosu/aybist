<?php

class FormElement {
    public string $name;
    public mixed $value;
    public string $type;
    public bool $required;
    public int $minlength;
    public int $maxlength;
    public string $accept;
    public string $pattern;
    public string $pattern_msg;
    public string $error_msg;
    public string $help_msg;
    private array $text_attributes = ["text", "email", "url", "search", "tel", "hidden", "password"];

    function __construct(string $name, mixed $value = null, string $type = "text", bool $required = true,
                                int $minlength = 0, int $maxlength = 255, string $accept='', string $pattern = '',
                                string $pattern_msg = '', string $error_msg = '', string $help_msg = '') {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
        $this->required = $required;
        $this->minlength = $minlength;
        $this->maxlength = $maxlength;
        $this->accept = $accept;
        $this->pattern = $pattern;
        $this->pattern_msg = $pattern_msg;
        $this->error_msg = $error_msg;
        $this->help_msg = $help_msg;
    }


    /**
     * returns needed html attributes for desired input type
     * 
     * @return string
     */
    public function get_attr(): string {
        if (in_array($this->type, $this->text_attributes)) {
            return sprintf("type = '%s' id = '%s' name = '%s' %s minlength='%d' maxlength='%d' value='%s'", $this->type, $this->name,
            $this->name, (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength,
            $this->getValue());
        }
        
        else if ($this->type == 'select') {
            return sprintf("id = '%s' name = '%s' %s", $this->name, $this->name, false/* (($this->required) ? 'required=required': '') */);
        }
        
        else if ($this->type == "textarea") {
            return sprintf("id = '%s' name = '%s' %s minlength='%d' maxlength='%d'", $this->name,
            $this->name, (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength);
        }
        
        else if ($this->type == "number") {
            return sprintf("type = '%s' id = '%s' name = '%s' %s min='%d' max='%d' value='%s'",
                    $this->type, $this->name, $this->name,
                    (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength,
                    $this->getValue());
        }
        
        else if ($this->type == "checkbox") {
            return sprintf("type = '%s' id = '%s' name = '%s' %s %s", $this->type, $this->name, $this->name,
                    (($this->required) ? 'required=required': ''), (($this->value > 0) ? 'checked=checked': ''));
        }
        
        else if ($this->type == "file") {
            return sprintf("type = '%s' id = '%s' name = '%s' accept = '%s'", $this->type, $this->name, $this->name, $this->accept);
        }

        else {
            return "";
        }
    }

    /**
     * Checks if pattern matches with value
     * 
     * @return bool
     */
    public function checkRegex(): bool {
        global $lang;

        if (!$this->required and empty($this->value)) {
            return true;
        }

        if (!empty($this->pattern)) {
            try {
                if (!preg_match($this->pattern, $this->value)) {
                    if (empty($this->pattern_msg)) {
                        $this->error_msg = $lang['regex_invalid_value'];
                    } else {
                        $this->error_msg = $this->pattern_msg;
                    }
                    
                    return false;
                }
                
            } catch (Exception $e) {
                $this->error_msg = $lang['regex_invalid_re'];
                return false;
            }
        }

        return true;
    }

    /**
     * checks if value is required
     * 
     * @return bool
     */
    public function checkRequired(): bool {
        global $lang;

        if (is_null($this->value) and $this->required) {
            $this->error_msg = $lang['regex_required'];
            return false;
        }

        return true;
    }

    /**
     * checks the length of the number
     * 
     * @return bool
     */
    public function checkCount(): bool {
        global $lang;

        $number = filter_var($this->value, FILTER_VALIDATE_INT);
        if (!$this->required and $number == 0) {
            return true;
        }

        if ($number > $this->maxlength or $number < $this->minlength) {
            $this->error_msg = sprintf($lang['regex_length'], $this->minlength, $this->maxlength);
            return false;
        }

        return true;
    }

    /**
     * checks the length of the value
     * 
     * @return bool
     */
    public function checkLength(): bool {
        global $lang;

        $number = filter_var($this->value, FILTER_VALIDATE_INT);
        if (!$this->required and $number == 0) {
            return true;
        }

        if ($this->maxlength == -1) {
            return true;
        }

        if (strlen($number) > $this->maxlength or strlen($number) < $this->minlength) {
            $this->error_msg = sprintf($lang['regex_length'], $this->minlength, $this->maxlength);
            return false;
        }

        return true;
    }

    /**
     * checks the value of select box
     * 
     * @return bool
     */
    public function checkSelect(): bool {
        global $lang;

        $number = filter_var($this->value, FILTER_VALIDATE_INT);

        if ($this->required and $number == 0) {
            $this->error_msg = $lang['regex_required'];
            return false;
        }

        return true;
    }

    public function check(): bool {
        // check for required field
        // check for length of the value
        // check for regex

        if ($this->type == 'file') {
            if (empty($this->value['tmp_name'])) {
                $this->value = null;
            }
        }

        if (empty($this->value)) {
            $this->value = null;
        }

        if ($this->checkRequired()) {
            if (in_array($this->type, $this->text_attributes) or $this->type == "file" or $this->type == "textarea") {
                if($this->checkLength()) {
                    return $this->checkRegex();
                }
            }

            else if ($this->type == 'select') {
                return $this->checkSelect();
            }

            else if ($this->type == "number") {
                return $this->checkCount();
            } 

            else {
                return true;
            }
        }

        return false;
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

    public function get_select_options(string $placeholder):mixed {
        global $locale, $pdo, $language_id;
        $sql = "";
        $placholder_option = sprintf("<option %s value=''>%s</option>", ($this->value) ? '' : 'selected', $placeholder);
        $options = [
            $placholder_option,
        ];

        switch ($this->name) {
            case 'block_id':
                $sql = "SELECT id as option_id, block as option_text FROM blocks WHERE language_id = :language_id";
                break;

            case 'flat_id':
                $sql = "SELECT id as option_id, flat as option_text FROM flats WHERE language_id = :language_id";
                break;

            case 'floor_id':
                $sql = "SELECT id as option_id, floor as option_text FROM floors WHERE language_id = :language_id";
                break;

            case 'manager_owner_id':
                $sql = "SELECT id as option_id, fullname as option_text FROM users";
                break;

            case 'manager_rental_id':
                $sql = "SELECT id as option_id, fullname as option_text FROM users";
                break;
            
            case 'currency_id':
                $sql = "SELECT id as option_id, name as option_text FROM settings_currency WHERE language_id = :language_id";
                break;

            case 'country_id':
                $sql = "SELECT id as option_id, country as option_text FROM countries WHERE language_id = :language_id";
                break;

            case 'city_id':
                $sql = "SELECT c.id as option_id, c.city as option_text 
                FROM cities c
                INNER JOIN countries co ON co.id = c.country_id
                WHERE co.language_id = :language_id";
                break;

            case ('phone_code_id' or 'cell_phone_code_id' or 'fax_code_id'):
                $sql = "SELECT id as option_id, CONCAT('+', phone_code) as option_text FROM countries WHERE language_id = :language_id";
                break;

            case 'district_id':
                $sql = "SELECT d.id as option_id, d.district as option_text 
                FROM districts d
                INNER JOIN cities c ON c.id = d.city_id
                INNER JOIN countries co ON co.id = c.country_id
                WHERE co.language_id = :language_id";
                break;
            
            default:
                return $options;
        }

        $stmt = $pdo->prepare($sql);
        if (str_contains($sql, 'language_id')) {
            $stmt->bindParam(':language_id', $language_id, PDO::PARAM_INT);
        }
        $stmt->execute();
        $options_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach ($options_data as $option_data) {
            $options[] = sprintf("<option %s value='%d'>%s</option>", 
                                    ($option_data['option_id'] == $this->value) ? 'selected' : '', $option_data['option_id'], $option_data['option_text']);
        }

        return $options;
    }
}
