<?php

/**
* Site Controller
*/
require_once 'vendor/BaliFramework/Core/Controller.php';

class SiteController extends Controller
{
	public function indexAction(){

		return $this->render('index', ['name' => 'ujang kangen hayati']);
	}
}

 ?>