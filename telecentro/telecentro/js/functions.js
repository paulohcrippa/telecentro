$(document).ready(function(){  
       	
		/* MB */
		$(".1").click(function(){  
            var $this = $( this );//guardando o ponteiro em uma variavel, por performance  
  
            var status = 0;  
            var id = $(this).attr('alt')  
  
            $.ajax({  
                url: 'ajax/clientes.php',  
                type: 'GET',  
                data: 'status='+status+'&id='+id,  
                success: function( data ){  
                    //alert( data ); 
					$("#a"+id).css({'display' :'none'});
					$("#d"+id).css({'display' :'inline'}); 
                }  
            });  
        });  
		
		$(".2").click(function(){  
            var $this = $( this );//guardando o ponteiro em uma variavel, por performance  
  
            var status =  1;  
            var id = $(this).attr('alt')  
  
            $.ajax({  
                url: 'ajax/clientes.php',  
                type: 'GET',  
                data: 'status='+status+'&id='+id,  
                success: function( data ){  
                    //alert( data ); 
					$("#a"+id).css({'display' :'inline'});
					$("#d"+id).css({'display' :'none'});
                }  
            });  
        });  
		
    }); 