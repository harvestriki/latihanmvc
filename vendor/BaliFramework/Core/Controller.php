<?php

/**
*
*/
class Controller
{
	private $_viewPath;
	private $_layoutPath;
	private $_layout;

	function __construct()
	{
		$this->_layout = 'main';
		$this->_layoutPath = APPLICATION_PATH.'/'.MAIN_APP_DIRECTORY.'/layouts';
		$this->_viewPath = APPLICATION_PATH.'/'.MAIN_APP_DIRECTORY.'/views';
	}

	public function render($view_name, $data = NULL){

                // ini untuk data
		if(is_array($data)){

			foreach ($data as $key => $value){
				$$key = $value;
			}
		}

		$viewFile = $view_name.'.php';

		$layout = $this->_layoutPath.'/'.$this->_layout.'.php';
		$controller = strtolower(str_replace('Controller', '', get_class($this)));
		$view = $this->_viewPath.'/'.$controller.'/'.$viewFile;
                
		ob_start();
		include($view);
		$content = ob_get_contents();
		ob_clean();
		include($layout);
		$out = ob_get_clean();
		echo $out;

	}

	public function layout($layout){
		$this->_layout = $layout;
	}
}

 ?>