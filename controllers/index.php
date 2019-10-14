<?php 

class Index extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->title = "Home | MVC System";
		$this->view->render("index/index");
	}
}