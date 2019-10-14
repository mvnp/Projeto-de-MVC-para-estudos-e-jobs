<h1>Users</h1>

<form action="<?php echo URL; ?>user/create" method="post" autocomplete="off">
	<h2>Register a user</h2>
	<table class="login registerUser" border="0">
		<tr>
			<td><label for="username">Username</label></td>
			<td><input type="text" name="username" autocomplete="off" required /></td>
		</tr>	
		<tr>
			<td><label for="password">Password</label></td>
			<td><input type="password" name="password" autocomplete="off" required /></td>
		</tr>	
		<tr>
			<td><label for="">Role</label></td>
			<td>
				<select name="role" id="role" required>
					<option value="">Selecione</option>
					<option value="admin">admin</option>
					<option value="default">default</option>
					<option value="owner">owner</option>
				</select>
			</td>
		</tr>	
		<tr>
			<td colspna="2">
				<input type="submit" value="Cadastrar" />
			</td>
		</tr>	
	</table>
</form>

<table border="1" class="login user" style="margin-bottom: 25px">
	<h2>Show users</h2>
	<thead>
		<td>ID</td>
		<td>Login</td>
		<td>Role</td>
		<td width="150">Edit</td>
		<td width="150">Delete</td>
		<td width="150">Change Password</td>
	</thead>
	<?php foreach ($this->userList as $index => $people): ?>
	<tr>
		<td><?php echo $people['id'] ?></td>
		<td><?php echo $people['login'] ?></td>
		<td><?php echo $people['role'] ?></td>
		<td><a href="<?php echo URL .'user/edit/'. $people['id']; ?>" rel="" class="edit">Edit</a></td>
		<td><a onclick='return confirm("Deseja realmente excluir este usuário?");' href="<?php echo URL .'user/delete/'. $people['id']; ?>" rel="" class="delete">Delete</a></td>
		<td><a href="" data-link="<?php echo URL .'user/changepassword/'. $people['id'] ?>" rel="<?php echo $people['id'] ?>" class="password chg">Change</a></td>
	</tr>
	<?php endforeach ?>
</table>