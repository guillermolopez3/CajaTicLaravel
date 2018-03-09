//funcion que va mostrando divs dependiendo si se selecciona una cosa u otra
    	$(document).ready(function(){
    		
    		function displayVals() //funcion que detecta los niveles seleccionados del cmb multiple y lo oculta o muestra dependiendo si es la opcion recursos
    		{
    			var valor = $( "#seccion" ).val() || [];
    			console.log(valor);
			  	if(valor.length<=0)
			  	{
			  		$('#nivel').hide();
			  		$('#nues').hide();
			  	}
			  	else
			  	{
			  		for(var i=0;i<valor.length;i++)
			  		{
			  			if(valor[i]==3)
				  		{
				  			console.log('ne show');
				  			$('#nues').show();
				  		}
				  		else
				  		{
				  			console.log('nu hide');
				  			$('#nues').hide();
				  		}

				  		if(valor[i]==4)
				  		{
				  			console.log('nivel show');
				  			$('#nivel').show();
				  		}
				  		else
				  		{
				  			console.log('nivel hide');
				  			$('#nivel').hide();
				  		}
				  		
			  		}
			  	}
			}

			

			$( "#seccion" ).change( displayVals ); //se activa al cambiar los valores
			displayVals();
		});