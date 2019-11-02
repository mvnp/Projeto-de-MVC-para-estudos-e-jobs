<?php
namespace Controllers;

class Customers extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		# Auth::handleLogin();
		$this->view->js = array('customers/js/default.js');
		$this->view->css = array('customers/css/default.css');
	}

	/**
	 * [add description]
	 */
	public function add()
	{
		$novaUrl = (($_SERVER['REQUEST_METHOD'] === 'POST') ? $_POST['url'] : "");
		
		\App\Session::set("url", $novaUrl);

		$this->view->count = count($this->model->getList());
		$this->view->email = $this->generateRandomString();
		$this->view->business = \Controllers\scrapash::init($novaUrl);
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
	public function edit($id)
	{
		$this->view->count = count($this->model->getList());
		$this->view->catList = $this->model->catList();
		$this->view->cstmer = $this->model->getCliente($id);
		$this->view->title = "Editar Cliente | MVC System";

		$this->view->render("customers/edit", false, true);
	}

	/**
	 * [add_ description]
	 */
	public function edit_()
	{
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		$customer = array_filter($_POST['form']);
		# echo json_encode($customer);
		if($this->model->update($customer) === true):
			echo json_encode(true);
			return;
		endif;
	}

	public function getEmail()
	{
		$email = trim($_POST['email']);
		if($this->model->getEmail($email) === 1):
			echo json_encode(true);
			return;
		else:
			echo json_encode(false);
			return;
		endif;
	}

	public function getTelefone()
	{
		$telefone = trim($_POST['telefone']);
		if($this->model->getTelefone($telefone) === 1):
			echo json_encode(true);
			return;
		else:
			echo json_encode(false);
			return;
		endif;
	}

	public function getWhatsapp()
	{
		$whatsapp = trim($_POST['whatsapp']);
		if($this->model->getWhatsapp($whatsapp) === 1):
			echo json_encode(true);
			return;
		else:
			echo json_encode(false);
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

	/**
	 * [generateRandomString description]
	 * @param  integer $length [description]
	 * @return [type] [description]
	 */
	private function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return strtolower($randomString);
	}	
}