<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
       
    $data = explode('/',$_POST['data']);
    $data = $data[2] . '-' . $data[1] . '-' . $data[0];
    
    $sql2 = 'UPDATE tbl_eventos SET titulo = :titulo, descricao = :descricao, data = :data, resumo = :resumo, arquivo = :arquivo, hora = :hora';
    
    if(isset($_FILES['imagem1']['name']) && $_FILES['imagem1']['name'] != "")
    {
        
    $sql = 'SELECT * FROM tbl_eventos WHERE id = :id';   

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
    $img1 = $pastadestino.$nome_imagem2;
    
    $sql2 .= ', imagem = :imagem';
    
    }
    
    $sql2 .= ' WHERE id = :id';
    
    try{

        $create = $db->prepare($sql2);
        $create->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
        $create->bindValue(':resumo', $_POST['resumo'], PDO::PARAM_STR);
        $create->bindValue(':descricao', $_POST['descricao'], PDO::PARAM_STR);
        $create->bindValue(':data', $data, PDO::PARAM_STR);
        $create->bindValue(':hora', $_POST['hora'], PDO::PARAM_STR);
        $create->bindValue(':arquivo', $_POST['arquivo'], PDO::PARAM_STR);
        if(isset($_FILES['imagem1']['name']) && $_FILES['imagem1']['name'] != "")
        {
            $create->bindValue(':imagem', $img1, PDO::PARAM_STR);
        }
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    alert( "Registro Alterado com Sucesso!"); location.href="ger_eventos.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Alterar Registro! - " . $e->getMessage();
    }
}


$sql = 'SELECT * FROM tbl_eventos WHERE id = :id';   

try{

    $read = $db->prepare($sql);
    $read->bindParam(':id', $id, PDO::PARAM_STR);
    $read->execute();

} catch (PDOException $ex) {
    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
}

$rs = $read->fetch(PDO::FETCH_OBJ);
$data = explode('-', $rs->data);
$data = $data[2] . '/' . $data[1] . '/' . $data[0];
?>     
                 <!-- BEGIN Main Content -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i> Alteração de Informações do Evento</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="alt_evento.php" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Titulo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="titulo" id="titulo" class="input-xlarge" data-rule-required="true" data-rule-minlength="1" value="<?php echo $rs->titulo ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label">Resumo:</label>
                                      <div class="controls">
                                         <textarea class="span12" rows="3" name="resumo" id="resumo"><?php echo $rs->resumo ?></textarea>
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label">Descrição:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor"rows="3" name="descricao" id="descricao"><?php echo $rs->descricao; ?></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="data">Data:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" data-mask="99/99/9999" name="data" id="data" value="<?php echo $data ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                                
                                    <div class="control-group">
                                        <label class="control-label" for="hora">Hora:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="time" name="hora" id="hora" value="<?php echo $rs->hora ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="arquivo">Arquivo (Opcional):</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="arquivo" id="arquivo" value="<?php echo $rs->arquivo ?>" class="input-xlarge" />
                                            </div>
                                        </div>
                                    </div>
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
                                               <input type="file" class="default" name="imagem1" id="imagem1"   /></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                         </div>
                                         
                                      </div>
                                   </div>
                                    
                                                                       
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_eventos.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Main Content -->
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<?php require("footer.php");?>
