<?php 

class Pesquisas extends Controller
{
	public function __construct()
	{
		parent::__construct();
		Auth::handleLogin();
		$this->view->js = array('pesquisas/js/default.js');
	}

	public function index()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/index", false, true);
	}

	public function form1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/form1", false, true);
	}

	public function form2()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/form2", false, true);
	}

	public function form3()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/form3", false, true);
	}

	public function tabela1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/tabela1", false, true);
	}

	public function dash1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/dash1", false, true);
	}

	public function dash2()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/dash2", false, true);
	}

	public function mailbox()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/mailbox", false, true);
	}

	public function mailcompose()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/mailcompose", false, true);
	}

	public function readmail()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/readmail", false, true);
	}

	public function login()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/login", false, true);
	}

	public function register()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/register", false, true);
	}

	public function widgets()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/widgets", false, true);
	}

	public function blank()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/blank", false, true);
	}

	public function chartjs()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("pesquisas/chartjs", false, true);
	}
}