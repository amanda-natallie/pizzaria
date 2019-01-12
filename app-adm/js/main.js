function openAjax(){
	var ajax;

try{
	ajax = new XMLHttpRequest();
}catch(erro){
	try{
		ajax = new ActiveXObject("Msxl2.XMLHTTP");
	}catch(ee){
		try{
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			ajax = false;
		}
	}
}
return ajax;
}//instancia dinamicamente o objecto xmlhttp



function redefinir(){

	if(document.getElementById){
            
            var email = $('#usuario').val();
            
            if(email == "")
            {
                $('#erro_redefinir').show(500);
            }else
            {
                $('#erro_redefinir').hide("slow");
                $('#aguarde_redefinir').show(500);
                
                
                var ajax = openAjax();
                        
			ajax.open("GET", "js/funcoes.php?acao=redefinir&email=" + email, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                
                                                $('#aguarde_redefinir').hide("slow");
						$('#usuario').val('');
						if(resultado == '0'){
                                                   $('#erro2_redefinir').show(500);
                                                }
                                                if(resultado == '1'){
                                                    $('#sucesso_redefinicao').show(500);
                                                }
                                                                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }
       
               
            
	}
        }
        
      