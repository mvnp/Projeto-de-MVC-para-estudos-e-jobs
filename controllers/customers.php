<?php
namespace Controllers;

class Customers extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		# Auth::handleLogin();
		$this->view->js = array('customers/js/default.js');
	}

	/**
	 * [add description]
	 */
	public function add()
	{
		$this->view->catList = $this->model->catList();
		$this->view->title = "Adicionar Cliente | MVC System";
		$this->view->render("customers/add", false, true);
	}

	/**
	 * [add_ description]
	 */
	public function add_()
	{
		$customer = array_filter($_POST['form']);
		if((int)$this->model->create($customer) === 1):
			echo json_encode(true);
			return;
		endif;
	}

	/**
	 * [add description]
	 */
	public function list()
	{
		$this->view->count = count($this->model->getList());
		$this->view->getList = $this->model->getList();
		$this->view->title = "Listar Clientes | MVC System";
		$this->view->render("customers/list", false, true);
	}
}