<script type="text/javascript" src="js/jquery-1.2.6.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	$("#cep").blur(function(){
                
		$("#endereco").val("Aguarde, caregando...")
		$("#bairro").val("Aguarde, caregando...")
		$("#cidade").val("Aguarde, caregando...")
		$("#uf").val("")
		
		q=$("#cep").val()
		//alert(q)
		$.getScript("http://cep.republicavirtual.com.br/web_cep.php?cep="+q+"&formato=javascript", function(){
		logradouro=unescape(resultadoCEP.logradouro)
		bairro=unescape(resultadoCEP.bairro)
		cidade=unescape(resultadoCEP.cidade)
		tipo_logradouro=unescape(resultadoCEP.tipo_logradouro)
		uf=unescape(resultadoCEP.uf)
		
		$("#endereco").val(logradouro)
		$("#bairro").val(bairro)
		$("#cidade").val(cidade)
		$("#uf").val(uf)
		
		})
	})

});
</script>
