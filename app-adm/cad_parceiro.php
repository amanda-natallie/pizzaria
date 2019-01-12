<?php require("header.php");
if(isset($_POST['bt_save_df']))
{
    
    $uploaddir = '../midias/imagens/';
    $pastadestino = 'midias/imagens/';
    $dividir2 = end(explode(".", $_FILES['imagem1']['name']));
    $nome = time();
    $nome_imagem2 = $nome . '1.' . $dividir2;
    $uploadfile = $uploaddir . $nome . '1.' . $dividir2;
    if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $uploaddir . $nome_imagem2)) { }
    $img1 = $pastadestino.$nome_imagem2;    
        
    $sql = 'INSERT INTO tbl_parceiros (nome, imagem, link)';
    $sql .= ' VALUES (:titulo, :imagem, :link)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
        $create->bindValue(':link', $_POST['link'], PDO::PARAM_STR);
        $create->bindValue(':imagem', $img1, PDO::PARAM_STR);
              
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_parceiros.php";
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
                                <h3><i class="icon-reorder"></i> Cadastro de Parceiros</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_parceiro.php" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">   
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="titulo" id="titulo" class="input-xlarge" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="link">Link:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="link" id="link" class="input-xlarge" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label">Imagem:</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
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
                                        <a href="ger_parceiros.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>