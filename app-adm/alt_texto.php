<?php require("header.php");
$id = $_REQUEST['id'];
$pag = $_REQUEST['pagina'];

if(isset($_POST['bt_alt_df']))
{
    $sql = 'UPDATE tbl_textos SET texto= :texto, observacao= :observacao WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':texto', $_POST['texto'], PDO::PARAM_STR);
        $create->bindValue(':observacao', $_POST['obs'], PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_textos.php?pagina='.$pag.'";
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
                                <h3><i class="icon-reorder"></i>Alteração de Textos</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            <?php
				$sql = 'SELECT * FROM tbl_textos WHERE id = :id';   
                                
                                try{

                                    $read = $db->prepare($sql);
                                    $read->bindParam(':id', $id, PDO::PARAM_STR);
                                    $read->execute();

                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                $rs = $read->fetch(PDO::FETCH_OBJ);
                                
                                $tipo = $rs->nome;
                                $texto = $rs->texto;
                                $observacao = $rs->observacao;		
								
				?>
                                <form action="alt_texto.php" class="form-horizontal" id="validation-form" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />         
                                    <input type="hidden" name="pagina" id="pagina" value="<?php echo $pag ?>" />         
                                    <div class="control-group">
                                      <label class="control-label">Texto:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor" rows="3" name="texto" id="texto"><?php echo $texto; ?></textarea>
                                      </div>
                                   </div>
                                   
                                   <div class="control-group">
                                      <label class="control-label">Observação:</label>
                                      <div class="controls">
                                         <textarea class="span6"rows="3" name="obs" id="obs"><?php echo $observacao; ?></textarea>
                                      </div>
                                   </div>
                                    
                                    
                                    
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_textos.php?pagina=<?php echo $pag ?>"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>