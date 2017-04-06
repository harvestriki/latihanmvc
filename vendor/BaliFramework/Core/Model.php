<?php

/**
 *
 */
require_once 'Database.php';

class Model {

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

    public function load($post) {
        $labels = $this->labels();
        foreach ($labels as $attribute => $label) {
            if (isset($post[$attribute])) {
                if (!empty($post[$attribute])) {
                    $this->$attribute = $post[$attribute];
                }
            }
        }
    }

    public function validate() {
        $rules = $this->rules();
        foreach ($rules as $rule) {
            $attribute = $rule[0];
            $rule_item = $rule[1];
            foreach ($rule[0] as $attribute) {
                switch ($rule_item) {
                    case 'required':
                        if (!isset($this->$attribute)) {
                            return false;
                        }
                        break;
                }
            }
        }
        return true;
    }

    public function save($validate = true) {
        if ($validate)
            if (!$this->validate())
                return false;

        $labels = $this->labels();
        $columns = '';
        $values = '';
        foreach ($labels as $attribute => $label) {
            if (isset($this->$attribute)) {
                $columns .= $columns ? ",$attribute" : $attribute;
                $value = $this->$attribute;
                $values .= $values ? ",'$value'" : "'$value'";
            }
        }

        $sql = "INSERT INTO " . $this->table() . " ($columns) values ($values)";
        $db = new Database();
        $db->query($sql);
    }

    public function findOne($conditions) {

        $condition = '';
        foreach ($conditions as $column => $value) {
            if (isset($column)) {
                $criteria = "$column='$value'";
                $condition .= $condition ? " AND " . "$criteria" : "$criteria";
            }
        }

        $sql = "SELECT * FROM " . $this->table() . " WHERE $condition";
        $db = new Database();
        $result = $db->lookup($sql);
        $this->load($result);
    }

}

?>
