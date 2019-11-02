<?php
namespace Models;

class Customers_Model extends \App\Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Edit specific user from DB
	 * @return [type] [description]
	 */
	public function create($customer)
	{
		$cliente = [];
		foreach ($customer as $indice => $values)
		{
			$index = trim($customer[$indice]['name']);
			$valor = trim($customer[$indice]['value']);
			$cliente[$index] = $valor;
		}

		array_filter($cliente);
		return $create = $this->db->insert('palhoca', $cliente);
	}

	/**
	 * Carregando categorias para alimentar banco de dados
	 * @return [type] [description]
	 */
	public function catList()
	{
		return $stmt = $this->db->select("SELECT * FROM categorias ORDER BY categoria ASC");
	}

	/**
	 * Carregando categorias para alimentar banco de dados
	 * @return [type] [description]
	 */
	public function getList()
	{
		return $stmt = $this->db->select("SELECT * FROM palhoca ORDER BY id DESC");
	}

	/**
	 * Carregando categorias para alimentar banco de dados
	 * @return [type] [description]
	 */
	public function getCliente($id)
	{
		return $stmt = $this->db->selectOne("SELECT * FROM palhoca WHERE id = '$id' ORDER BY id DESC");
	}

	/**
	 * Carregando categorias para alimentar banco de dados
	 * @return [type] [description]
	 */
	public function getEmail($email)
	{
		return $stmt = $this->db->selectCount("SELECT * FROM palhoca WHERE email = '$email'");
	}

	/**
	 * Carregando categorias para alimentar banco de dados
	 * @return [type] [description]
	 */
	public function getTelefone($telefone)
	{
		return $stmt = $this->db->selectCount("SELECT * FROM palhoca WHERE telefone = '$telefone'");
	}

	/**
	 * Carregando categorias para alimentar banco de dados
	 * @return [type] [description]
	 */
	public function getWhatsapp($whatsapp)
	{
		return $stmt = $this->db->selectCount("SELECT * FROM palhoca WHERE whatsapp = '$whatsapp'");
	}			

	/**
	 * Edit specific user from DB
	 * @return [type] [description]
	 */
	public function update($customer)
	{
		$postData = [];
		foreach ($customer as $indice => $values):
			$index = trim($customer[$indice]['name']);
			$valor = trim($customer[$indice]['value']);
			$postData[$index] = $valor;
		endforeach;

		return $stmt = $this->db->update('palhoca', $postData, "id = {$postData['id']}");
	}
}