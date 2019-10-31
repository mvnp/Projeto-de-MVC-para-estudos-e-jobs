<?php 
namespace Controllers;

class Note extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		\Utils\Auth::handleLogin();
		$this->view->js = array('notes/js/default.js');
	}

	public function index()
	{
		$this->view->title = "Notes | MVC System";
		$this->view->noteList = $this->model->noteList();
		$this->view->render("notes/index");
	}

	public function create()
	{
		$data = array();
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['create_at'] = date("Y-m-d H:i:s");
		$data['userid'] = ((isset($_SESSION['userid'])) ? $_SESSION['userid'] : NULL);

		// @TODO: Do your error checking! After
		$this->view->title = "New Note | MVC System";// 
		$this->model->create($data);
		header("Location: " . URL . "note");
	}

	public function edit($id)
	{
		if(!isset($id) or is_null($id)) 
			header("Location: " . URL . "note");

		if($this->model->canEdit($id, $_SESSION['userid']) !== 1)
			header("Location: " . URL . "note");
		
		$this->view->title = "Edit Note | MVC System";
		$this->view->fullNote = $this->model->getNote($id);
		$this->view->render("notes/edit");
	}

	public function editSave($id)
	{
		if(!isset($id) or is_null($id)) header("Location: " . URL . "note");

		$data = array();
		$data['id'] = $id;
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['userid'] = $_POST['userid'];

		// @TODO: Do your error checking! After
		$this->model->editSave($data);
		header("Location: " . URL . "note");		
	}

	public function delete($id)
	{
		if(!isset($id) OR is_null($id)){
			header("Location: " . URL . "note");
			return false;
		}

		if($this->model->canEdit($id, $_SESSION['userid']) === 1){
			$this->model->delete($id);
			header("Location: " . URL . "note");
			return false;
		}
		else
		{
			header("Location: " . URL . "note");
		}
	}
}