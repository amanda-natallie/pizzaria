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

function busca(){

	if(document.getElementById){
                alert("teste");
		var tipo = document.getElementById('tipo').value;
		
		var exibeResultado = document.getElementById('exibe');
		
		if(tipo !== ""){

			var ajax = openAjax();
					
			ajax.open("GET", "js/filtro_tipo.php?tipo=" + tipo, true);
			
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					exibeResultado.innerHTML = '<p>Carregando resultados...</p>';
					
				}
				
				if(ajax.readyState == 4){
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
						exibeResultado.innerHTML = resultado;
											
												
						
					}else{
						exibeResultado.innerHTML = '<p>Ouve algum erro na requisição</p>';
						
					}
				}
			}
			ajax.send(null);
		}
	}
}
