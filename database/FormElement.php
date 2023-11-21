<?php

class FormElement {
    public string $name;
    public mixed $value;
    public bool $required;
    public int $minlength;
    public int $maxlength;
    public string $accept;
    public string $pattern;
    public string $pattern_msg;
    public string $error_msg;
    public string $help_msg;

    public function __construct(string $name, mixed $value = null, bool $required = true,
                                int $minlength = 0, int $maxlength = 255, string $accept='', string $pattern = '',
                                string $pattern_msg = '', string $error_msg = '', string $help_msg = '') {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->minlength = $minlength;
        $this->maxlength = $maxlength;
        $this->accept = $accept;
        $this->pattern = $pattern;
        $this->pattern_msg = $pattern_msg;
        $this->error_msg = $error_msg;
        $this->help_msg = $help_msg;
    }

    // think about non string fields

    public function get_text_attr(): string {
        return sprintf("id = '%s' name = '%s' %s minlength='%d' maxlength='%d' pattern='%s' value='%s'", $this->name,
                        $this->name, (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength,
                        $this->pattern, $this->getValue());
    }

    public function get_textarea_attr(): string {
        return sprintf("id = '%s' name = '%s' %s minlength='%d' maxlength='%d' pattern='%s'", $this->name,
                        $this->name, (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength,
                        $this->pattern);
    }

    public function get_number_attr(): string {
        return sprintf("id = '%s' name = '%s' %s min='%d' max='%d' minlength='%d' maxlength='%d' value='%s'", $this->name, $this->name,
                        (($this->required) ? 'required=required': ''), $this->minlength, $this->maxlength, $this->minlength, $this->maxlength,
                        $this->getValue());
    }

    public function get_check_attr(): string {
        return sprintf("id = '%s' name = '%s' %s %s", $this->name, $this->name,
                        (($this->required) ? 'required=required': ''), (($this->value > 0) ? 'checked=checked': ''));
    }

    public function get_select_attr(): string {
        return sprintf("id = '%s' name = '%s' %s", $this->name, $this->name, (($this->required) ? 'required=required': ''));
    }

    public function get_file_attr(): string {
        return sprintf("id = '%s' name = '%s' accept = '%s' %s", $this->name, $this->name, $this->accept, (($this->required) ? 'required=required': ''));
    }

    public function check(): bool {
        global $lang;

        // make encoded buffer
        $buff = htmlspecialchars($this->value);

        // check for required field
        if (empty($buff) and $this->required) {
            $this->error_msg = $lang['regex_required'];
            return false;
        }

        // check for length of the value
        if ($this->patttern == $regex_numeric and filter_var($buff, FILTER_VALIDATE_INT)) {
            if ($buff > $this->maxlength or $buff < $this->minlength) {
                $this->error_msg = sprintf($lang['regex_length'], $this->minlength, $this->maxlength);
                return false;
            }
        }

        else {
            if (strlen($buff) > $this->maxlength or strlen($buff) < $this->minlength) {
                $this->error_msg = sprintf($lang['regex_length'], $this->minlength, $this->maxlength);
                return false;
            }
        }

        // check for regex
        if (!empty($this->pattern)) {
            try {
                if (!preg_match($this->pattern, $buff)) {
                    if (empty($this->pattern_msg)) {
                        $this->error_msg = $lang['regex_invalid_value'];
                    } else {
                        $this->$error_msg = $this->pattern_msg;
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
        global $locale, $pdo;
        $sql = "";
        $placholder_option = sprintf("<option %s value='0'>%s</option>", ($this->value) ? '' : 'selected', $placeholder);
        $options = [
            $placholder_option,
        ];

        $language_id = getLocaleId($locale);

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
                $sql = "SELECT id as option_id, phone_code as option_text FROM countries WHERE language_id = :language_id";
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
