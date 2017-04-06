<?php

/**
 * Description of Database
 *
 * @author Riki
 */
require_once 'DbManipulation.php';

class Database implements DbManipulation {

    private $conn;
    private $result;

    public function __construct() {

        $this->conn = new mysqli(OWN_DB_HOST, OWN_DB_USERNAME, OWN_DB_PASSWORD, OWN_DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }
    }

    public function command($sql) {
        if ($this->conn->query($sql) === TRUE) {
            return null;
        } else {
            return $this->conn->error;
        }
    }

    public function lookup($sql) {
        $sql = $sql . ' limit 1';
        $rst = $this->query($sql);

        if ($rst !== null) {
            return $rst->fetch_assoc();
        } else {
            return null;
        }
    }

    public function query($sql) {
       
        $this->result = $this->conn->query($sql);
        if ($this->result) {
            return $this->result;
        } else {
//            die($this->conn->error);
            return null;
        }
    }

}
