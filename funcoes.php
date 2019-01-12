<?php session_start(); 

if (isset($_GET['pag'])) {
    $pag = $_GET['pag'];
} else {
    $pag = 1;
} 

require("app-adm/config.php");
    if(isset($_GET['acao'])){
        
        require_once('phpmailer/class.phpmailer.php');
        $acao = $_GET['acao']; 

        if($acao == "newsletter")
        {
           $email = $_GET['email'];
           $nome = $_GET['nome'];

            $sql = 'SELECT * FROM tbl_newsletter WHERE email = :email';   

            try{

                $read = $db->prepare($sql);
                $read->bindParam(':email', $email, PDO::PARAM_STR);
                $read->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
            }
            $todos = 0;
            while($rs = $read->fetch(PDO::FETCH_OBJ))
            {
                $todos++;
            }

            if($todos == 0){
            $nome = $_GET['nome'];
            $email = $_GET['email'];
            $sql = 'INSERT INTO tbl_newsletter (nome, email)';
            $sql .= ' VALUES (:nome, :email)';

            try{

                $create = $db->prepare($sql);
                $create->bindValue(':nome', $nome, PDO::PARAM_STR);
                $create->bindValue(':email', $email, PDO::PARAM_STR);
                if($create->execute() ){

                }


            } catch (PDOException $e) {
                    echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
            }

         }
        }
        
        if($acao == "projeto")
        {           
            $data = explode('/',$_GET['data_nascimento']);
            $data = $data[2] . '-' . $data[1] . '-' . $data[0];
            
            $sql2 = 'SELECT * FROM tbl_galerias WHERE id = :id';   

            try{

                $read2 = $db->prepare($sql2);
                $read2->bindParam(':id', $_GET['projeto'], PDO::PARAM_STR);
                $read2->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
            }
            $rs2 = $read2->fetch(PDO::FETCH_OBJ);
            

            $sql = 'INSERT INTO tbl_inscricoes_projetos(projeto, nome, endereco, cep, numero, estado, bairro, cidade, telefone, celular, email, nome_ebraico, data_nascimento, local, nome_mae, nome_pai, sinagoga, rabino, sobrenome_mae_solteira, escola, instrucao_judaica, idioma, esportes, recomendacao_medica, alergia, apresentado, frequenta_instituicao, programa, ano_programa, programa2, ano_programa2, programa3, ano_programa3, nenhum_programa, concordar, status, seguro_medico, problema_saude, problema_saude_qual, deficiencia, deficiencia_qual, tratamento, tratamento_qual, internado, bronquite, convulsoes, sonambolismo, beliche, esporte, esporte_qual, mal_atividade, mal_atividade_qual, vacina_tetanica, vacina_tetanica_qual, tipo_sanguineo, fator_rh, remedios, alergia2, alergia2_qual, observacao, observacao_qual, data_cadastro, hora_cadastro, nome_medico, telefone_medico, celular_medico)';
            $sql .= ' VALUES (:projeto, :nome, :endereco, :cep, :numero, :estado, :bairro, :cidade, :telefone, :celular, :email, :nome_ebraico, :data_nascimento, :local, :nome_mae, :nome_pai, :sinagoga, :rabino, :sobrenome_mae_solteira, :escola, :instrucao_judaica, :idioma, :esportes, :recomendacao_medica, :alergia, :apresentado, :frequenta_instituicao, :programa, :ano_programa, :programa2, :ano_programa2, :programa3, :ano_programa3, :nenhum_programa, :concordar, :status, :seguro_medico, :problema_saude, :problema_saude_qual, :deficiencia, :deficiencia_qual, :tratamento, :tratamento_qual, :internado, :bronquite, :convulsoes, :sonambolismo, :beliche, :esporte, :esporte_qual, :mal_atividade, :mal_atividade_qual, :vacina_tetanica, :vacina_tetanica_qual, :tipo_sanguineo, :fator_rh, :remedios, :alergia2, :alergia2_qual, :observacao, :observacao_qual, :data_cadastro, :hora_cadastro, :nome_medico, :telefone_medico, :celular_medico)';

            try{
                $create = $db->prepare($sql);
                $create->bindValue(':projeto', $_GET['projeto'], PDO::PARAM_STR);
                $create->bindValue(':nome', $_GET['nome'], PDO::PARAM_STR);
                $create->bindValue(':endereco', $_GET['endereco'], PDO::PARAM_STR);
                $create->bindValue(':cep', $_GET['cep'], PDO::PARAM_STR);
                $create->bindValue(':numero', $_GET['numero'], PDO::PARAM_STR);
                $create->bindValue(':estado', $_GET['estado'], PDO::PARAM_STR);
                $create->bindValue(':bairro', $_GET['bairro'], PDO::PARAM_STR);
                $create->bindValue(':cidade', $_GET['cidade'], PDO::PARAM_STR);
                $create->bindValue(':telefone', $_GET['telefone'], PDO::PARAM_STR);
                $create->bindValue(':celular', $_GET['celular'], PDO::PARAM_STR);
                $create->bindValue(':email', $_GET['email'], PDO::PARAM_STR);
                $create->bindValue(':nome_ebraico', $_GET['nome_ebraico'], PDO::PARAM_STR);
                $create->bindValue(':data_nascimento', $data, PDO::PARAM_STR);
                $create->bindValue(':local', $_GET['local'], PDO::PARAM_STR);
                $create->bindValue(':nome_mae', $_GET['nome_mae'], PDO::PARAM_STR);
                $create->bindValue(':nome_pai', $_GET['nome_pai'], PDO::PARAM_STR);
                $create->bindValue(':rabino', $_GET['rabino'], PDO::PARAM_STR);
                $create->bindValue(':sinagoga', $_GET['sinagoga'], PDO::PARAM_STR);
                $create->bindValue(':sobrenome_mae_solteira', $_GET['sobrenome_mae'], PDO::PARAM_STR);
                $create->bindValue(':escola', $_GET['escola'], PDO::PARAM_STR);
                $create->bindValue(':instrucao_judaica', $_GET['instrucao_judaica'], PDO::PARAM_STR);
                $create->bindValue(':idioma', $_GET['idioma'], PDO::PARAM_STR);
                $create->bindValue(':esportes', $_GET['esportes'], PDO::PARAM_STR);
                $create->bindValue(':recomendacao_medica', $_GET['recomendacao'], PDO::PARAM_STR);
                $create->bindValue(':alergia', $_GET['alergia'], PDO::PARAM_STR);
                $create->bindValue(':apresentado', $_GET['apresentado'], PDO::PARAM_STR);
                $create->bindValue(':frequenta_instituicao', $_GET['instituicao'], PDO::PARAM_STR);
                $create->bindValue(':programa', $_GET['programa'], PDO::PARAM_STR);
                $create->bindValue(':ano_programa', $_GET['programa_ano'], PDO::PARAM_STR);
                $create->bindValue(':programa2', $_GET['programa2'], PDO::PARAM_STR);
                $create->bindValue(':ano_programa2', $_GET['programa_ano2'], PDO::PARAM_STR);
                $create->bindValue(':programa3', $_GET['programa3'], PDO::PARAM_STR);
                $create->bindValue(':ano_programa3', $_GET['programa_ano3'], PDO::PARAM_STR);
                $create->bindValue(':nenhum_programa', $_GET['nenhum'], PDO::PARAM_STR);
                $create->bindValue(':concordar', 1, PDO::PARAM_STR);
                $create->bindValue(':status', 'PENDENTE', PDO::PARAM_STR);
                $create->bindValue(':seguro_medico', $_GET['seguro_medico'], PDO::PARAM_STR);
                $create->bindValue(':problema_saude', $_GET['problema_saude'], PDO::PARAM_STR);
                $create->bindValue(':problema_saude_qual', $_GET['problema_saude_qual'], PDO::PARAM_STR);
                $create->bindValue(':deficiencia', $_GET['deficiencia'], PDO::PARAM_STR);
                $create->bindValue(':deficiencia_qual', $_GET['deficiencia_qual'], PDO::PARAM_STR);
                $create->bindValue(':tratamento', $_GET['tratamento'], PDO::PARAM_STR);
                $create->bindValue(':tratamento_qual', $_GET['tratamento_qual'], PDO::PARAM_STR);
                $create->bindValue(':internado', $_GET['internado'], PDO::PARAM_STR);
                $create->bindValue(':bronquite', $_GET['bronquite'], PDO::PARAM_STR);
                $create->bindValue(':convulsoes', $_GET['convulsoes'], PDO::PARAM_STR);
                $create->bindValue(':sonambolismo', $_GET['sonambolismo'], PDO::PARAM_STR);
                $create->bindValue(':beliche', $_GET['beliche'], PDO::PARAM_STR);
                $create->bindValue(':esporte', $_GET['esporte'], PDO::PARAM_STR);
                $create->bindValue(':esporte_qual', $_GET['esporte_qual'], PDO::PARAM_STR);
                $create->bindValue(':mal_atividade', $_GET['mal_atividade'], PDO::PARAM_STR);
                $create->bindValue(':mal_atividade_qual', $_GET['mal_atividade_qual'], PDO::PARAM_STR);
                $create->bindValue(':vacina_tetanica', $_GET['vacina_tetanica'], PDO::PARAM_STR);
                $create->bindValue(':vacina_tetanica_qual', $_GET['vacina_tetanica_qual'], PDO::PARAM_STR);
                $create->bindValue(':tipo_sanguineo', $_GET['tipo_sanguineo'], PDO::PARAM_STR);
                $create->bindValue(':fator_rh', $_GET['fator_rh'], PDO::PARAM_STR);
                $create->bindValue(':remedios', $_GET['remedios'], PDO::PARAM_STR);
                $create->bindValue(':alergia2', $_GET['alergia2'], PDO::PARAM_STR);
                $create->bindValue(':alergia2_qual', $_GET['alergia2_qual'], PDO::PARAM_STR);
                $create->bindValue(':observacao', $_GET['observacao'], PDO::PARAM_STR);
                $create->bindValue(':observacao_qual', $_GET['observacao_qual'], PDO::PARAM_STR);
                $create->bindValue(':data_cadastro', date('Y-m-d'), PDO::PARAM_STR);
                $create->bindValue(':hora_cadastro', date('H:m:s'), PDO::PARAM_STR);
                $create->bindValue(':nome_medico', $_GET['nome_medico'], PDO::PARAM_STR);
                $create->bindValue(':telefone_medico', $_GET['telefone_medico'], PDO::PARAM_STR);
                $create->bindValue(':celular_medico', $_GET['celular_medico'], PDO::PARAM_STR);
                if($create->execute() ){
                    

                }


            } catch (PDOException $e) {
                    echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
            }
            
            $sql = 'SELECT * FROM tbl_contato ORDER BY id DESC'; 
            try{ $read = $db->prepare($sql); $read->execute(); } catch (PDOException $ex) { echo 'Erro ao Buscar Dados! - ' . $ex->getMessage(); }
            while($rs = $read->fetch(PDO::FETCH_OBJ)) { $id = $rs->id; $nome_contato[$id] = $rs->tipo; $contato[$id] = $rs->texto; }
            $emaildestinatario = $contato[14];
            
            if($_GET['problema_saude'] == 0){ $problema_saude = 'Não'; }else{ $problema_saude = 'Sim';}
            if($_GET['deficiencia'] == 0){ $deficiencia = 'Não'; }else{ $deficiencia = 'Sim';}
            if($_GET['tratamento'] == 0){ $tratamento = 'Não'; }else{ $tratamento = 'Sim';}
            if($_GET['internado'] == 0){ $internado = 'Não'; }else{ $internado = 'Sim';}
            if($_GET['bronquite'] == 0){ $bronquite = 'Não'; }else{ $bronquite = 'Sim';}
            if($_GET['convulsoes'] == 0){ $convulsoes = 'Não'; }else{ $convulsoes = 'Sim';}
            if($_GET['sonambolismo'] == 0){ $sonambolismo = 'Não'; }else{ $sonambolismo = 'Sim';}
            if($_GET['beliche'] == 0){ $beliche = 'Não'; }else{ $beliche = 'Sim';}
            if($_GET['esporte'] == 0){ $esporte = 'Não'; }else{ $esporte = 'Sim';}
            if($_GET['mal_atividade'] == 0){ $mal_atividade = 'Não'; }else{ $mal_atividade = 'Sim';}
            if($_GET['vacina_tetanica'] == 0){ $vacina_tetanica = 'Não'; }else{ $vacina_tetanica = 'Sim';}
            if($_GET['remedios'] == 0){ $remedios = 'Não'; }else{ $remedios = 'Sim';}
            if($_GET['alergia2'] == 0){ $alergia2 = 'Não'; }else{ $alergia2 = 'Sim';}
            if($_GET['observacao'] == 0){ $observacao = 'Não'; }else{ $observacao = 'Sim';}
            if($_GET['programa'] == 0){ $programa = 'Não'; }else{ $programa = 'Sim';}
            if($_GET['programa2'] == 0){ $programa2 = 'Não'; }else{ $programa2 = 'Sim';}
            if($_GET['programa3'] == 0){ $programa3 = 'Não'; }else{ $programa3 = 'Sim';}
            
            
            
            $conteudo = '<html>
                                <head>
                                    <meta charset="UTF-8">
                                </head>
                               <body style=" border: 0; margin: 0;">
                               <table width="650" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #999999; background: #EEEEEE;">
                                 <tr style=" height: 30px; background: '.$cor_email.'; color: #fff; font-size: 20px; font-family: verdana; text-align: center;  ">
                                       <td>
                                          Inscrição de Projeto
                                       </td>
                                 </tr>
                                 <tr>
                                   <td>
                                       <table width="90%" border="0" cellspacing="15" cellpadding="15" style=" background: #fff; margin-left: 5%; margin-top: 5%; margin-bottom: 5%;" >
                                     <tr>
                                       <td>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong><b>DADOS PESSOAIS</b></p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Projeto:</strong> '.$rs2->nome.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome:</strong> '.$_GET['nome'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>CEP:</strong> '.$_GET['cep'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Endereço:</strong> '.$_GET['endereco'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Numero:</strong> '.$_GET['numero'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Cidade:</strong> '.$_GET['cidade'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Bairro:</strong> '.$_GET['bairro'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Estado:</strong> '.$_GET['estado'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Telefone:</strong> '.$_GET['telefone'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Celular:</strong> '.$_GET['celular'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Email:</strong> '.$_GET['email'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome em Hebraico:</strong> '.$_GET['nome_ebraico'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Data de Nascimento:</strong> '.$_GET['data_nascimento'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Local:</strong> '.$_GET['local'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome da Mãe:</strong> '.$_GET['nome_mae'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome do Pai:</strong> '.$_GET['nome_pai'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Sobrenome de solteira da mãe:</strong> '.$_GET['sobrenome_mae'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Sinagoga onde casaram:</strong> '.$_GET['sinagoga'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Que rabino os casou:</strong> '.$_GET['rabino'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Escola / Faculdade (onde estuda):</strong> '.$_GET['escola'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Instrução Judaica:</strong> '.$_GET['instrucao_judaica'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Fala algum idioma:</strong> '.$_GET['idioma'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Esportes que pratica:</strong> '.$_GET['esportes'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Alguma recomendação médica:</strong> '.$_GET['recomendacao'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Alergia a alguma medicamento:</strong> '.$_GET['alergia'].' </p>
                                         <br />
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong><b>DADOS COMPLEMENTARES</b></p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Apresentado por:</strong> '.$_GET['apresentado'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Frequenta alguma instituição:</strong> '.$_GET['instituicao'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong><b>Programas que participou (informe o ano)</b></p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>TAGLIT:</strong> '.$programa.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Ano:</strong> '.$_GET['programa_ano'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>MARCHA DA VIDA:</strong> '.$programa2.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Ano:</strong> '.$_GET['programa_ano2'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>ALICERCES:</strong> '.$programa3.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Ano:</strong> '.$_GET['programa_ano3'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nenhum:</strong> '.$_GET['nenhum'].' </p>
                                         <br />
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong><b>FICHA MÉDICA</b></p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Seguro Médico (Nome / Número / Validade):</strong> '.$_GET['seguro_medico'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome do Médico:</strong> '.$_GET['nome_medico'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Telefone do Médico:</strong> '.$_GET['telefone_medico'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Celular do Médico:</strong> '.$_GET['celular_medico'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Possui algum problema de saúde:</strong> '.$problema_saude.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qual:</strong> '.$_GET['problema_saude_qual'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Possui algum deficiência física:</strong> '.$deficiencia.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qal:</strong> '.$_GET['deficiencia_qual'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Está realizando algum tratamento:</strong> '.$tratamento.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qal:</strong> '.$_GET['tratamento_qual'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Já foi internado alguma vez em hospital ou clínica:</strong> '.$internado.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Tem bronquite ou asma:</strong> '.$bronquite.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>É propenso à convulsões:</strong> '.$convulsoes.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Apresenta sonambulismo ou sono muito agitado:</strong> '.$sonambolismo.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Pode dormir na parte de cima do beliche:</strong> '.$beliche.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Prática esporte(s):</strong> '.$esporte.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qal:</strong> '.$_GET['esporte_qual'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Apresenta algum mal que, atividade física possa agravar?:</strong> '.$mal_atividade.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qal:</strong> '.$_GET['mal_atividade_qual'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Já tomou vacina anti-tetânica:</strong> '.$vacina_tetanica.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qal:</strong> '.$_GET['vacina_tetanica_qual'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Tipo Sanguíneo:</strong> '.$_GET['tipo_sanguineo'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Fator RH:</strong> '.$_GET['fator_rh'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Em caso de remédios de uso contínuo, relacione os remédios que consome:</strong> '.$remedios.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Possui alergia a alguma medicação ou alimento:</strong> '.$alergia2.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qual:</strong> '.$_GET['alergia2_qual'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Observações Adicionais</strong> '.$observacao.' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Qual:</strong> '.$_GET['observacao_qual'].' </p>
                                       </td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table>

                               </body>
                               </html>';

           $mailer = new PHPMailer();
           $mailer->IsSMTP();
           $mailer->Port = $porta_email;
           $mailer->Host = $host_email;
           $mailer->SMTPAuth = true; 
           $mailer->SMTPSecure = 'ssl';
           $mailer->IsHTML(true);    
           $mailer->CharSet = 'UTF-8';
           $mailer->Username = $rem_email; 
           $mailer->Password = $pass_email; 
           $mailer->FromName = $nome_email; 
           $mailer->From = $rem_email; 
           $mailer->AddAddress($emaildestinatario);
           $mailer->Subject = "Inscrição de Projeto - " . $_GET['nome'];
           $mailer->Body = $conteudo;
           if(!$mailer->Send())
           {
               echo "<b>Informações do erro:</b> " . $mailer->ErrorInfo;

           } else {  }
            
         }
        
        if($acao == "seminario")
        {           
            $data = explode('/',$_GET['data_nascimento']);
            $data = $data[2] . '-' . $data[1] . '-' . $data[0];

            $sql = 'INSERT INTO tbl_inscricoes_seminarios(nome, endereco, cep, numero, cidade, estado, 	telefone, celular, email, data_nascimento, rg, local, nome_mae, nome_pai, sobrenome_mae, escola, recomendacao, medicamento, apresentado, instituicao, data_cadastro, hora_cadastro)';
            $sql .= ' VALUES (:nome, :endereco, :cep, :numero, :cidade, :estado, :telefone, :celular, :email, :data_nascimento, :rg, :local, :nome_mae, :nome_pai, :sobrenome_mae, :escola, :recomendacao, :medicamento, :apresentado, :instituicao, :data_cadastro, :hora_cadastro)';

            try{
                $create = $db->prepare($sql);
                $create->bindValue(':nome', $_GET['nome'], PDO::PARAM_STR);
                $create->bindValue(':endereco', $_GET['endereco'], PDO::PARAM_STR);
                $create->bindValue(':cep', $_GET['cep'], PDO::PARAM_STR);
                $create->bindValue(':numero', $_GET['numero'], PDO::PARAM_STR);
                $create->bindValue(':cidade', $_GET['cidade'], PDO::PARAM_STR);
                $create->bindValue(':estado', $_GET['estado'], PDO::PARAM_STR);
                $create->bindValue(':telefone', $_GET['telefone'], PDO::PARAM_STR);
                $create->bindValue(':celular', $_GET['celular'], PDO::PARAM_STR);
                $create->bindValue(':email', $_GET['email'], PDO::PARAM_STR);
                $create->bindValue(':data_nascimento', $data, PDO::PARAM_STR);
                $create->bindValue(':rg', $_GET['rg'], PDO::PARAM_STR);
                $create->bindValue(':local', $_GET['local'], PDO::PARAM_STR);
                $create->bindValue(':nome_mae', $_GET['nome_mae'], PDO::PARAM_STR);
                $create->bindValue(':nome_pai', $_GET['nome_pai'], PDO::PARAM_STR);
                $create->bindValue(':sobrenome_mae', $_GET['sobrenome_mae'], PDO::PARAM_STR);
                $create->bindValue(':escola', $_GET['escola'], PDO::PARAM_STR);
                $create->bindValue(':recomendacao', $_GET['recomendacao'], PDO::PARAM_STR);
                $create->bindValue(':medicamento', $_GET['medicamento'], PDO::PARAM_STR);
                $create->bindValue(':apresentado', $_GET['apresentado'], PDO::PARAM_STR);
                $create->bindValue(':instituicao', $_GET['instituicao'], PDO::PARAM_STR);
                $create->bindValue(':data_cadastro', date('Y-m-d'), PDO::PARAM_STR);
                $create->bindValue(':hora_cadastro', date('H:m:s'), PDO::PARAM_STR);

                if($create->execute() ){
                    echo 'sucesso';
                }


            } catch (PDOException $e) {
                    echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
            }
            
            $sql = 'SELECT * FROM tbl_contato ORDER BY id DESC'; 
            try{ $read = $db->prepare($sql); $read->execute(); } catch (PDOException $ex) { echo 'Erro ao Buscar Dados! - ' . $ex->getMessage(); }
            while($rs = $read->fetch(PDO::FETCH_OBJ)) { $id = $rs->id; $nome_contato[$id] = $rs->tipo; $contato[$id] = $rs->texto; }
            $emaildestinatario = $contato[13];
            
            $conteudo = '<html>
                                <head>
                                    <meta charset="UTF-8">
                                </head>
                               <body style=" border: 0; margin: 0;">
                               <table width="650" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #999999; background: #EEEEEE;">
                                 <tr style=" height: 30px; background: '.$cor_email.'; color: #fff; font-size: 20px; font-family: verdana; text-align: center;  ">
                                       <td>
                                          Inscrição de Seminário
                                       </td>
                                 </tr>
                                 <tr>
                                   <td>
                                       <table width="90%" border="0" cellspacing="15" cellpadding="15" style=" background: #fff; margin-left: 5%; margin-top: 5%; margin-bottom: 5%;" >
                                     <tr>
                                       <td>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong><b>Dados Pessoais</b></p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome:</strong> '.$_GET['nome'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>CEP:</strong> '.$_GET['cep'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Endereço:</strong> '.$_GET['endereco'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Numero:</strong> '.$_GET['numero'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Cidade:</strong> '.$_GET['cidade'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Estado:</strong> '.$_GET['estado'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Telefone:</strong> '.$_GET['telefone'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Celular:</strong> '.$_GET['celular'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Email:</strong> '.$_GET['email'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Data de Nascimento:</strong> '.$_GET['data_nascimento'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>RG:</strong> '.$_GET['rg'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Local:</strong> '.$_GET['local'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome da Mãe:</strong> '.$_GET['nome_mae'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome do Pai:</strong> '.$_GET['nome_pai'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Sobrenome de solteira da mãe:</strong> '.$_GET['sobrenome_mae'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Escola / Faculdade (onde estuda):</strong> '.$_GET['escola'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Alguma recomendação médica:</strong> '.$_GET['recomendacao'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Alergia a algum medicamento:</strong> '.$_GET['medicamento'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Apresentado por:</strong> '.$_GET['apresentado'].' </p>
                                         <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Frequenta alguma instituição:</strong> '.$_GET['instituicao'].' </p>
                                         </td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table>

                               </body>
                               </html>';

           $mailer = new PHPMailer();
           $mailer->IsSMTP();
           $mailer->Port = $porta_email;
           $mailer->Host = $host_email;
           $mailer->SMTPAuth = true; 
           $mailer->SMTPSecure = 'ssl';
           $mailer->IsHTML(true);    
           $mailer->CharSet = 'UTF-8';
           $mailer->Username = $rem_email; 
           $mailer->Password = $pass_email; 
           $mailer->FromName = $nome_email; 
           $mailer->From = $rem_email; 
           $mailer->AddAddress($emaildestinatario);
           $mailer->Subject = "Inscrição de Seminário - " . $_GET['nome'];
           $mailer->Body = $conteudo;
           if(!$mailer->Send())
           {
               echo "<b>Informações do erro:</b> " . $mailer->ErrorInfo;

           } else {  }
            
         }
         
         if($acao == "pagamento")
        {           
            $telefone = str_replace('_', '', $_GET['telefone']);
            $valor = str_replace('.', '', $_GET['valor']);
            $valor = str_replace(',', '.', $valor);
            
            $sql = 'INSERT INTO tbl_pagamentos(projeto, nome, email, telefone, cpf, referente, valor, data_cadastro, hora_cadastro)';
            $sql .= ' VALUES (:projeto, :nome, :email, :telefone, :cpf, :referente, :valor, :data_cadastro, :hora_cadastro)';

            try{
                $create = $db->prepare($sql);
                $create->bindValue(':projeto', $_GET['projeto'], PDO::PARAM_STR);
                $create->bindValue(':nome', $_GET['nome'], PDO::PARAM_STR);
                $create->bindValue(':email', $_GET['email'], PDO::PARAM_STR);
                $create->bindValue(':telefone', $telefone, PDO::PARAM_STR);
                $create->bindValue(':cpf', $_GET['cpf'], PDO::PARAM_STR);
                $create->bindValue(':referente', $_GET['referente'], PDO::PARAM_STR);
                $create->bindValue(':valor', $valor, PDO::PARAM_STR);
                $create->bindValue(':data_cadastro', date('Y-m-d'), PDO::PARAM_STR);
                $create->bindValue(':hora_cadastro', date('H:m:s'), PDO::PARAM_STR);

                if($create->execute() ){
                   

                }


            } catch (PDOException $e) {
                    echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
            }
            
            $sql2 = 'SELECT * FROM tbl_galerias WHERE id = :id';   

            try{

                $read2 = $db->prepare($sql2);
                $read2->bindParam(':id', $_GET['projeto'], PDO::PARAM_STR);
                $read2->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
            }
            $rs2 = $read2->fetch(PDO::FETCH_OBJ);
            
            $sql = 'SELECT * FROM tbl_contato ORDER BY id DESC'; 
            try{ $read = $db->prepare($sql); $read->execute(); } catch (PDOException $ex) { echo 'Erro ao Buscar Dados! - ' . $ex->getMessage(); }
            while($rs = $read->fetch(PDO::FETCH_OBJ)) { $id = $rs->id; $nome_contato[$id] = $rs->tipo; $contato[$id] = $rs->texto; }
            $emaildestinatario = $contato[12];
            
            $conteudo = '<html>
                             <head>
                                 <meta charset="UTF-8">
                             </head>
                            <body style=" border: 0; margin: 0;">
                            <table width="650" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #999999; background: #EEEEEE;">
                              <tr style=" height: 30px; background: '.$cor_email.'; color: #fff; font-size: 20px; font-family: verdana; text-align: center;  ">
                                    <td>
                                       Mensagem de Pagamento
                                    </td>
                              </tr>
                              <tr>
                                <td>
                                    <table width="90%" border="0" cellspacing="15" cellpadding="15" style=" background: #fff; margin-left: 5%; margin-top: 5%; margin-bottom: 5%;" >
                                  <tr>
                                    <td>
                                      <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Projeto:</strong> '.$rs2->nome.' </p>
                                      <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome:</strong> '.$_GET['nome'].' </p>
                                      <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Telefone:</strong> '.$telefone.' </p>
                                      <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Email:</strong> '.$_GET['email'].' </p>
                                      <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Pagamento Referente:</strong> '.$_GET['referente'].' </p>
                                      <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Valor:</strong> R$'.number_format($valor,2 ,',', '.').' </p>
                                   </td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>

                            </body>
                            </html>';

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Port = $porta_email;
        $mailer->Host = $host_email;
        $mailer->SMTPAuth = true; 
        $mailer->SMTPSecure = 'ssl';
        $mailer->IsHTML(true);    
        $mailer->CharSet = 'UTF-8';
        $mailer->Username = $rem_email; 
        $mailer->Password = $pass_email; 
        $mailer->FromName = $nome_email; 
        $mailer->From = $rem_email; 
        $mailer->AddAddress($emaildestinatario);
        $mailer->Subject = "Mensagem de Pagamento - " . $_GET['nome'];
        $mailer->Body = $conteudo;
        if(!$mailer->Send())
        {
            echo "<b>Informações do erro:</b> " . $mailer->ErrorInfo;

        } else {  }
            
         }
        
        if($acao == "contato")
        {
            
            $sql = 'SELECT * FROM tbl_contato ORDER BY id DESC'; 
            try{ $read = $db->prepare($sql); $read->execute(); } catch (PDOException $ex) { echo 'Erro ao Buscar Dados! - ' . $ex->getMessage(); }
            while($rs = $read->fetch(PDO::FETCH_OBJ)) { $id = $rs->id; $nome_contato[$id] = $rs->tipo; $contato[$id] = $rs->texto; }

            $assunto = $_GET['assunto'];
            $telefone = $_GET['telefone'];
            $email = $_GET['email'];
            $nome = $_GET['nome'];
            $mensagem = $_GET['mensagem'];
            
            $emaildestinatario = $contato[11];
            
            $conteudo = '<html>
                                                     <head>
                                                         <meta charset="UTF-8">
                                                     </head>
                                                    <body style=" border: 0; margin: 0;">
                                                    <table width="650" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #999999; background: #EEEEEE;">
                                                      <tr style=" height: 30px; background: '.$cor_email.'; color: #fff; font-size: 20px; font-family: verdana; text-align: center;  ">
                                                            <td>
                                                               Mensagem de Contato
                                                            </td>
                                                      </tr>
                                                      <tr>
                                                        <td>
                                                            <table width="90%" border="0" cellspacing="15" cellpadding="15" style=" background: #fff; margin-left: 5%; margin-top: 5%; margin-bottom: 5%;" >
                                                          <tr>
                                                            <td>
                                                              <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome:</strong> '.$nome.' </p>
                                                              <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Telefone:</strong> '.$telefone.' </p>
                                                              <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Email:</strong> '.$email.' </p>
                                                              <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Mensagem:</strong> '.$mensagem.' </p>
                                                           </td>
                                                          </tr>
                                                        </table></td>
                                                      </tr>
                                                    </table>

                                                    </body>
                                                    </html>';
                                
                                $mailer = new PHPMailer();
                                $mailer->IsSMTP();
                                $mailer->SMTPDebug = 2;
                                $mailer->Port = $porta_email;
                                $mailer->Host = $host_email;
                                $mailer->SMTPAuth = true; 
                                $mailer->SMTPSecure = 'ssl';
                                $mailer->IsHTML(true);    
                                $mailer->CharSet = 'UTF-8';
                                $mailer->Username = $rem_email; 
                                $mailer->Password = $pass_email; 
                                $mailer->FromName = $nome_email; 
                                $mailer->From = $rem_email; 
                                $mailer->AddAddress($emaildestinatario);
                                $mailer->Subject = "Mensagem de Contato - " . $assunto;
                                $mailer->Body = $conteudo;
                                if(!$mailer->Send())
                                {
                                    echo "<b>Informações do erro:</b> " . $mailer->ErrorInfo;
                                    
                                } else {  }

            
            
         }
         
        
    }else{
        
        $sql = 'SELECT * FROM tbl_imagens ORDER BY id DESC';
        try {$read = $db->prepare($sql);$read->execute();} catch (PDOException $ex) {echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) {$id = $rs->id;$imagem[$id] = $rs->imagem;$imagem_alt[$id] = $rs->alt;$imagem_title[$id] = $rs->title;}        

        $sql = 'SELECT * FROM tbl_textos ORDER BY id DESC';try {$read = $db->prepare($sql);$read->execute();} catch (PDOException $ex) {echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) {$id = $rs->id;$texto[$id] = $rs->texto;$nome[$id] = $rs->nome;}        

        $sql = 'SELECT * FROM tbl_contato ORDER BY id DESC';try {$read = $db->prepare($sql);$read->execute();} catch (PDOException $ex) {echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) {$id = $rs->id;$nome_contato[$id] = $rs->tipo;$contato[$id] = $rs->texto;}       

        $sql = 'SELECT * FROM tbl_seo ORDER BY id DESC';try { $read = $db->prepare($sql); $read->execute(); } catch (PDOException $ex) { echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) { $id = $rs->pagina; $seo_title[$id] = $rs->titulo_site;$seo_keywords[$id] = $rs->keywords;$seo_description[$id] = $rs->description;$seo_titulo_face[$id] = $rs->titulo_face;$seo_url_face[$id] = $rs->url_face;$seo_description_face[$id] = $rs->description_face;}               

        
        $data_atual = date('Y-m-d');

        if($pag == 8)
        {
            $sql_post = 'SELECT * FROM tbl_produtos WHERE id = :id';   

            try{

                $read_post = $db->prepare($sql_post);
                $read_post->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
                $read_post->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
            }

            $rs_post = $read_post->fetch(PDO::FETCH_OBJ);

            $site_imagem = $base . $rs_post->imagem;                        
            $site_title = $rs_post->titulo;                     
            $site_keywords = $rs_post->keywords;                       
            $site_title_face = $rs_post->titulo;                    
            $site_url_face = 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];                        
            $site_description_face = $rs_post->resumo;
            
        }else{

        switch ($pag){
            case 1: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[1]; $site_keywords = $seo_keywords[1]; $site_title_face = $seo_titulo_face[1]; $site_url_face = $seo_url_face[1]; $site_description_face = $seo_description_face[1]; break;}
            case 2: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[2]; $site_keywords = $seo_keywords[2]; $site_title_face = $seo_titulo_face[2]; $site_url_face = $seo_url_face[2]; $site_description_face = $seo_description_face[2]; break;}
            case 3: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[3]; $site_keywords = $seo_keywords[3]; $site_title_face = $seo_titulo_face[3]; $site_url_face = $seo_url_face[3]; $site_description_face = $seo_description_face[3]; break;}
            case 4: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[4]; $site_keywords = $seo_keywords[4]; $site_title_face = $seo_titulo_face[4]; $site_url_face = $seo_url_face[4]; $site_description_face = $seo_description_face[4]; break;}
            case 5: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[5]; $site_keywords = $seo_keywords[5]; $site_title_face = $seo_titulo_face[5]; $site_url_face = $seo_url_face[5]; $site_description_face = $seo_description_face[5]; break;}
            case 6: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[6]; $site_keywords = $seo_keywords[6]; $site_title_face = $seo_titulo_face[6]; $site_url_face = $seo_url_face[6]; $site_description_face = $seo_description_face[6]; break;}
            case 7: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[7]; $site_keywords = $seo_keywords[7]; $site_title_face = $seo_titulo_face[7]; $site_url_face = $seo_url_face[7]; $site_description_face = $seo_description_face[7]; break;}
            case 8: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[8]; $site_keywords = $seo_keywords[8]; $site_title_face = $seo_titulo_face[8]; $site_url_face = $seo_url_face[8]; $site_description_face = $seo_description_face[8]; break;}
            case 9: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[9]; $site_keywords = $seo_keywords[9]; $site_title_face = $seo_titulo_face[9]; $site_url_face = $seo_url_face[9]; $site_description_face = $seo_description_face[9]; break;}
            case 11: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[11]; $site_keywords = $seo_keywords[11]; $site_title_face = $seo_titulo_face[11]; $site_url_face = $seo_url_face[11]; $site_description_face = $seo_description_face[11]; break;}
            default: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[1]; $site_keywords = $seo_keywords[1]; $site_title_face = $seo_titulo_face[1]; $site_url_face = $seo_url_face[1]; $site_description_face = $seo_description_face[1]; break;}
            }            
        }


        setlocale(LC_ALL, 'en_US.UTF8');
        function gerarUrl($str, $replace=array(), $delimiter='-') {
            if( !empty($replace) ) {
                $str = str_replace((array)$replace, ' ', $str);
            }

            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
            $clean = strtolower(trim($clean, '-'));
            $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

            return $clean;
        }
        
        function limpaEnd($str, $replace=array(), $delimiter='+') {
            if( !empty($replace) ) {
                $str = str_replace((array)$replace, ' ', $str);
            }

            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
            $clean = strtolower(trim($clean, '-'));
            $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

            return $clean;
        }

        function gerarData($data) {

            $data = explode('-',$data);

            switch ($data[1])
            {
                case 1: $mes = 'Janeiro'; break;
                case 2: $mes = 'Fevereiro'; break;
                case 3: $mes = 'Março'; break;
                case 4: $mes = 'Abril'; break;
                case 5: $mes = 'Maio'; break;
                case 6: $mes = 'Junho'; break;
                case 7: $mes = 'Julho'; break;
                case 8: $mes = 'Agosto'; break;
                case 9: $mes = 'Setembro'; break;
                case 10: $mes = 'Outubro'; break;
                case 11: $mes = 'Novembro'; break;
                case 12: $mes = 'Dezembro'; break;

            }

            $data2 = $data[2] . ' de ' . $mes . ' de ' . $data[0];

            return $data2;
        }

        $diasemana = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
        $dt = date('Y-m-d');
        $diasemana_numero = date('w', strtotime($dt));

        $data = date('Y-m-d');
        $data = explode("-", $data);

        switch ($data[1]) {
            case 1: $mes = 'Janeiro';
                break;
            case 2: $mes = 'Fevereiro';
                break;
            case 3: $mes = 'Março';
                break;
            case 4: $mes = 'Abril';
                break;
            case 5: $mes = 'Maio';
                break;
            case 6: $mes = 'Junho';
                break;
            case 7: $mes = 'Julho';
                break;
            case 8: $mes = 'Agosto';
                break;
            case 9: $mes = 'Setembro';
                break;
            case 10: $mes = 'Outubro';
                break;
            case 11: $mes = 'Novembro';
                break;
            case 12: $mes = 'Dezembro';
                break;
        }

    }
    
    
    ?>