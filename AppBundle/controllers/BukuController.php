<?php
/**
 * Description of BukuController
 *
 * @author Riki
 */
require_once 'vendor/BaliFramework/Core/Controller.php';

class BukuController extends Controller{
    
    public function indexAction() {
        
         return $this->render('index');
    }
}
