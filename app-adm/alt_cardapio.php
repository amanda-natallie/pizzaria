<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
       
    $sql2 = 'UPDATE tbl_produtos SET titulo = :titulo, resumo = :resumo, subtitulo = :subtitulo, texto = :texto, keywords = :keywords, valor = :valor, categoria = :categoria, novidade = :novidade, tipo = :tipo';
    
    if(isset($_FILES['imagem1']['name']) && $_FILES['imagem1']['name'] != "")
    {
        
    $sql = 'SELECT * FROM tbl_produtos WHERE id = :id';   

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
    $nome = time();
    $nome_imagem2 = $nome . '1.' . $dividir2;
    $uploadfile = $uploaddir . $nome . '1.' . $dividir2;
    if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $uploaddir . $nome_imagem2)) {}   
    $img2 = $pastadestino.$nome_imagem2;
    
    $sql2 .= ', imagem = :imagem';
    
    }
    
    $sql2 .= ' WHERE id = :id';
       
    try{

        $create = $db->prepare($sql2);
        $create->bindValue(':titulo', $_POST['nome'], PDO::PARAM_STR);
        $create->bindValue(':resumo', $_POST['resumo'], PDO::PARAM_STR);
        $create->bindValue(':subtitulo', $_POST['subtitulo'], PDO::PARAM_STR);
        $create->bindValue(':texto', $_POST['texto'], PDO::PARAM_STR);
        $create->bindValue(':keywords', $_POST['keywords'], PDO::PARAM_STR);
        $create->bindValue(':valor', $_POST['valor'], PDO::PARAM_STR);
        $create->bindValue(':categoria', $_POST['categoria'], PDO::PARAM_STR);
        $create->bindValue(':novidade', $_POST['novidade'], PDO::PARAM_STR);
        $create->bindValue(':tipo', $_POST['tipo'], PDO::PARAM_STR);
        if(isset($_FILES['imagem1']['name']) && $_FILES['imagem1']['name'] != "")
        {
            $create->bindValue(':imagem', $img2, PDO::PARAM_STR);
        }
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_cardapio.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Alterar Registro! - " . $e->getMessage();
    }
}


$sql = 'SELECT * FROM tbl_produtos WHERE id = :id';   

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
                                <h3><i class="icon-reorder"></i> Alteração de Produto</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="alt_cardapio.php" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label for="select" class="control-label">Tipo de Produto:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="tipo" id="tipo" data-rule-required="true">
                                                <option value="1" <?php if($rs->tipo == 1){ echo 'selected'; } ?>>Pizza</option>
                                                <option value="0" <?php if($rs->tipo == 0){ echo 'selected'; } ?>>Outro</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="select" class="control-label">Categoria:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="categoria" id="categoria" data-rule-required="true">
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
                                                        if($rs2->id == $rs->categoria){
                                                            $estilo = 'selected';
                                                        }else{
                                                            $estilo = '';
                                                        }
                                                        echo '<option value="'.$rs2->id.'" '.$estilo.'>'.$rs2->categoria.'</option>';
                                                    }
                                                    ?>
    						
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label for="select" class="control-label">Novidade:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="novidade" id="novidade" data-rule-required="true">
                                                <option value="1"<?php if($rs->novidade == 1){ echo 'selected'; } ?>>Sim</option>
                                                <option value="0"<?php if($rs->novidade == 1){ echo 'selected'; } ?>>Não</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Nome do Produto:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="nome" value="<?= $rs->titulo; ?>" id="nome" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Resumo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="resumo" value="<?= $rs->resumo; ?>" id="resumo" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Subtitulo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="subtitulo" value="<?= $rs->subtitulo; ?>" id="subtitulo" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label">Texto:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor"rows="3" name="texto" id="texto"><?= $rs->texto; ?></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Keywords:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="keywords" value="<?= $rs->keywords; ?>" id="keywords" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="resumo">Valor:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="valor" value="<?= $rs->valor; ?>" id="preco" placeholder="0.00" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="control-group">
                                      <label class="control-label">Imagem:</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php
                                                if($rs->imagem != '')
                                                {
                                                    echo '<img src="../'.$rs->imagem.'" alt="" />';
                                                }else
                                                {
                                                    echo '<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />';
                                                }
                                                ?>
                                               
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
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_cardapio.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<?php require("footer.php");?>