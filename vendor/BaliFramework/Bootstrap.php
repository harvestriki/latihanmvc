<?php

/**
 * Bali Framework, Indonesian Hand Made Framework
 */
define('MAIN_APP_DIRECTORY', 'AppBundle');
define('MAIN_FRAMEWORK_DIRECTORY', 'BaliFramework');
define('APPLICATION_PATH', realpath(dirname(__DIR__) . '/..'));

class Bootstrap {

    private $controllerClass;
    private $controllerAction;
    private $raw_url;

    // call for the first
    function __construct() {
        $this->raw_url = isset($_GET['r']) ? $_GET['r'] : '';
        $route = explode('/', $this->raw_url);

        if (count($route) < 2) {
            $this->controllerClass = $route[0];
            $this->controllerAction = 'index';
        } else {
            $this->controllerClass = $route[0];
            $this->controllerAction = $route[1];
        }
    }

    function run() {

        $clazz = $this->controllerClass;
        $this->controllerClass = empty($clazz) ? 'site' : $clazz;

        $controller = ucfirst($this->controllerClass) . 'Controller';
        $action = ucfirst($this->controllerAction) . 'Action';

        $controllerFile = APPLICATION_PATH . '/' . MAIN_APP_DIRECTORY . '/controllers/' . $controller . '.php';

        // cek berkas ada atau tidak
        if (file_exists($controllerFile)) {
            require_once "$controllerFile";
            $objectClass = new $controller();
            method_exists($objectClass, $action) ? $objectClass->$action() : die('500: Action not found');
        } else {
            die("404: CONTROLLER NOT FOUND");
        }
    }

}

?>