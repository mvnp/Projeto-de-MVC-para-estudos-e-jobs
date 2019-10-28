<?php 

class Adminlte extends Controller
{
	public function __construct()
	{
		parent::__construct();
		Auth::handleLogin();
		$this->view->js = array('adminlte/js/default.js');
	}

	public function index()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/index", false, true);
	}

	public function form1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/form1", false, true);
	}

	public function form2()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/form2", false, true);
	}

	public function form3()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/form3", false, true);
	}

	public function tabela1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/tabela1", false, true);
	}

	public function dash1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/dash1", false, true);
	}

	public function dash2()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/dash2", false, true);
	}

	public function mailbox()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/mailbox", false, true);
	}

	public function mailcompose()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/mailcompose", false, true);
	}

	public function readmail()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/readmail", false, true);
	}

	public function login()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/login", false, true);
	}

	public function register()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/register", false, true);
	}

	public function widgets()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/widgets", false, true);
	}

	public function blank()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/blank", false, true);
	}

	public function chartjs()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/chartjs", false, true);
	}
}