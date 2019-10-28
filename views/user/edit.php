<h1>Users</h1>

<form data-guarda="<?php $u = $this->fullUser[0]; ?>" action="<?php echo URL .'user/editSave/'. $u['id']; ?>" method="post" autocomplete="off">
	<h2>Edit a user</h2>
	<table class="login registerUser" border="0">
		<tr>
			<td><label for="username">Username</label></td>
			<td><input type="text" name="username" value="<?php echo ((isset($u['login'])) ? trim($u['login']) : "") ?>" required /></td>
		</tr>
		<tr>
			<td><label for="">Role</label></td>
			<td>
				<select name="role" id="role" required>
					<option value="">Selecione</option>
					<option value="admin" <?php echo ((isset($u['role']) and $u['role'] == "admin") ? "selected": "") ?>>admin</option>
					<option value="default" <?php echo ((isset($u['role']) and $u['role'] == "default") ? "selected": "") ?>>default</option>
					<option value="owner" <?php echo ((isset($u['role']) and $u['role'] == "owner") ? "selected": "") ?>>owner</option>
				</select>
			</td>
		</tr>	
		<tr>
			<td colspna="2">
				<input type="hidden" name="user" value="<?php echo $u['id']; ?>" required />
				<input type="submit" value="Atualizar" />
			</td>
		</tr>	
	</table>
</form>