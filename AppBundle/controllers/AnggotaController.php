<?php

require_once "vendor/BaliFramework/Core/Controller.php";
require_once "AppBundle/models/Anggota.php";

/**
* Anggota Controller
*/
class AnggotaController extends Controller
{
	public function indexAction(){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $anggota = new Anggota();
		$anggota->load($_POST);   
		$anggota->save();
                
            }
            
            return $this->render('index');
	}
}

 ?>
