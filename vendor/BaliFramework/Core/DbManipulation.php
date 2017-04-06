<?php

/**
 *
 * @author Riki
 */
define('OWN_DB_HOST', 'localhost');
define('OWN_DB_NAME', 'perpus_project_db');
define('OWN_DB_USERNAME', 'root');
define('OWN_DB_PASSWORD', 'mysql');

interface DbManipulation {

    public function query($sql);

    public function lookup($sql);

    public function command($sql);
}
