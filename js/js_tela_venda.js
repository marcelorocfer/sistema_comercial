currentRow = 2;
$(document).ready(function(){ 	

	var base_url = $("#base_url").val();

	/**
	 * MASCARA MOEDA
	 */
	$("input.moeda").maskMoney({thousands:'', decimal:'.'});

	/**
	 * MASCARA DATA
	 */
	$("input[name=data_emissao]").mask("99/99/9999");

	/**
	 * CHAMA A FUNÇÃO RECALCULAR
	 */
	$("input:text[name^='produto']").live("keyup", recalcular);
	recalcular();
														
	$("input:text[name^='qtde']").live("keyup", recalcular);
	recalcular();
		
	$("input:text[name^='valor_unit']").live("keyup", recalcular);
	recalcular();
	
	$("input[name='valor_desconto']").live("keyup", recalcular);
	recalcular();

	$("input[name='valor_entrada']").live("keyup", recalcular);
	recalcular();

	/**
	 * AUTO COMPLETE CLIENTE
	 */
	$("#cliente").autocomplete({  
        minLength: 1,  
        source:   
        function(req, add){  
            $.ajax({  
                url: base_url+"/ajax/clientes",  
                dataType: 'json',  
                type: 'POST',  
                data: req,							  
                success:  							 
                function(data){	
											  
                    if(data.response =="true"){  
                       add(data.message);  
                    }  
                },  
            });  
        },  
    select:   
        function(event, ui) {                              
			$("input[name='id_cliente']").val(ui.item.id);													
        },        
    }); 


	/**
	 * AUTO COMPLETE PRODUTOS
	 */
	$("input:text[id^='txtProduto_']").live("focus.autocomplete", null, function () {
    var $parent = $(this).parent().parent("tr.linhas");
        $(this).autocomplete({            
			minLength: 1,  
                    source:   
                    function(req, add){  
                        $.ajax({  
                            url: base_url+"//ajax/produtos",  
                            dataType: 'json',  
                            type: 'POST',  
                            data: req,							  
                            success:  							 
                            function(data){															  
                                if(data.response =="true"){  
                                   add(data.message);  
                                }  
                            },  
                        });  
                    },  
                select:  
											 
                function(event, ui) { 	
				   $parent.find("input:text[name^='qtde']").val('1');					   					   
				   $parent.find("input:text[name^='valor_unit']").val(ui.item.venda);					   					   				   				   
				   $parent.find("input:hidden[name^='id_produto']").val(ui.item.id_produto);
                },
										
        });
	});

	/**
	 * ADICIONA LINHA PARA PRODUTOS.
	 */
	$('#add_produto').click(function(){
		var $lista_produto = $('#lista_produto');			
		currentRow++;																					
							
		$lista_produto.append('<tr class="linhas"><td><a href="#" id="del0" class="btn red btn-remove"><i class="fa fa-trash-o"></i></a></td><td class="input_error"><input type="hidden" value="" name="id_produto[]"><input type="text" name="produto[]" id="txtProduto_'+currentRow+'" value="" class="form-control" onblur="FormatoDecimal()" required /></td>\
		<td class="input_error"><input type="text" name="qtde[]" id="qtde_'+currentRow+'"  value="" class="form-control text-center" required/></td>\
		<td class="input_error"><input type="text" name="valor_unit[]" id="valor_unit_'+currentRow+'" style="text-align:right" class="form-control text-right moeda" required/></td>\
		<td style="text-align:right"><input type="text" name="valor_total[]" class="form-control text-right" readonly /></td>\
		</tr>');													
			
	});

	/**
	 * REMOVE LINHA PRODUTO
	 */
	$('#lista_produto').on('click', '.btn-remove', function(){		
						
		$(this).parent().parent().remove();									
		recalcular();

	});	

});


	/**
	 * FUNÇÃO PARA RECALCULAR USANDO A FUNÇÃO jquery.calculation
	 */
	function recalcular(){	

		$("input:text[name^='valor_total']").calc(
		"(qty * price)",
		{
			qty: $("input:text[name^='qtde']").parseNumber(),
			price: $("input:text[name^='valor_unit']").parseNumber()
		},															
		function (s){
			return "" + s.toFixed(2);
		},
		function ($this){

			var sum = $this.sum();									
			var desconto = $("input[name='valor_desconto']").parseNumber();
			var entrada = $("input[name='valor_entrada']").parseNumber();	

			var TotalApagar = (sum-desconto-entrada).toFixed(2);
			$("input[name='total_pagar']").val(TotalApagar);

																																					
		});	

	}

	/**
	 * FUNÇÃO PAR CONVERTER EM MOEDA
	 */
	function FormatoDecimal(){
		jQuery(function($){
			$(".moeda").maskMoney({thousands:'', decimal:'.'});			
		});
	}	

