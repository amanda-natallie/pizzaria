<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    $sql = 'UPDATE tbl_perguntas SET pergunta = :pergunta, resposta = :resposta, status = :status WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':pergunta', $_POST['pergunta'], PDO::PARAM_STR);
        $create->bindValue(':resposta', $_POST['resposta'], PDO::PARAM_STR);
        $create->bindValue(':status', $_POST['status'], PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                     location.href="ger_perguntas.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Alterar Registro! - " . $e->getMessage();
    }
}

?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i> Alteração de Pergunta para o FAQ</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            <?php
				
				
                                $sql = 'SELECT * FROM tbl_perguntas WHERE id = :id';   
                                
                                try{

                                    $read = $db->prepare($sql);
                                    $read->bindParam(':id', $id, PDO::PARAM_STR);
                                    $read->execute();

                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                $rs = $read->fetch(PDO::FETCH_OBJ);
                                $pergunta = $rs->pergunta;
                                $resposta = $rs->resposta;
                                $status = $rs->status;
                                
                            ?>
                                <form action="alt_pergunta.php" class="form-horizontal" id="validation-form" method="post">   
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label class="control-label" for="pergunta">Pergunta:</label>
                                        <div class="controls">
                                            <div class="span12">
                                         <textarea class="span12"rows="3" name="pergunta" id="pergunta"><?php echo $rs->pergunta ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                                                       
                                    <div class="control-group">
                                      <label class="control-label">Resposta:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor"rows="3" name="resposta" id="resposta"><?php echo $rs->resposta ?></textarea>
                                      </div>
                                    </div>
                                                                       
                                    <div class="control-group">
                                        <label class="control-label" for="status">Status:</label>
                                        <div class="controls">
                                            <div class="span12">
                                              <input type="radio" name="status" id="status" value="1" <?php if($rs->status == 1){ echo 'checked';} ?>>&nbsp;Ativo
                                              <input type="radio" name="status" id="status" value="0" <?php if($rs->status == 0){ echo 'checked';} ?>>&nbsp;Inativo<br>
                                           </div>
                                        </div>
                                    </div>
                                                                       
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_perguntas.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>