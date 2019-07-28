if (typeof(pid) == 'undefined') 
{
		$(document).ready(function()
		{
			$('a').click(function()
			{
				var pid = $(this).attr('class');
				add_like(pid);
					
			});
		});
		function add_like(pid)
		{
			$.post('../Controleur/c_ajouter_like.php',{pid:pid},function(data)
			{
				$('#id'+pid).text(data);
			});
	
		}
}
