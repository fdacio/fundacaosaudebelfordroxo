$(document).ready(function () {
	
	$('#cep').blur(function () {
		
        var cep = $(this).val().toString();
        cep = cep.replace(/-/,"");
        $('#endereco').addClass('loading_right');
        $.ajax({
            type: 'get',
            url: 'https://viacep.com.br/ws/'+cep+'/json/',
            dataType: "json",
            success: function (data) {
            	$('#endereco').removeClass('loading_right');
                $('#endereco').val(data.logradouro);
                $('#bairro').val(data.bairro);
                $('#cidade').val(data.localidade);
                $('#uf').val(data.uf);
            }
        });
    });
	
	$('#nome').blur(function () {
        $('#nome').addClass('loading_right');
        $.ajax({
            type: 'get',
            url: '/paciente/pornome/'+$('#nome').val(),
            dataType: "json",
            success: function (data) {
            	$('#nome').removeClass('loading_right');
            	if (data[0].id > 0) {
            		alert('Nome já cadastrado');
            	}
            }
        });
    });

	/**
	 * Foto do Cidadão
	 */
    $("#file-foto").on("change", function() {
    	readURL(this);
	});

    function readURL(input) {
		if ((input.files) && (input.files[0])) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		    	$("#img-foto").attr("src", e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		}
	}

	$("#excluir-foto").click(function() {
		$("#img-foto").attr("src", null);
		$("#file-foto").val('');
		$("#foto").val('');
	});
	
	function calculaIdade(aniversario) {
	    var nascimento = aniversario.split("/");
	    var dataNascimento = new Date(parseInt(nascimento[2], 10),
	    parseInt(nascimento[1], 10) - 1,
	    parseInt(nascimento[0], 10));

	    var diferenca = Date.now() -  dataNascimento.getTime();
	    var idade = new Date(diferenca);

	    return Math.abs(idade.getUTCFullYear() - 1970);
	}
	
	$("#nascimento").on("blur", function(){
		
		var idade = calculaIdade($(this).val());
		
		if (idade < 18) {
			$("#menor").val(1);
		} else {
			$("#menor").val(0);
		}
		
		console.log();
	});

});