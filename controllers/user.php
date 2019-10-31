<?php 
namespace Controllers;

class User extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		\Utils\Auth::handleLogin();
		$this->view->js = array('user/js/default.js');
	}

	public function index()
	{
		$this->view->title = "Users | MVC System";
		$this->view->userList = $this->model->userList();
		$this->view->render("user/index");
	}

	public function create()
	{
		$data = array();
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];

		// @TODO: Do your error checking! After
		$this->model->create($data);
		header("Location: " . URL . "user");
	}

	public function edit($id)
	{
		if(!isset($id) or is_null($id)) header("Location: " . URL . "user");

		$this->view->title = "User Edit | MVC System";
		$this->view->fullUser = $this->model->getUser($id); 
		$this->view->render("user/edit");
	}

	public function editSave($id)
	{
		if(!isset($id) or is_null($id)) header("Location: " . URL . "user");	

		$data = array();
		$data['id'] = $_POST['user'];
		$data['login'] = $_POST['username'];
		$data['role'] = $_POST['role'];

		// @TODO: Do your error checking! After
		$this->model->editSave($data);
		header("Location: " . URL . "user");		
	}

	public function changepassword()
	{
		$data = array();
		$data['user'] = $_POST['user'];
		$data['password'] = $_POST['password'];

		// @TODO: Do your error checking! After
		$this->model->changepassword($data);
		header("Location: " . URL . "user");
	}

	public function delete($id)
	{
		if(!isset($id) or is_null($id)) return false;

		// @TODO: Do your error checking! After
		$this->model->delete($id);
		header("Location: " . URL . "user");
	}
}