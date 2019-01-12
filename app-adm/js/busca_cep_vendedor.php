<script type="text/javascript" src="js/jquery-1.2.6.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#vendedor_cep").blur(function(){
		$("#vendedor_logradouro").val("carregando...")
		$("#vendedor_bairro").val("carregando...")
		$("#vendedor_cidade").val("carregando...")
		$("#vendedor_uf").val("carregando...")
		$("#vendedor_tipo_logradouro").val("carregando...")
		q=$("#vendedor_cep").val()
		//alert(q)
		$.getScript("http://cep.republicavirtual.com.br/web_cep.php?cep="+q+"&formato=javascript", function(){
		rua=unescape(resultadoCEP.logradouro)
		bairro=unescape(resultadoCEP.bairro)
		cidade=unescape(resultadoCEP.cidade)
		tipo_logradouro=unescape(resultadoCEP.tipo_logradouro)
		uf=unescape(resultadoCEP.uf)
		
		$("#vendedor_logradouro").val(rua)
		$("#vendedor_bairro").val(bairro)
		$("#vendedor_cidade").val(cidade)
		$("#vendedor_uf").val(uf)
		$("#vendedor_tipo_logradouro").val(tipo_logradouro)
		
		})
	})

});
</script>