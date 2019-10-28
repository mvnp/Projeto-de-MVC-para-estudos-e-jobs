<?php 

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$password = Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY);
		$stmt = $this->db->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
		$stmt->execute(array(
			':login' => ((isset($_POST['login'])) ? $_POST['login'] : ""),
			':password' => ((isset($_POST['password'])) ? $password : "")
		));

		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		### echo "<pre>"; print_r($data); exit;
		
		if($stmt->rowCount() == 1)
		{
			Session::init();
			Session::set("loggedIn", true);
			Session::set("userid", $data['id']);
			Session::set("role", $data['role']);
			header("Location: ../dashboard");
		} 
		else 
		{
			header("Location: ../login");
		}
	}
}