<?php 

class View
{
	public function __construct(){}

	public function render($name, $noInclude = false)
	{
		if($noInclude == true){
			require 'views/' . $name . '.php';
		} else {
	 		require 'views/header.php';
				require 'views/' . $name . '.php';
			require 'views/footer.php';
		}
	}

/**
 * Another render views type/mode
 * @return $this->view->renderAdv('header')
 *    @return $this->view->renderAdv('homepage')
 * @return $this->view->renderAdv('fotter')
 */
	public function renderAdv($name, $noInclude = false)
	{
		require 'views/' . $name . '.php';
	}
}