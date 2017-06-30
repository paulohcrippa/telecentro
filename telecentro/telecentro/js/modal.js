	

	
	jQuery(document).ready(function(){
		jQuery('#ajax_formescola').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "processa/proc_cad_escola_modal.php",
				data: dados,
				cache:false,
				success: function( data )
				{

					if(data == 002){
						
						alert("Escola j? cadastrado.");
					}else{
						
						alert("Escola cadastrado com sucesso.");
	
							
						$("#divescola").load(location.href + " #divescola>*","");
					}
					
				
				}
				
			});
			
			
			return false;
		});
		$('#closemodalescola').click(function(){
					$('#escola-modal').modal('hide');
				});
		
	});
	
	
	jQuery(document).ready(function(){
		jQuery('#ajax_formensino').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "processa/proc_cad_ensino_modal.php",
				data: dados,
				success: function( data )
				{
					if(data == 002){
						
						alert("Ensino j? cadastrado.");
					}else{
						
						alert(" Ensino cadastrado com sucesso.");
						
						$("#divensino").load(location.href + " #divensino>*","");

					}
					

				}
				
			});
			
			
			return false;
		});
		$('#closemodalensino').click(function(){
					$('#escolaridade-modal').modal('hide');
				});
		
	});
	
	
	jQuery(document).ready(function(){
		jQuery('#ajax_formprofissao').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "processa/proc_cad_profissao_modal.php",
				data: dados,
				success: function( data )
				{
					if(data == 002){
						
						alert("Profissao ja cadastrado.");
					}else{
						
						alert(" Profiss?o cadastrado com sucesso.");
						
						$("#divprofissao").load(location.href + " #divprofissao>*","");

					}
					

				}
				
			});
			
			
			return false;
		});
		$('#closemodalprofissao').click(function(){
					$('#profissaopai-modal').modal('hide');
				});
		
	});
	
	jQuery(document).ready(function(){
		jQuery('#ajax_formprogsocial').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "processa/proc_cad_programa_modal.php",
				data: dados,
				success: function( data )
				{
					if(data == 002){
						
						alert("Programa ja cadastrado.");
					}else{
						
						alert(" Programa cadastrado com sucesso.");
						
						$("#divprograma").load(location.href + " #divprograma>*","");

					}
					

				}
				
			});
			
			
			return false;
		});
		$('#closemodalprogsocial').click(function(){
					$('#programa-modal').modal('hide');
				});
		
	});
	
	
	jQuery(document).ready(function(){
		jQuery('#ajax_formmanutencao').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "processa/proc_cad_equipamento_modal.php",
				data: dados,
				success: function( data )
				{
					if(data == 002){
						
						alert("EQUIPAMENTO JÁ CADASTRADO.");
					}else{
						
						alert(" EQUIPAMENTO CADASTRADO COM SUCESSO.");
						
						$("#divmanutencao").load(location.href + " #divmanutencao>*","");

					}
					

				}
				
			});
			
			
			return false;
		});
		$('#closemodalmanutencao').click(function(){
					$('#manutencao-modal').modal('hide');
				});
		
	});
	
	
	jQuery(document).ready(function(){
		jQuery('#ajax_atividade').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "processa/proc_cad_atividade_modal.php",
				data: dados,
				success: function( data )
				{
					if(data == 002){
						
						alert("Atividade JÁ CADASTRADO.");
					}else{
						
						alert(" Atividade CADASTRADO COM SUCESSO.");
						
						$("#divatividade").load(location.href + " #divatividade>*","");

					}
					

				}
				
			});
			
			
			return false;
		});
		$('#closemodalatividade').click(function(){
					$('#atividade-modal').modal('hide');
				});
		
	});
	
	
	
	
	

	
	


	
	

	


	