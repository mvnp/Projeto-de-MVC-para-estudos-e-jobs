<h1>Login</h1>

<form action="<?php echo URL ?>login/run" method="post" autocomplete="off">
	<table class="login">
		<tr>
			<td><label for="">Username</label></td>
			<td><input type="text" name="login" required /></td>
		</tr>
		<tr>
			<td><label for="">Password</label></td>
			<td><input type="password" name="password" required /></td>
		</tr>
		<tr colspan="2">
			<td><input type="submit" name="submit" value="Acessar" /></td>
		</tr>
	</table>
</form>