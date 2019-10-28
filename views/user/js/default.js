jQuery(document).ready(function($) 
{
	$(".chg").on('click', function(ev) {
		ev.preventDefault();
		/* Act on the event */

		var id = $(this).attr("rel")
		var url = $(this).data("link")
		var container = $(this)
		
		var conteudo = '';
		conteudo = '<form action="'+url+'" method="POST">';
			conteudo += '<input type="password" name="password" required />';
			conteudo += '<input type="hidden" name="user" value="'+id+'" />';
			conteudo += '<input type="submit" class="password_change" value="Alterar" />';
		conteudo += '</form>';

		$(container).parent().html("").append(conteudo)
		return false;
	});
});