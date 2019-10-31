<?php 
namespace Controllers;

class Help extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->title = "Help | MVC System";
		$this->view->render("help/index");
	}
}