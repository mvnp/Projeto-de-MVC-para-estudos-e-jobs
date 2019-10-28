<h1>Dashboard</h1>

<div id="listInserts"></div>

<br>

<form id="randomInsert" action="<?php echo URL ?>dashboard/xhrInsert" method="POST">
	<input type="text" name="text" required />
	<input type="submit" value="Cadastar" />
</form>