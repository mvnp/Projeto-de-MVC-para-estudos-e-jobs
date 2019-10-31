<?php
namespace Models;

class Dashboard_Model extends \App\Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function xhrInsert()
	{
		$text = ["text" => $_POST['text']];
		$data = $this->db->insert("data", $text);
		
		if($data == true)
			echo json_encode($text);
	}

	public function xhrGetListings()
	{
		$data = $this->db->select("SELECT * FROM data");
		echo json_encode($data);
	}

	public function xhrDeleteListing()
	{
		$id = $_POST['id'];
		$stmt = $this->db->delete("data", "id = '$id'");

		if($stmt == true)
			echo json_encode("Apagado com sucesso!");
	}
}