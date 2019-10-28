jQuery(document).ready(function($) 
{
	$(".delete").click(function(event) {
		/* Act on the event */
		var c = confirm("Are you sure you want delete this note?")
		if(c == false)
			return false
	});
});