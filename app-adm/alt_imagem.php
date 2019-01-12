<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    $sql2 = 'UPDATE tbl_imagens SET observacao = :observacao, alt = :alt, title = :title';
    
    if(isset($_FILES['imagem1']['name']) && $_FILES['imagem1']['name'] != "")
    {
        $sql = 'SELECT * FROM tbl_imagens WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);

        $imagem1 = $rs->imagem;	


        if($imagem1 != "")
        {
                unlink("../".$imagem1);	
        }

        $uploaddir = '../midias/imagens/';
        $pastadestino = 'midias/imagens/';
        $dividir2 = end(explode(".", $_FILES['imagem1']['name']));

        // Gera um nome aleatório
        $nome = time();
        $nome_imagem2 = $nome . '1.' . $dividir2;
        $uploadfile = $uploaddir . $nome . '1.' . $dividir2;
        if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $uploaddir . $nome_imagem2)) { }
        $caminho = $uploaddir.$nome_imagem2;
        chmod ("$caminho", 0777);
        $img2 = $pastadestino.$nome_imagem2;
        $sql2 .= ', imagem = :imagem';
    }
    
    $sql2 .= ' WHERE id = :id';
            
    try{

        $create = $db->prepare($sql2);
        $create->bindValue(':observacao', $_POST['texto'], PDO::PARAM_STR);
        $create->bindValue(':alt', $_POST['alt'], PDO::PARAM_STR);
        $create->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        if(isset($_FILES['imagem1']['name']) && $_FILES['imagem1']['name'] != "")
        {   
        $create->bindValue(':imagem', $img2, PDO::PARAM_STR);
        }
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    alert( "Registro Alterado com Sucesso!"); location.href="ger_imagens.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Alterar Registro! - " . $e->getMessage();
    }
}


$sql = 'SELECT * FROM tbl_imagens WHERE id = :id';   

try{

    $read = $db->prepare($sql);
    $read->bindParam(':id', $id, PDO::PARAM_STR);
    $read->execute();

} catch (PDOException $ex) {
    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
}

$rs = $read->fetch(PDO::FETCH_OBJ);
	?>     
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i> Alteração de Imagens do Site</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="alt_imagem.php" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                     <div class="control-group">
                                      <label class="control-label">Imagem</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="<?php echo "../" . $rs->imagem ?>" alt="" />
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
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Title:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="title" id="title" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" value="<?php echo $rs->title ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Alt:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="alt" id="alt" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" value="<?php echo $rs->alt ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label">Observação:</label>
                                      <div class="controls">
                                         <textarea class="span12 wysihtml5" rows="3" name="texto" id="texto"><?php echo $rs->observacao; ?></textarea>
                                      </div>
                                   </div>
                                                                                                         
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_imagens.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>
