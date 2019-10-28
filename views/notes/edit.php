<h1>Users</h1>

<form data-guarda="<?php $n = $this->fullNote[0]; ?>" action="<?php echo URL .'note/editSave/'. $n['id']; ?>" method="post" autocomplete="off">
	<h2>Edit a user</h2>
	<table class="login registerUser" border="0">
		<tr>
			<td><label for="title">Title</label></td>
			<td><input type="text" name="title" value="<?php echo $n['title'] ?>" required /></td>
		</tr>
		<tr>
			<td class="valign-bottom"><label for="content">Content</label></td>
			<td width="400">
				<textarea class="fullwidth" rows="10" name="content" required><?php echo $n['content'] ?></textarea>
			</td>
		</tr>
		<tr>
			<td colspna="2">
				<input type="hidden" name="userid" value="<?php echo $n['userid'] ?>" required />
				<input type="submit" value="Atualizar" />
			</td>
		</tr>	
	</table>
</form>