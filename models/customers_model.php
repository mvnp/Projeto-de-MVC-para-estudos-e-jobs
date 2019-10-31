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
}