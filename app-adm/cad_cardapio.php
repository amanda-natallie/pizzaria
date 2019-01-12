<?php require("header.php");
if(isset($_POST['bt_save_df']))
{    
    
    if(isset($_FILES['imagem1']['name']) && $_FILES['imagem1']['name'] != "")
    {
        $uploaddir = '../midias/imagens/';
        $pastadestino = 'midias/imagens/';
        $dividir2 = end(explode(".", $_FILES['imagem1']['name']));
        $nome = time();
        $nome_imagem2 = $nome . '1.' . $dividir2;
        $uploadfile = $uploaddir . $nome . '1.' . $dividir2;
        if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $uploaddir . $nome_imagem2)) {}   
        $img1 = $pastadestino.$nome_imagem2;
        
    }  else {
        $img1 = "";
    }
    
    $sql = 'INSERT INTO tbl_produtos (titulo, resumo, subtitulo, texto, imagem, keywords, valor, categoria, novidade, tipo)';
    $sql .= ' VALUES (:titulo, :resumo, :subtitulo, :texto, :imagem, :keywords, :valor, :categoria, :novidade, :tipo)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':titulo', $_POST['nome'], PDO::PARAM_STR);
        $create->bindValue(':resumo', $_POST['resumo'], PDO::PARAM_STR);
        $create->bindValue(':subtitulo', $_POST['subtitulo'], PDO::PARAM_STR);
        $create->bindValue(':texto', $_POST['texto'], PDO::PARAM_STR);
        $create->bindValue(':keywords', $_POST['keywords'], PDO::PARAM_STR);
        $create->bindValue(':valor', $_POST['valor'], PDO::PARAM_STR);
        $create->bindValue(':categoria', $_POST['categoria'], PDO::PARAM_STR);
        $create->bindValue(':novidade', $_POST['novidade'], PDO::PARAM_STR);
        $create->bindValue(':tipo', $_POST['tipo'], PDO::PARAM_STR);
        $create->bindValue(':imagem', $img1, PDO::PARAM_STR);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                   location.href="ger_cardapio.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
    }
}

?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i> Cadastro de Produto</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_cardapio.php" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">   
                                    <div class="control-group">
                                        <label for="select" class="control-label">Tipo de Produto:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="tipo" id="tipo" data-rule-required="true">
                                                <option value="">-- Selecione uma Opção --</option>
                                                <option value="1">Pizza</option>
                                                <option value="0">Outro</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="select" class="control-label">Categoria:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="categoria" id="categoria" data-rule-required="true">
                                                <option value="">-- Selecione uma Categoria --</option>
                                                <?php 
                                                    $sql2 = 'SELECT * FROM tbl_categorias ORDER BY categoria ASC';         
                                                    try{

                                                        $read2 = $db->prepare($sql2);
                                                        $read2->execute();

                                                    } catch (PDOException $ex) {
                                                        echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                    }

                                                    while($rs2 = $read2->fetch(PDO::FETCH_OBJ))
                                                    {
                                                                                                                
                                                        echo '<option value="'.$rs2->id.'">'.$rs2->categoria.'</option>';
                                                    }
                                                    ?>
    						
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label for="select" class="control-label">Novidade:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="novidade" id="novidade" data-rule-required="true">
                                                <option value="">-- Selecione uma Opção --</option>
                                                <option value="1">Sim</option>
                                                <option value="0">Não</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Nome do Produto:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="nome" id="nome" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Resumo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="resumo" id="resumo" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Subtitulo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="subtitulo" id="subtitulo" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label">Texto:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor"rows="3" name="texto" id="texto"></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Keywords:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="keywords" id="keywords" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Valor:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="valor" id="preco" placeholder="0.00" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="control-group">
                                      <label class="control-label">Imagem:</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="img/imagem.png" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                               <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem</span>
                                               <span class="fileupload-exists">Alterar</span>
                                               <input type="file" class="default" name="imagem1" id="imagem1" /></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                                       
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_save_df" value="Salvar">
                                        <a href="ger_cardapio.php"><button type="button" class="btn">Voltar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">$("#preco").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'', decimal:'.', affixesStay: false});</script>
<?php require("footer.php");?>