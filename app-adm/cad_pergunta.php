<?php require("header.php");
if(isset($_POST['bt_save_df']))
{
        
    $sql = 'INSERT INTO tbl_perguntas (pergunta, resposta, status)';
    $sql .= ' VALUES (:pergunta, :resposta, :status)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':pergunta', $_POST['pergunta'], PDO::PARAM_STR);
        $create->bindValue(':resposta', $_POST['resposta'], PDO::PARAM_STR);
        $create->bindValue(':status', $_POST['status'], PDO::PARAM_STR);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                   location.href="ger_perguntas.php";
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
                                <h3><i class="icon-reorder"></i> Cadastro de Perguntas para o FAQ</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_pergunta.php" class="form-horizontal" id="validation-form" method="post">
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="pergunta">Pergunta:</label>
                                        <div class="controls">
                                            <div class="span12">
                                         <textarea class="span12" rows="3" name="pergunta" id="pergunta"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                                                       
                                    <div class="control-group">
                                      <label class="control-label">Resposta:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor" rows="3" name="resposta" id="resposta"></textarea>
                                      </div>
                                    </div>
                                                                       
                                    <div class="control-group">
                                        <label class="control-label" for="status">Status:</label>
                                        <div class="controls">
                                            <div class="span12">
                                              <input type="radio" name="status" id="status" value="1" checked="">&nbsp;Ativo
                                              <input type="radio" name="status" id="status" value="0">&nbsp;Inativo<br>
                                           </div>
                                        </div>
                                    </div>
                                                                      
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_save_df" value="Salvar">
                                        <a href="ger_perguntas.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>