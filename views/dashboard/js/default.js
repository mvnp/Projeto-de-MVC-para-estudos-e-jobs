jQuery(document).ready(function($) {

	$.get('dashboard/xhrGetListings', function(o)
	{
		/**
		 * Carregando lista de dados no reload da página
		 * @param {[type]}
		 */
		for (var i = 0; i < o.length; i++) 
		{	
			$("#listInserts").append('<div>' + o[i].text + ' <a class="del" rel="' + o[i].id + '" href="">X</a></div>');	
		}

		/**
		 * Apagando registros do banco de dados sem refresh
		 * @param {[type]}
		 */
		$(".del").click(function()
		{
			delItem = $(this)
			var id = $(this).attr('rel')

			$.post('dashboard/xhrDeleteListing', {'id': id}, function(o)
			{
				delItem.parent().remove()
			}, 'json');

			return false
		});	

	}, 'json');

	$("#randomInsert").submit(function(q)
	{
		q.preventDefault()

		var url = $(this).attr('action')
		var data = $(this).serialize()

		$.post(url, data, function(o)
		{
			$("input[name='text']").text("").val("")
			$("#listInserts").append('<div>' + o.text + ' <a class="del" rel="' + o.id + '" href="">X</a></div>');

		}, 'json');

		return false
	});
});