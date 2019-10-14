<?php 

/**
 * Class User_Model
 */
class Note_Model extends Model
{	
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * List all users from DB
	 * @return [type] [description]
	 */
	public function noteList()
	{
		return $stmt = $this->db->select("SELECT * FROM notes WHERE userid = :userid", 
			array('userid' => $_SESSION['userid']));
	}

	public function getNote($id)
	{
		return $stmt = $this->db->select("SELECT * FROM notes WHERE userid = :userid AND id = :id",
		array(
			'userid' => $_SESSION['userid'],
			'id' => $id,
		)); 
	}	

	/**
	 * Edit specific user from DB
	 * @return [type] [description]
	 */
	public function create($data)
	{
		$stmt = $this->db->insert('notes', array(
			'title' => $data['title'],
			'content' => $data['content'],
			'create_at' => $data['create_at'],
			'userid' => $data['userid']
		));
	}	

	/**
	 * Edit specific user from DB
	 * @return [type] [description]
	 */
	public function editSave($data)
	{
		$postData = array(
			'title' => $_POST['title'],
			'content' => $_POST['content']
		);

		$stmt = $this->db->update('notes', $postData, "id = {$data['id']}");
	}

	/**
	 * Delete specific user from DB
	 * @return [type] [description]
	 */	
	public function delete($id)
	{
		$result = $this->db->select("SELECT * FROM notes WHERE id = :id", ['id' => $id]);
		$stmt = $this->db->delete("notes", "id = '$id'");
		return $stmt;
	}

	/**
	 * Can Edit note
	 * @param string $value [description]
	 */
	public function canEdit($noteid, $userid)
	{
		$result = $this->db->select("SELECT * FROM notes WHERE id = :id AND userid = :userid", array(
			'id' => $noteid,
			'userid' => $userid
		));

		return count($result);
	}
}