<?php require("header.php");

if(isset($_POST['bt_save_df']))
{
            
    $uploaddir = '../midias/imagens/';
    $pastadestino = 'midias/imagens/';
    $dividir2 = end(explode(".", $_FILES['imagem1']['name']));
    $nome = time();
    $nome_imagem2 = $nome . '1.' . $dividir2;
    $uploadfile = $uploaddir . $nome . '1.' . $dividir2;
    if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $uploaddir . $nome_imagem2)) {}   
    $img1 = $pastadestino.$nome_imagem2;
    
        
    $sql = 'INSERT INTO tbl_depoimentos (nome, imagem, resumo, descricao)';
    $sql .= ' VALUES (:nome, :imagem, :resumo, :descricao)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':nome', $_POST['titulo'], PDO::PARAM_STR);
        $create->bindValue(':imagem', $img1, PDO::PARAM_STR);
        $create->bindValue(':resumo', $_POST['resumo'], PDO::PARAM_STR);
        $create->bindValue(':descricao', $_POST['texto'], PDO::PARAM_STR);
              
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_depoimentos.php";
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
                                <h3><i class="icon-reorder"></i> Cadastro de Depoimentos</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_depoimento.php" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">   
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="titulo" id="titulo" class="input-xlarge" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Resumo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="resumo" id="resumo" class="input-xlarge" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label">Depoimento:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor" rows="10" name="texto" id="texto"></textarea>
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
                                               <input type="file" class="default" name="imagem1" id="imagem1" data-rule-required="true"   /></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                         </div>
                                         
                                      </div>
                                   </div>
                                    
                                                                                                           
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_save_df" value="Salvar">
                                        <a href="ger_depoimentos.php"><button type="button" class="btn">Voltar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>