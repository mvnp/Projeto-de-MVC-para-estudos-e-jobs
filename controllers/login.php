<?php
namespace Controllers;

class Login extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->title = "Login to MVC | MVC System";
		$this->view->render("login/index");
	}

	public function run()
	{
		$this->model->run();
	}
}