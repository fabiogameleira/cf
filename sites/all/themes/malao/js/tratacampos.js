if (typeof jQuery === 'undefined') {
  throw new Error('Bootstrap\'s JavaScript requires jQuery')
}

(function($) {
       Drupal.behaviors.customToggler = {
         attach: function(context, settings) {
			
			$('.imprimir').click(function(){
							
				 window.print();
				 return false;
			});	
			
			if ($('#edit-field-lista-de-presenca-und').is(":checked")) {
				   $('#edit-field-controle-presenca-und').attr( 'disabled', false );
			    } else {
					$('#edit-field-controle-presenca-und').attr( 'disabled', true);
				};	
				
			$('#edit-field-lista-de-presenca-und').change(function(){
				if ($('#edit-field-lista-de-presenca-und').is(":checked")) {
				   $('#edit-field-controle-presenca-und').attr( 'disabled', false );
			    } else {
					$('#edit-field-controle-presenca-und').prop('checked', false);;
					$('#edit-field-controle-presenca-und').attr( 'disabled', true);
				};				
			});	
			
			
			$('#edit-bundle-participacao-assembleia-show-value-field-participa').prop('checked', true);
			$('.form-item-bundle-participacao-assembleia-show-value-field-participa').hide();
	        
			//Remover opções de papeis
			
			// User profile
			//usuário autenticado
			$('.form-item-roles-2').hide();
			
			// Administrador
			$('.form-item-roles-3').hide();
			
			// sem filiado
			$('.form-item-roles-11').hide();

			//Operador
			//$('.form-item-roles-5').hide();
			
			//Coordenador
			//$('.form-item-roles-9').hide();
			
			// Bulck operation de filiados pendentes
			
			// Administrador
			$('.form-item-properties-roles-3').hide();
			//operador
			//$('.form-item-properties-roles-5').hide();
			//pendente	
			//$('.form-item-properties-roles-8').hide();	
			//Coordenador	
			//$('.form-item-properties-roles-9').hide();			
			//conta pendente
			//$('.form-item-properties-roles-10').hide();
			// sem filiado não permit.
			$('.form-item-properties-roles-11').hide();			
			// Adicionar papeis
			$('.form-item-properties--appendroles').hide();
			$('.form-item-status').hide();
			$('#edit-locale').hide();
			$('#edit-timezone').hide();

	
        }
	   }
		
})(jQuery);
	
