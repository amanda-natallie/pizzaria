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

function isDate(dataNasc)
{
    var currVal = dataNasc;
    if(currVal == '')
        return false;
    
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Regex
    var dtArray = currVal.match(rxDatePattern); //verifica se o formato tá ok
    
    if (dtArray == null) 
        return false;
    
    //formato de data dd/mm/aaaa.
    
    dtDia= dtArray[1];
    dtMes = dtArray[3];
    dtAno = dtArray[5];        
    
    if (dtMes < 1 || dtMes > 12) 
        return false;
    else if (dtDia < 1 || dtDia> 31) 
        return false;
    else if ((dtMes==4 || dtMes==6 || dtMes==9 || dtMes==11) && dtDia ==31) 
        return false;
    else if (dtMes == 2) 
    {
        var isleap = (dtAno % 4 == 0 && (dtAno % 100 != 0 || dtAno % 400 == 0));
        if (dtDia> 29 || (dtDia ==29 && !isleap)) 
                return false;
    }
    return true;
}

function calculateAge(dobString) {
    var dob = new Date(dobString);
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
    var age = currentYear - dob.getFullYear();
    if(birthdayThisYear > currentDate) {
    age--;
    }
    return age;
}
    
    
    function calcularIdade() {        
    var data = document.getElementById('nascimento').value;
    var partes = data.split("/");
    var junta = partes[2]+"-"+partes[1]+"-"+partes[0];
    document.getElementById('idade').value = (calculateAge(junta));
}

function verificarCPF(c){
        
        if(c == '111.111.111-11' || c == '222.222.222-22' || c == '333.333.333-33' || c == '444.444.444-4' || c == '555.555.555-55' || c == '666.666.666-66' || c == '777.777.777-77' || c == '888.888.888-88' || c == '999.999.999-99' || c == '000.000.000-00')
        {
            return 0;
        }else{
        var i;
        c = c.replace(".","");
        c = c.replace(".","");
        c = c.replace("-","");
        
        var s = c;
        var c = s.substr(0,9);
        var dv = s.substr(9,2);
        var d1 = 0;
        var v = false;

        for (i = 0; i < 9; i++){
            d1 += c.charAt(i)*(10-i);
        }
        if (d1 == 0){
            
            v = true;
            return 0;
        }
        d1 = 11 - (d1 % 11);
        if (d1 > 9) d1 = 0;
        if (dv.charAt(0) != d1){
            
            v = true;
            return 0;
        }

        d1 *= 2;
        for (i = 0; i < 9; i++){
            d1 += c.charAt(i)*(11-i);
        }
        d1 = 11 - (d1 % 11);
        if (d1 > 9) d1 = 0;
        if (dv.charAt(1) != d1){
            
            v = true;
            return 0;
        }
        if (!v) {
           return 1;
        }
    }
    }

function enviarContato(){

	if(document.getElementById){
            
            var nome = $('#nome').val();
            var email = $('#email').val();
            var telefone = $('#telefone').val();
            var assunto = $('#assunto').val();
            var mensagem = $('#mensagem').val();
            var erro = 0;
            var txt = email;
            
            if(nome == ""){
                $("#nome").css("border", "1px solid #f00");
                erro++;
                $('#nome').focus();
            }else{
                $("#nome").css("border", "1px solid #ccc");
            }
            
            if(email == ""){
                $("#email").css("border", "1px solid #f00");
                erro++;
                $('#email').focus();
            }else{
                
                if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
                {
                    $('#mes-aviso2').show();
                    $('#email').focus();
                    erro++;
                }else{
                    $('#mes-aviso2').hide("slow");
                }                
                $("#email").css("border", "1px solid #ccc");
            }          
            
            if(telefone == ""){
                $("#telefone").css("border", "1px solid #f00");
                erro++;
                $('#telefone').focus();
            }else{
                $("#telefone").css("border", "1px solid #ccc");
            }            
            
            if(assunto == ""){
                $("#assunto").css("border", "1px solid #f00");
                erro++;
                $('#assunto').focus();
            }else{
                $("#assunto").css("border", "1px solid #ccc");
            }
                        
            if(mensagem == ""){
                $("#mensagem").css("border", "1px solid #f00");
                erro++;
                $('#mensagem').focus();
            }else{
                $("#mensagem").css("border", "1px solid #ccc");
            }
            
            
            if(erro == 0)
            {
                $('.alert-info').show();
                
                
                var ajax = openAjax();
                        
			ajax.open("GET", "funcoes.php?acao=contato&email=" + email + "&nome=" + nome + "&telefone=" + telefone + "&mensagem=" + mensagem + "&assunto=" + assunto, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                                                        
                                                $('.alert-info').hide("slow");
                                                location.href="sucesso-contato";
                                                                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }
       
               
            
	}
        }
        
        
function enviaNews(){

	if(document.getElementById){
            
            var email = document.getElementById('email_news').value;
            var nome = document.getElementById('nome_news').value;
            
            
            if(email == "" || nome == "")
            {
                document.getElementById('validacao2').style.display="block";
            }else
            {
                document.getElementById('validacao2').style.display="none";
                document.getElementById('loading2').style.display="block";
                
                var ajax = openAjax();
                        
			ajax.open("GET", "funcoes.php?acao=newsletter&email=" + email + "&nome=" + nome, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                
                                                document.getElementById('email_news').value = '';
                                                document.getElementById('nome_news').value = '';
                                                document.getElementById('loading2').style.display="none";
                                                document.getElementById('sucesso2').style.display="block";
                                                                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }
       
               
            
	}
        }
        
function enviarProjeto(){

	if(document.getElementById){
            
            var projeto = $('#projeto').val();
            var nome = $('#nome').val();
            var cep = $('#cep').val();
            var endereco = $('#endereco').val();
            var numero = $('#numero').val();
            var cidade = $('#cidade').val();
            var bairro = $('#bairro').val();
            var estado = $('#estado').val();
            var telefone = $('#telefone').val();
            var celular = $('#celular').val();
            var nome_ebraico = $('#nome_ebraico').val();
            var email = $('#email').val();
            var data_nascimento = $('#data_nascimento').val();            
            var local = $('#local').val();
            var nome_mae = $('#nome_mae').val();
            var sobrenome_mae = $('#sobrenome_mae').val();
            var nome_pai = $('#nome_pai').val();
            var sinagoga = $('#sinagoga').val();
            var rabino = $('#rabino').val();
            var escola = $('#escola').val();
            var instrucao_judaica = $('#instrucao_judaica').val();
            var idioma = $('#idioma').val();
            var esportes = $('#esportes').val();
            var recomendacao = $('#recomendacao').val();
            var alergia = $('#alergia').val();
            var apresentado = $('#apresentado').val();
            var instituicao = $('#instituicao').val();
            var programa = $('#programa').is(':checked');   
            var programa2 = $('#programa2').is(':checked');
            var programa3 = $('#programa3').is(':checked');
            if(programa == true){ var prog = 1; }else{ var prog = 0; } 
            if(programa2 == true){ var prog2 = 1; }else{ var prog2 = 0; } 
            if(programa3 == true){ var prog3 = 1; }else{ var prog3 = 0; } 
            var nenhum = $('#nenhum').is(':checked');
            if(nenhum == true){ var nem = 1; }else{ var nem = 0; } 
            var programa_ano = $('#programa_ano').val();
            var programa_ano2 = $('#programa_ano2').val();
            var programa_ano3 = $('#programa_ano3').val();
            var seguro_medico = $('#seguro_medico').val();
            var nome_medico = $('#nome_medico').val();
            var telefone_medico = $('#telefone_medico').val();
            var celular_medico = $('#celular_medico').val();
            var problema_saude = $("input[name='problema_saude']:checked").val();            
            var problema_saude_qual = $('#problema_saude_qual').val();  
            var deficiencia = $("input[name='deficiencia']:checked").val();   
            var deficiencia_qual = $('#deficiencia_qual').val();
            var tratamento = $("input[name='tratamento']:checked").val();   
            var tratamento_qual = $('#tratamento_qual').val();
            var internado = $("input[name='internado']:checked").val();   
            var bronquite = $("input[name='bronquite']:checked").val();   
            var convulsoes = $("input[name='convulsoes']:checked").val();   
            var sonambolismo = $("input[name='sonambolismo']:checked").val();   
            var beliche = $("input[name='beliche']:checked").val();   
            var esporte = $("input[name='esporte']:checked").val();                        
            var esporte_qual = $('#esporte_qual').val(); 
            var mal_atividade = $("input[name='mal_atividade']:checked").val();                        
            var mal_atividade_qual = $('#mal_atividade_qual').val(); 
            var vacina_tetanica = $("input[name='vacina_tetanica']:checked").val();                        
            var vacina_tetanica_qual = $('#vacina_tetanica_qual').val(); 
            var tipo_sanguineo = $('#tipo_sanguineo').val();
            var fator_rh = $('#fator_rh').val();
            var remedios = $('#remedios').val();
            var alergia2 = $("input[name='alergia2']:checked").val();                        
            var alergia2_qual = $('#alergia2_qual').val(); 
            var observacao = $("input[name='observacao']:checked").val();       
            var observacao_qual = $('#observacao_qual').val(); 
            var aceito = $('#aceito').is(':checked');
            var erro = 0;
            var txt = email;
            
            
            if(projeto == ""){
                $("#projeto").css("border", "1px solid #f00");
                erro++;
                $('#projeto').focus();
            }else{
                $("#projeto").css("border", "1px solid #ccc");
            }
            
            if(nome == ""){
                $("#nome").css("border", "1px solid #f00");
                erro++;
                $('#nome').focus();
            }else{
                $("#nome").css("border", "1px solid #ccc");
            }
            
            if(cep == ""){
                $("#cep").css("border", "1px solid #f00");
                erro++;
                $('#cep').focus();
            }else{
                $("#cep").css("border", "1px solid #ccc");
            }
            
            if(endereco == ""){
                $("#endereco").css("border", "1px solid #f00");
                erro++;
                $('#endereco').focus();
            }else{
                $("#endereco").css("border", "1px solid #ccc");
            }
            
            if(numero == ""){
                $("#numero").css("border", "1px solid #f00");
                erro++;
                $('#numero').focus();
            }else{
                $("#numero").css("border", "1px solid #ccc");
            }
            
            if(cidade == ""){
                $("#cidade").css("border", "1px solid #f00");
                erro++;
                $('#cidade').focus();
            }else{
                $("#cidade").css("border", "1px solid #ccc");
            }
            
            if(bairro == ""){
                $("#bairro").css("border", "1px solid #f00");
                erro++;
                $('#bairro').focus();
            }else{
                $("#bairro").css("border", "1px solid #ccc");
            }
            
            if(estado == ""){
                $("#estado").css("border", "1px solid #f00");
                erro++;
                $('#estado').focus();
            }else{
                $("#estado").css("border", "1px solid #ccc");
            }
            
            if(telefone == ""){
                $("#telefone").css("border", "1px solid #f00");
                erro++;
                $('#telefone').focus();
            }else{
                $("#telefone").css("border", "1px solid #ccc");
            }
            
            if(celular == ""){
                $("#celular").css("border", "1px solid #f00");
                erro++;
                $('#celular').focus();
            }else{
                $("#celular").css("border", "1px solid #ccc");
            }
            
            if(nome_ebraico == ""){
                $("#nome_ebraico").css("border", "1px solid #f00");
                erro++;
                $('#nome_ebraico').focus();
            }else{
                $("#nome_ebraico").css("border", "1px solid #ccc");
            }
            
            if(email == ""){
                $("#email").css("border", "1px solid #f00");
                erro++;
                $('#email').focus();
            }else{
                if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
                {
                    erro++;
                    $('#mes-aviso2').show();
                    $('#email').focus();
                }else{
                    $('#mes-aviso2').hide("slow");
                }                
                $("#email").css("border", "1px solid #ccc");
            }
            
            if(data_nascimento == ""){
                $("#data_nascimento").css("border", "1px solid #f00");
                erro++;
                $('#data_nascimento').focus();
            }else{                
                
                if(isDate(data_nascimento)){
                        $("#data_nascimento").css("border", "1px solid #ccc");     
                        $('#mes-aviso3').hide("slow");
                    }else{
                        erro++;
                        $('#mes-aviso3').show();
                        $('#data_nascimento').focus();
                 };
                
            }
            
            
            if(local == ""){
                $("#local").css("border", "1px solid #f00");
                erro++;
                $('#local').focus();
            }else{
                $("#local").css("border", "1px solid #ccc");
            }
            
            if(nome_mae == ""){
                $("#nome_mae").css("border", "1px solid #f00");
                erro++;
                $('#nome_mae').focus();
            }else{
                $("#nome_mae").css("border", "1px solid #ccc");
            }
            
            if(sobrenome_mae == ""){
                $("#sobrenome_mae").css("border", "1px solid #f00");
                erro++;
                $('#sobrenome_mae').focus();
            }else{
                $("#sobrenome_mae").css("border", "1px solid #ccc");
            }
            
            if(nome_pai == ""){
                $("#nome_pai").css("border", "1px solid #f00");
                erro++;
                $('#nome_pai').focus();
            }else{
                $("#nome_pai").css("border", "1px solid #ccc");
            }
            
            if(sinagoga == ""){
                $("#sinagoga").css("border", "1px solid #f00");
                erro++;
                $('#sinagoga').focus();
            }else{
                $("#sinagoga").css("border", "1px solid #ccc");
            }
            
            if(rabino == ""){
                $("#rabino").css("border", "1px solid #f00");
                erro++;
                $('#rabino').focus();
            }else{
                $("#rabino").css("border", "1px solid #ccc");
            }
            
            if(escola == ""){
                $("#escola").css("border", "1px solid #f00");
                erro++;
                $('#escola').focus();
            }else{
                $("#escola").css("border", "1px solid #ccc");
            }
            
            if(instrucao_judaica == ""){
                $("#instrucao_judaica").css("border", "1px solid #f00");
                erro++;
                $('#instrucao_judaica').focus();
            }else{
                $("#instrucao_judaica").css("border", "1px solid #ccc");
            }
            
            if(recomendacao == ""){
                $("#recomendacao").css("border", "1px solid #f00");
                erro++;
                $('#recomendacao').focus();
            }else{
                $("#recomendacao").css("border", "1px solid #ccc");
            }
            
            if(idioma == ""){
                $("#idioma").css("border", "1px solid #f00");
                erro++;
                $('#idioma').focus();
            }else{
                $("#idioma").css("border", "1px solid #ccc");
            }
            
            if(esportes == ""){
                $("#esportes").css("border", "1px solid #f00");
                erro++;
                $('#esportes').focus();
            }else{
                $("#esportes").css("border", "1px solid #ccc");
            }
            
            if(alergia == ""){
                $("#alergia").css("border", "1px solid #f00");
                erro++;
                $('#alergia').focus();
            }else{
                $("#alergia").css("border", "1px solid #ccc");
            }
            
            if(apresentado == ""){
                $("#apresentado").css("border", "1px solid #f00");
                erro++;
                $('#apresentado').focus();
            }else{
                $("#apresentado").css("border", "1px solid #ccc");
            }
            
            if(instituicao == ""){
                $("#instituicao").css("border", "1px solid #f00");
                erro++;
                $('#instituicao').focus();
            }else{
                $("#instituicao").css("border", "1px solid #ccc");
            }
            
            
            
            if(programa == false && programa2 == false && programa3 == false && nenhum == false){
                $('#mes-aviso30').show();
                erro++;
            }else{
                $('#mes-aviso30').hide("slow");
                
                if(programa == true && programa_ano == ""){
                    $('#mes-aviso4').show();
                    erro++;
                }else{
                    $('#mes-aviso4').hide("slow");
                }
                
                if(programa2 == true && programa_ano2 == ""){
                    $('#mes-aviso5').show();
                    erro++;
                }else{
                    $('#mes-aviso5').hide("slow");
                }
                
                if(programa3 == true && programa_ano3 == ""){
                    $('#mes-aviso6').show();
                    erro++;
                }else{
                    $('#mes-aviso6').hide("slow");
                }
                
                
            }
            
            if(seguro_medico == ""){
                $("#seguro_medico").css("border", "1px solid #f00");
                erro++;
                $('#seguro_medico').focus();
            }else{
                $("#seguro_medico").css("border", "1px solid #ccc");
            }
            
            if(nome_medico == ""){
                $("#nome_medico").css("border", "1px solid #f00");
                erro++;
                $('#nome_medico').focus();
            }else{
                $("#nome_medico").css("border", "1px solid #ccc");
            }
            
            if(telefone_medico == ""){
                $("#telefone_medico").css("border", "1px solid #f00");
                erro++;
                $('#telefone_medico').focus();
            }else{
                $("#telefone_medico").css("border", "1px solid #ccc");
            }
            
            if(celular == ""){
                $("#celular_medico").css("border", "1px solid #f00");
                erro++;
                $('#celular_medico').focus();
            }else{
                $("#celular_medico").css("border", "1px solid #ccc");
            }
            
            if(problema_saude == undefined){
                $('#mes-aviso7').show();
                erro++;
                problema_saude = 0;
            }else{
                $('#mes-aviso7').hide("slow");
                if(problema_saude == 1 && problema_saude_qual == ""){
                    $("#problema_saude_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#problema_saude_qual").css("border", "1px solid #ccc");
                } 
            }
            
           if(deficiencia == undefined){
                $('#mes-aviso9').show();
                erro++;
                deficiencia = 0;
            }else{
                $('#mes-aviso9').hide("slow");
                if(deficiencia == 1 && deficiencia_qual == ""){
                    $("#deficiencia_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#deficiencia_qual").css("border", "1px solid #ccc");
                } 
            }
            
            if(tratamento == undefined){
                $('#mes-aviso11').show();
                tratamento = 0;
                erro++;
            }else{
                $('#mes-aviso11').hide("slow");
                if(tratamento == 1 && tratamento_qual == ""){
                    $("#tratamento_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#tratamento_qual").css("border", "1px solid #ccc");
                } 
            }
                        
            if(internado == undefined){
                $('#mes-aviso13').show();
                internado = 0;
                erro++;
            }else{
                $('#mes-aviso13').hide("slow");                
            }
            
            if(bronquite == undefined){
                $('#mes-aviso14').show();
                bronquite = 0;
                erro++;
            }else{
                $('#mes-aviso14').hide("slow");                
            }
            
            if(convulsoes == undefined){
                $('#mes-aviso15').show();
                convulsoes = 0;
                erro++;
            }else{
                $('#mes-aviso15').hide("slow");                
            }
            
            if(sonambolismo == undefined){
                $('#mes-aviso16').show();
                sonambolismo = 0;
                erro++;
            }else{
                $('#mes-aviso16').hide("slow");                
            }
            
            if(beliche == undefined){
                $('#mes-aviso17').show();
                beliche = 0;
                erro++;
            }else{
                $('#mes-aviso17').hide("slow");                
            }
            
            if(esporte == undefined){
                $('#mes-aviso18').show();
                esporte = 0;
                erro++;
            }else{
                $('#mes-aviso18').hide("slow");
                if(esporte == 1 && esporte_qual == ""){
                    $("#esporte_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#esporte_qual").css("border", "1px solid #ccc");
                } 
            }
            
            if(mal_atividade == undefined){
                $('#mes-aviso20').show();
                erro++;
                mal_atividade = 0;
            }else{
                $('#mes-aviso20').hide("slow");
                if(mal_atividade == 1 && mal_atividade_qual == ""){
                    $("#mal_atividade_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#mal_atividade_qual").css("border", "1px solid #ccc");
                } 
            }
            
            if(vacina_tetanica == undefined){
                $('#mes-aviso22').show();
                erro++;
                vacina_tetanica = 0;
            }else{
                $('#mes-aviso22').hide("slow");
                if(vacina_tetanica == 1 && vacina_tetanica_qual == ""){
                    $("#vacina_tetanica_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#vacina_tetanica_qual").css("border", "1px solid #ccc");
                } 
            }            
            
            if(tipo_sanguineo == ""){
                $("#tipo_sanguineo").css("border", "1px solid #f00");
                erro++;
                $('#tipo_sanguineo').focus();
            }else{
                $("#tipo_sanguineo").css("border", "1px solid #ccc");
            }
            
            if(fator_rh == ""){
                $("#fator_rh").css("border", "1px solid #f00");
                erro++;
                $('#fator_rh').focus();
            }else{
                $("#fator_rh").css("border", "1px solid #ccc");
            }
            
            if(remedios == ""){
                $("#remedios").css("border", "1px solid #f00");
                erro++;
                $('#remedios').focus();
            }else{
                $("#remedios").css("border", "1px solid #ccc");
            }
            
            if(alergia2 == undefined){
                $('#mes-aviso24').show();
                alergia = 0;
                erro++;
            }else{
                $('#mes-aviso24').hide("slow");
                if(alergia2 == 1 && alergia2_qual == ""){
                    $("#alergia2_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#alergia2_qual").css("border", "1px solid #ccc");
                } 
            }
            
            if(observacao == undefined){
                observacao = 0;
                $('#mes-aviso26').show();
                erro++;
            }else{
                $('#mes-aviso26').hide("slow");
                if(observacao == 1 && observacao_qual == ""){
                    $("#observacao_qual").css("border", "1px solid #f00");
                    erro++;
                }else{
                     $("#observacao_qual").css("border", "1px solid #ccc");
                } 
            }
                        
            
            if(aceito == false){
                $('#mes-aviso28').show();
                erro++;
            }else{
                $('#mes-aviso28').hide("slow");
                
            }
            
            
            if(erro == 0)
            {
                $('.mes-aviso2').hide("slow");
                $('.alert-info').show();
                
                
                var ajax = openAjax();
                
			ajax.open("GET", "funcoes.php?acao=projeto&nome=" + nome + "&projeto=" + projeto + "&endereco=" + endereco + "&numero=" + numero + "&cidade=" + cidade + "&estado=" + estado + "&telefone=" + telefone + "&celular=" + celular + "&email=" + email + "&nome_ebraico=" + nome_ebraico + "&data_nascimento=" + data_nascimento + "&local=" + local + "&nome_mae=" + nome_mae + "&sobrenome_mae=" + sobrenome_mae + "&nome_pai=" + nome_pai + "&rabino=" + rabino + "&sinagoga=" + sinagoga + "&escola=" + escola + "&instrucao_judaica=" + instrucao_judaica + "&idioma=" + idioma + "&esportes=" + esportes + "&alergia=" + alergia + "&recomendacao=" + recomendacao + "&cep=" + cep + "&apresentado=" + apresentado + "&instituicao=" + instituicao + "&programa=" + prog + "&programa2=" + prog2 + "&programa3=" + prog3 + "&programa_ano=" + programa_ano + "&programa_ano2=" + programa_ano2 + "&programa_ano3=" + programa_ano3 + "&seguro_medico=" + seguro_medico + "&nenhum=" + nem + "&problema_saude=" + problema_saude + "&problema_saude_qual=" + problema_saude_qual + "&deficiencia=" + deficiencia + "&deficiencia_qual=" + deficiencia_qual + "&tratamento=" + tratamento + "&tratamento_qual=" + tratamento_qual + "&internado=" + internado + "&bronquite=" + bronquite + "&convulsoes=" + convulsoes + "&sonambolismo=" + sonambolismo + "&beliche=" + beliche + "&esporte=" + esporte + "&esporte_qual=" + esporte_qual + "&mal_atividade=" + mal_atividade + "&mal_atividade_qual=" + mal_atividade_qual + "&vacina_tetanica=" + vacina_tetanica + "&vacina_tetanica_qual=" + vacina_tetanica_qual + "&tipo_sanguineo=" + tipo_sanguineo + "&fator_rh=" + fator_rh + "&remedios=" + remedios + "&alergia2=" + alergia2 + "&alergia2_qual=" + alergia2_qual + "&observacao=" + observacao + "&observacao_qual=" + observacao_qual + "&bairro=" + bairro + "&nome_medico=" + nome_medico + "&telefone_medico=" + telefone_medico + "&celular_medico=" + celular_medico, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                                                          
                                                
                                                $('.alert-info').hide("slow");
                                                location.href="sucesso-projeto";
                                                                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }else{
                $('.mes-aviso2').show();
            }
       
               
            
	}
        }
        
function enviarSeminario(){

	if(document.getElementById){
            
            var nome = $('#nome').val();
            var cep = $('#cep').val();
            var endereco = $('#endereco').val();
            var numero = $('#numero').val();
            var cidade = $('#cidade').val();
            var estado = $('#estado').val();
            var telefone = $('#telefone').val();
            var celular = $('#celular').val();
            var email = $('#email').val();
            var data_nascimento = $('#data_nascimento').val();
            var rg = $('#rg').val();
            var local = $('#local').val();
            var nome_mae = $('#nome_mae').val();
            var sobrenome_mae = $('#sobrenome_mae').val();
            var nome_pai = $('#nome_pai').val();
            var escola = $('#escola').val();
            var recomendacao = $('#recomendacao').val();
            var medicamento = $('#medicamento').val();
            var apresentado = $('#apresentado').val();
            var instituicao = $('#instituicao').val();
            var erro = 0;
            var txt = email;
            
            if(nome == ""){
                $("#nome").css("border", "1px solid #f00");
                erro++;
                $('#nome').focus();
            }else{
                $("#nome").css("border", "1px solid #ccc");
            }
            
            if(cep == ""){
                $("#cep").css("border", "1px solid #f00");
                erro++;
                $('#cep').focus();
            }else{
                $("#cep").css("border", "1px solid #ccc");
            }
            
            if(endereco == ""){
                $("#endereco").css("border", "1px solid #f00");
                erro++;
                $('#endereco').focus();
            }else{
                $("#endereco").css("border", "1px solid #ccc");
            }
            
            if(numero == ""){
                $("#numero").css("border", "1px solid #f00");
                erro++;
                $('#numero').focus();
            }else{
                $("#numero").css("border", "1px solid #ccc");
            }
            
            if(cidade == ""){
                $("#cidade").css("border", "1px solid #f00");
                erro++;
                $('#cidade').focus();
            }else{
                $("#cidade").css("border", "1px solid #ccc");
            }
            
            if(estado == ""){
                $("#estado").css("border", "1px solid #f00");
                erro++;
                $('#estado').focus();
            }else{
                $("#estado").css("border", "1px solid #ccc");
            }
            
            if(telefone == ""){
                $("#telefone").css("border", "1px solid #f00");
                erro++;
                $('#telefone').focus();
            }else{
                $("#telefone").css("border", "1px solid #ccc");
            }
            
            if(celular == ""){
                $("#celular").css("border", "1px solid #f00");
                erro++;
                $('#celular').focus();
            }else{
                $("#celular").css("border", "1px solid #ccc");
            }
            
            if(email == ""){
                $("#email").css("border", "1px solid #f00");
                erro++;
                $('#email').focus();
            }else{
                if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
                {
                    erro++;
                    $('#mes-aviso2').show();
                    $('#email').focus();
                }else{
                    $('#mes-aviso2').hide("slow");
                }                
                $("#email").css("border", "1px solid #ccc");
            }
           
            if(data_nascimento == ""){
                $("#data_nascimento").css("border", "1px solid #f00");
                erro++;
                $('#data_nascimento').focus();
            }else{                
                
                if(isDate(data_nascimento)){
                        $("#data_nascimento").css("border", "1px solid #ccc");     
                        $('#mes-aviso3').hide("slow");
                    }else{
                        erro++;
                        $('#mes-aviso3').show();
                        $('#data_nascimento').focus();
                 };
                
            }
            
             
            
            if(rg == ""){
                $("#rg").css("border", "1px solid #f00");
                erro++;
                $('#rg').focus();
            }else{
                $("#rg").css("border", "1px solid #ccc");
            }
            
            if(local == ""){
                $("#local").css("border", "1px solid #f00");
                erro++;
                $('#local').focus();
            }else{
                $("#local").css("border", "1px solid #ccc");
            }
            
            if(nome_mae == ""){
                $("#nome_mae").css("border", "1px solid #f00");
                erro++;
                $('#nome_mae').focus();
            }else{
                $("#nome_mae").css("border", "1px solid #ccc");
            }
            
            if(sobrenome_mae == ""){
                $("#sobrenome_mae").css("border", "1px solid #f00");
                erro++;
                $('#sobrenome_mae').focus();
            }else{
                $("#sobrenome_mae").css("border", "1px solid #ccc");
            }
            
            if(nome_pai == ""){
                $("#nome_pai").css("border", "1px solid #f00");
                erro++;
                $('#nome_pai').focus();
            }else{
                $("#nome_pai").css("border", "1px solid #ccc");
            }
            
            if(escola == ""){
                $("#escola").css("border", "1px solid #f00");
                erro++;
                $('#escola').focus();
            }else{
                $("#escola").css("border", "1px solid #ccc");
            }
            
            if(recomendacao == ""){
                $("#recomendacao").css("border", "1px solid #f00");
                erro++;
                $('#recomendacao').focus();
            }else{
                $("#recomendacao").css("border", "1px solid #ccc");
            }
            
            if(medicamento == ""){
                $("#medicamento").css("border", "1px solid #f00");
                erro++;
                $('#medicamento').focus();
            }else{
                $("#medicamento").css("border", "1px solid #ccc");
            }
            
            if(apresentado == ""){
                $("#apresentado").css("border", "1px solid #f00");
                erro++;
                $('#apresentado').focus();
            }else{
                $("#apresentado").css("border", "1px solid #ccc");
            }
            
            if(instituicao == ""){
                $("#instituicao").css("border", "1px solid #f00");
                erro++;
                $('#instituicao').focus();
            }else{
                $("#instituicao").css("border", "1px solid #ccc");
            }
            
            if(erro == 0)
            {
                $('.mes-aviso2').hide("slow");
                $('.alert-info').show();
                
                
                var ajax = openAjax();
                
			ajax.open("GET", "funcoes.php?acao=seminario&nome=" + nome + "&endereco=" + endereco + "&numero=" + numero + "&cidade=" + cidade + "&estado=" + estado + "&telefone=" + telefone + "&celular=" + celular + "&email=" + email + "&data_nascimento=" + data_nascimento + "&rg=" + rg + "&local=" + local + "&nome_mae=" + nome_mae + "&sobrenome_mae=" + sobrenome_mae + "&nome_pai=" + nome_pai + "&escola=" + escola + "&recomendacao=" + recomendacao + "&medicamento=" + medicamento + "&apresentado=" + apresentado + "&instituicao=" + instituicao + "&cep=" + cep, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                location.href="sucesso-seminario";
                                                                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }else{
                $('.mes-aviso2').show();
            }
       
               
            
	}
        }
        
function enviarPagamento(){

	if(document.getElementById){
            
            var projeto = $('#projeto').val();  
            var nome = $('#nome').val();            
            var telefone = $('#telefone').val();
            var email = $('#email').val();
            var cpf = $('#cpf').val();
            var referente = $('#referente').val();
            var valor = $('#valor').val();
            
            var erro = 0;
            var txt = email;
            
            if(projeto == ""){
                $("#projeto").css("border", "1px solid #f00");
                erro++;
                $('#projeto').focus();
            }else{
                $("#projeto").css("border", "1px solid #ccc");
            }
            
            if(nome == ""){
                $("#nome").css("border", "1px solid #f00");
                erro++;
                $('#nome').focus();
            }else{
                $("#nome").css("border", "1px solid #ccc");
            }
                       
            if(telefone == ""){
                $("#telefone").css("border", "1px solid #f00");
                erro++;
                $('#telefone').focus();
            }else{
                $("#telefone").css("border", "1px solid #ccc");
            }
                        
            if(email == ""){
                $("#email").css("border", "1px solid #f00");
                erro++;
                $('#email').focus();
            }else{
                if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
                {
                    erro++;
                    $('#mes-aviso2').show();
                    $('#email').focus();
                }else{
                    $('#mes-aviso2').hide("slow");
                }                
                $("#email").css("border", "1px solid #ccc");
            }
            
            if(cpf == ""){
                $("#cpf").css("border", "1px solid #f00");
                erro++;
                $('#cpf').focus();
            }else{
                
                if(verificarCPF(cpf) == 0){
                    erro++;
                    $('#mes-aviso4').show();
                    $('#cpf').focus();
                }else{
                    $('#mes-aviso4').hide("slow");
                    $("#cpf").css("border", "1px solid #ccc");
                }
                
                
            }
            
            if(referente == ""){
                $("#referente").css("border", "1px solid #f00");
                erro++;
                $('#referente').focus();
            }else{
                $("#referente").css("border", "1px solid #ccc");
            }
            
            if(valor == ""){
                $("#valor").css("border", "1px solid #f00");
                erro++;
                $('#valor').focus();
            }else{
                $("#valor").css("border", "1px solid #ccc");
            }
            
            if(erro == 0)
            {
                
                $('.alert-info').show();
                
                
                var ajax = openAjax();
                
			ajax.open("GET", "funcoes.php?acao=pagamento&nome=" + nome + "&projeto=" + projeto + "&telefone=" + telefone + "&email=" + email + "&cpf=" + cpf + "&referente=" + referente + "&valor=" + valor, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                $('#nome').val('');                                                
                                                $('#telefone').val('');                                                
                                                $('#email').val('');
                                                $('#cpf').val('');
                                                $('#referente').val('');
                                                $('#valor').val('');
                                                
                                                $('.alert-info').hide("slow");
                                                location.href="sucesso";                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }
       
               
            
	}
        }
        
        
        function ativa(campo){
          
            if(campo == 1){
                var programa = $('#programa').is(':checked');
                
                if(programa == true){
                    document.getElementById('programa_ano').disabled=0;
                }else{
                    document.getElementById('programa_ano').disabled=1;
                    document.getElementById('programa_ano').value = '';
                }
                
            }else{
                var programa = $('#programa'+campo).is(':checked');
                if(programa == true){
                    document.getElementById('programa_ano'+campo).disabled=0;
                }else{
                    document.getElementById('programa_ano'+campo).disabled=1;
                    document.getElementById('programa_ano'+campo).value = '';
                }
                
            } 
          
        }
        
        function verificaCheck(){
         
            var programa = $('#nenhum').is(':checked');
            
            if(programa == true){
                document.getElementById('programa').disabled=1;
                document.getElementById('programa2').disabled=1;
                document.getElementById('programa3').disabled=1;
                $("#programa").prop("checked", false);
                $("#programa2").prop("checked", false);
                $("#programa3").prop("checked", false);
                document.getElementById('programa_ano').value = '';
                document.getElementById('programa_ano2').value = '';
                document.getElementById('programa_ano3').value = '';
                
            }else{
                document.getElementById('programa').disabled=0;
                document.getElementById('programa2').disabled=0;
                document.getElementById('programa3').disabled=0;
            }
            
          
        }