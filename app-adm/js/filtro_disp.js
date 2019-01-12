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

function busca2(){

	if(document.getElementById){

		var disp = document.getElementById('disp').value;

		var exibeResultado = document.getElementById('exibe2');
		
		if(disp !== ""){

			var ajax = openAjax();
					
			ajax.open("GET", "js/filtro_disp.php?disp=" + disp, true);
			
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
