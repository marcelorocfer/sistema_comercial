
$(document).ready(function($) {

	var base_url = $("#base_url").val();

	//Gráfico "Chart Js"
	$.getJSON(base_url+"ajax/grafico", function(response){
		var ctx = $("#myChart");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: response.titulo,
		        datasets: [{
		            label: 'Gráfico de Valores',
		            data: response.valores,
		            backgroundColor: [
		                'rgba(165,42,42, 0.4)',
		                'rgba(54, 162, 235, 0.4)',
		                'rgba(218,165,32, 0.4)',
		                'rgba(148, 0, 211, 0.4)'
		            ],
		            borderColor: [
		                'rgba(165,42,42, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(218,165,32, 1)',
		                'rgba(148, 0, 211, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});
	});
	
	//DataTable
	$('#datatable').dataTable( {     
            "aoColumnDefs": [
                { "aTargets": [ 0 ] }
            ],
            "aaSorting": [['0', 'asc']],
             "aLengthMenu": [
                [10, 20, 50, 100, -1],
                [10, 20, 50, 100, "All"] 
            ],
            "iDisplayLength": 10,
            responsive: true
        });
	// Fim DataTable


	//Cadastro de clientes
	var pf = $("#pf");
	var pj = $("#pj");

	if(pf.is(':checked')){
		$(".pj").hide();
		$(".pf").show();
		$("input[name=cpf_cnpj]").mask("999.999.999-99");
	}

	if(pj.is(':checked')){
		$(".pf").hide();
		$(".pj").show();
		$("input[name=cpf_cnpj]").mask("99.999.999/9999-99");
	}

	pf.click(function() {		
		$(".pj").hide();
		$(".pf").show();
		$("input[name=cpf_cnpj]").mask("999.999.999-99");
	});

	pj.click(function() {		
		$(".pf").hide();
		$(".pj").show();
		$("input[name=cpf_cnpj]").mask("99.999.999/9999-99");
	});
	// --- Fim Cadastro Clientes

	//MASCARA DO CADASTRO DE CLIENTE
	$("input[name=data_nascimento]").mask("99/99/9999");
	$("input[name=telefone]").mask("(99) 9999-9999");
	$("input[name=cep]").mask("99999-999");
	$("input[name=cpf]").mask("999.999.999-99");
	$("input[name=celular]").mask("(99) 99999-9999");
	$("input[name=vencimento]").mask("99/99/9999");

	$(".formato_data").mask("99/99/9999");
	$("input.dinheiro").maskMoney({showSymbol:false, decimal:".", thousands:""});
});
              