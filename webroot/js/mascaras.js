$(document).ready(function(){
	
    $(".date_ano").mask('9999');
    $(".competencia").mask('99/9999');
    /*
        Rotina para permitir colar texto no input com mascára
    */
    
    $("i.cpf").on('paste', function(e){	
	var data = e.originalEvent.clipboardData.getData('Text');
	var value = data.replace(/[^\d]+/g, '');
	$(this).val(value);	
    });
    
    $(".data").mask('99/99/9999');    
    $(".cpf").mask('999.999.999-99');
    $('.cep').mask('99999-999');
    $('.telefone').mask('(99)9999-9999');
    $('.celular').mask('(99)9 9999-9999');
    $('.hora').mask('99:99:99');
    function PosEnd(end) {
        var len = end.value.length;
         
        // Mostly for Web Browsers
        if (end.setSelectionRange) {
            end.focus();
            end.setSelectionRange(len, len);
        } else if (end.createTextRange) {
            var t = end.createTextRange();
            t.collapse(true);
            t.moveEnd('character', len);
            t.moveStart('character', len);
            t.select();
        }
    }

    {selectOnFocus: true}
    
    /*Input Calendar*/
    $(".calendar").mask('99/99/9999');
    $(".calendar").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		showOn: "button-celendar",
		changeMonth: true,
		changeYear: true	
    });
    $(".calendar").parent().addClass("form-inline").append("<span class='glyphicon glyphicon-calendar button-calendar btn btn-default'></span>");
    $(".button-calendar").on('click', function(){
	$(this).before().datepicker( "show" );
    });
    $("#ui-datepicker-div").css("font-size", "12px");
    $(".button-calendar").css("position", "relative");
    $(".button-calendar").css("left", "-10px");
    $(".button-calendar").css("top", "0px");

    
    /*Calenda end*/
});