<h1>Notes</h1>

<form action="<?php echo URL; ?>note/create" method="post" autocomplete="off">
	<h2>Register a note</h2>
	<table class="login registerUser" border="0">
		<tr>
			<td><label for="username">Title</label></td>
			<td><input type="text" name="title" autocomplete="off" required /></td>
		</tr>
		<tr>
			<td class="valign-bottom"><label for="username">Content</label></td>
			<td width="400"><textarea name="content" rows="10" class="fullwidth" autocomplete="off" required></textarea></td>
		</tr>
		<tr>
			<td colspna="2">
				<input type="submit" value="Cadastrar" />
			</td>
		</tr>	
	</table>
</form>

<table border="1" class="login user" style="margin-bottom: 25px">
	<h2>Show Notes</h2>
	<thead>
		<td>ID</td>
		<td>Title</td>
		<td>Content</td>
		<td>Create At</td>
		<td>Edit</td>
		<td>Delete</td>
	</thead>
	<?php foreach ($this->noteList as $index => $note): ?>
	<tr>
		<td><?php echo $note['id'] ?></td>
		<td width="250"><?php echo $note['title'] ?></td>
		<td width="400"><?php echo $note['content'] ?></td>
		<td><?php echo date("d/m/y H:i:s", strtotime($note['create_at'])) ?></td>
		<td><a href="<?php echo URL . 'note/edit/' . $note['id'] ?>">Edit</a></td>
		<td><a class="delete" href="<?php echo URL . 'note/delete/' . $note['id'] ?>">Delete</a></td>
	</tr>
	<?php endforeach ?>
</table>