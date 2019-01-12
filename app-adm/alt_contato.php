<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    $sql = 'UPDATE tbl_contato SET texto= :texto, observacao= :observacao WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':texto', $_POST['texto'], PDO::PARAM_STR);
        $create->bindValue(':observacao', $_POST['obs'], PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                   location.href="ger_contato.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Alterar Registro! - " . $e->getMessage();
    }
}





	$sql = 'SELECT * FROM tbl_contato WHERE id = :id';   
                                
        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }	
        
	$rs = $read->fetch(PDO::FETCH_OBJ);
        $id = $rs->id;
        $tipo = $rs->tipo;
        $texto = $rs->texto;
        $observacao = $rs->observacao;

        
?>
               
                
                <!-- BEGIN Main Content -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i>Alteração de Informações de Contato</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                             <form action="alt_contato.php" class="form-horizontal" id="validation-form" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                      <label class="control-label">Texto:</label>
                                      <div class="controls">
                                         <textarea class="span12" rows="3" name="texto" id="texto"><?php echo stripslashes($texto); ?></textarea>
                                      </div>
                                   </div>
                                   
                                   <div class="control-group">
                                      <label class="control-label">Observação:</label>
                                      <div class="controls">
                                         <textarea class="span6" rows="3" name="obs" id="obs"><?php echo $observacao; ?></textarea>
                                      </div>
                                   </div>
                                    
                                    
                                    
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_contato.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Main Content -->

<?php require("footer.php");?>