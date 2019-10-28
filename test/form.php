<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../config.php';
require '../core/Form.php';
require '../core/Form/Val.php';
require '../core/Database.php';

if(isset($_REQUEST['run']))
{
	try {

		$form = new Form();
		$form 	->post('name')->val('minlength', 2)
	 			->post('age')->val('minlength', 2)->val('digit')
	 			->post('gender')->val('required');

	 	$form 	->submit();

	 	echo "The form passed!";

	 	$data = $form->fetch();
	 	echo "<pre>";
	 		print_r($form);
	 	echo "</pre>";

	 	$db = new Database(DB_HOST, DB_BASE, DB_USER, DB_PASS);
	 	$db->insert("person", $data);

	} catch (Exception $e) {
		
		echo $e->getMessage();
	}
}

?>

<form action="?run" method="POST">
	Name <input type="text" name="name" />
	Age <input type="text" name="age" />
	Gender <select name="gender">
		<option value="">Selecione ..</option>
		<option value="male">Male</option>
		<option value="female">Female</option>
		<input type="submit" value="Cadastrar">
	</select>
</form>