$('document').ready(function(){

	//$('#tabela_agenda td').dblclick(function(){
	//	$('#tabela_agenda td input').remove();
	//	$(this).html('<input type="text" style="width: 12px;">')});

    $( "#data-agenda" ).datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true,
    										showOtherMonths: true,
    										selectOtherMonths: true, 
    										dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], 
    										dayNamesMin: ['D','S','T','Q','Q','S','S','D'],	
    										dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], 
    										monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], 
    										monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    								});




    $('.days').dblclick(function () {
        var conteudoOriginal = $(this).text();
        var string = $(this).attr("id");
        $(this).addClass("celulaEmEdicao");
        $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
        $(this).children().first().focus();		
        $(this).children().first().keypress(function (e) {
            if (e.which == 13) {
                var novoConteudo = $(this).val();
				string = string+'.'+novoConteudo;							
                //$(this).parent().text(novoConteudo);				
                $(this).parent().removeClass("celulaEmEdicao");				
				string = string.replace("/", "-");
				string = string.replace("/", "-");				
				tratar_string(string);	
            }
        });
         
    $(this).children().first().blur(function(){	
        $(this).parent().text(conteudoOriginal);
        $(this).parent().removeClass("celulaEmEdicao");
    });	
    });

 function tratar_string(string){
		var url = window.location.toString();
		url = limparUrlHome(url);
        $.ajax({
                 async: false,
         url: url+"Home/edition_agenda/"+string, //URL que puxa os dados
         dataType: "json", //Tipo de Retorno
         success: function(json){ //Se ocorrer tudo certo                      

         }      
    });

	location.reload();
        
        }
		
function limparUrlHome(url){
        n =  url.search('home');
        url = url.slice(0,n);
        return url;
}

		
});