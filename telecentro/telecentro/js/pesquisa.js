$(document).ready(function(){
	
	$('#pesquisar').keyup(function(){
		
		$('form').submit(function(){
			
			var dados = $(this).serialize();
			
			$.ajax({
				
				url:'principal.php?link=15',
				type:'POST',
				dataType:'html',
				data: dados,
				success: function(data){
					$('#resultado').empty().html(data);
				}
				
			});
			
			return false;
			
		});
		
		$('form').trigger('submit');
		
	});
	
});

$(document).ready(function(){
	
	$('#pesquisartipoatend').keyup(function(){
		
		$('form').submit(function(){
			
			var dados = $(this).serialize();
			
			$.ajax({
				
				url:'principal.php?link=21',
				type:'POST',
				dataType:'html',
				data: dados,
				success: function(data){
					$('#resultadotipoatend').empty().html(data);
				}
				
			});
			
			return false;
			
		});
		
		$('form').trigger('submit');
		
	});
	
});


$(document).ready(function(){
	
	$('#pesquisarpessoa').keyup(function(){
		
		$('form').submit(function(){
			
			var dados = $(this).serialize();
			
			$.ajax({
				
				url:'principal.php?link=56',
				type:'POST',
				dataType:'html',
				data: dados,
				success: function(data){
					$('#resultadopessoa').empty().html(data);
				}
				
			});
			
			return false;
			
		});
		
		$('form').trigger('submit');
		
	});
	
});


$(document).ready(function(){
	
	$('#pesquisar_equipamento').keyup(function(){
		
		$('form').submit(function(){
			
			var dados = $(this).serialize();
			
			$.ajax({
				
				url:'principal.php?link=65',
				type:'POST',
				dataType:'html',
				data: dados,
				success: function(data){
					$('#resultadoequipamento').empty().html(data);
				}
				
			});
			
			return false;
			
		});
		
		$('form').trigger('submit');
		
	});
	
});




