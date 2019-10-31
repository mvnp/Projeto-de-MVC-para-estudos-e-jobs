<?php 
namespace Controllers;

class Dashboard extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		\Utils\Auth::handleLogin();
		$this->view->js = array('dashboard/js/default.js');
	}

	public function index()
	{
		$this->view->title = "Dashboard | MVC System";
		$this->view->render("dashboard/index");
	}

	public function xhrInsert()
	{
		$this->model->xhrInsert();
	}

	public function xhrGetListings()
	{
		$this->model->xhrGetListings();
	}

	public function xhrDeleteListing()
	{
		$this->model->xhrDeleteListing();
	}

	public function logout()
	{
		\App\Session::destroy();
		header("Location: ../login");
		exit();
	}
}