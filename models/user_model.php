<?php 

/**
 * Class User_Model
 */
class User_Model extends Model
{	
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * List all users from DB
	 * @return [type] [description]
	 */
	public function userList()
	{
		return $stmt = $this->db->select("SELECT * FROM users");
	}

	public function getUser($id)
	{
		return $stmt = $this->db->select("SELECT * FROM users WHERE id = :id", ['id' => $id]); 
	}	

	/**
	 * Edit specific user from DB
	 * @return [type] [description]
	 */
	public function create($data)
	{
		$stmt = $this->db->insert('users', array(
			'login' => $data['username'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		));
	}	

	/**
	 * Edit specific user from DB
	 * @return [type] [description]
	 */
	public function editSave($data)
	{
		$postData = array(
			'login' => $data['login'],
			'role' => $data['role']
		);

		$stmt = $this->db->update('users', $postData, "id = {$data['id']}");
	}	

	/**
	 * Delete specific user from DB
	 * @return [type] [description]
	 */	
	public function changepassword($data)
	{
		$stmt = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
		$stmt->execute(array(
			':id' => $data['user'],
			':password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
		));
		
		if($stmt->errorCode() === 0) return true;
		return false;
	}

	/**
	 * Delete specific user from DB
	 * @return [type] [description]
	 */	
	public function delete($id)
	{
		$result = $this->db->select("SELECT * FROM users WHERE id = :id", ['id' => $id]);

		if($result[0]['role'] == 'owner')
			return false;

		$stmt = $this->db->delete("users", "id = '$id'");
		return $stmt;
	}
}