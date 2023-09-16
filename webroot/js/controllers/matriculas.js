$(document).ready(function() {
	
	$("#aluno").autocomplete({
		
		source : function(request, response) {
		    $.ajax({
				type : "get",
				url : "/alunos/pornome/" + $("#aluno").val(),
				dataType : "json",
				data : {
				    term : request.term
				},
				success : function(data) {
				    response(data);
				}
		    });
		},
	
		minLength : 2,
	
		select : function(event, ui) {
		    $('#alunos_id').val(ui.item.id);
		}
    });
});