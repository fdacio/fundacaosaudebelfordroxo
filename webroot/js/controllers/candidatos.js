$(document).ready(function () {

    $('#btn-envia-inscricao').on('click', function () {
        $(this).attr('disabled', true);
        $('#form-inscricao').submit();
    });

    $('#cep').blur(function () {

        var cep = $(this).val().toString();
        cep = cep.replace(/-/, "");
        if (cep == "") return;

        $('#endereco').addClass('loading_right');
        $.ajax({
            type: 'get',
            url: 'https://viacep.com.br/ws/' + cep + '/json/',
            dataType: "json",
            success: function (data) {
                $('#endereco').removeClass('loading_right');
                $('#endereco').val(data.logradouro);
                $('#bairro').val(data.bairro);
                $('#cidade').val(data.localidade);
                $('#uf').val(data.uf);
            },
            complete: function () {
                $('#endereco').removeClass('loading_right');
            }
        });
    })

    $(".custom-file-input").on("change", function () {
        var label = $(this).parents(".custom-file").find(".custom-file-label");
        label.html(this.files[0].name);
    });



    $('#update-inscricao').on('click', function () {

        var data = {
            'novo_id': $('#novo_id').val(),
            'antigo_id': $('#antigo_id').val()
        };

        $.ajax({
            url: 'https://saudebelfordroxo.com/candidatos/update-numero-inscricao',
            headers: {
                'X-CSRF-Token': $('[name="_csrfToken"]').val()
            },
            method: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
                if (data.success) {
                    alert('Atualizado');
                    $(location).attr('href', 'https://saudebelfordroxo.com/candidatos');
                }
            }
        });


    });


    $('#processo').on("change", function() {
    	
    	var selectbox = $('#cargo');
    	selectbox.find('option').remove();
    	$('<option>').val('').text('Selecione').appendTo(selectbox);
    	if ($(this).val() == '') {
    		return;
    	}

    	$('#cargo').addClass('loading');
    	$.ajax({
		    type : 'GET',
		    url : "/cargos-ajax/cargos/" + $(this).val(),
		    dataType : "json",
		    success : function(data) {
		    	if (data != null) {
		    		$.each(data, function(i, item) {
		    			$("<option>").val(item.id).text(item.label).appendTo(selectbox);
			    	});
				}
		    },
		    error : function(XMLHttpRequest, textStatus, errorThrown) {
		    	console.log(textStatus);
		    	$("#cargo").removeClass("loading");
		    },
	
		    complete : function() {
		    	$("#cargo").removeClass("loading");
		    }
    	});

    });

});