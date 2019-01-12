<?php require("header.php");
if(isset($_POST['bt_alt_df']))
{
    $sql = 'UPDATE tbl_mapa SET codigo= :codigo WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':codigo', $_POST['mapa1'], PDO::PARAM_STR);
        $create->bindValue(':id', 1, PDO::PARAM_INT);
        
        if($create->execute() ){
        	echo "<script>location.href='ger_contato.php';</script>";   
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
                                <h3><i class="icon-reorder"></i>Alteração de Mapas</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            <?php
				$sql = 'SELECT * FROM tbl_mapa';   
                                
                                try{

                                    $read = $db->prepare($sql);
                                    $read->bindParam(':id', $id, PDO::PARAM_STR);
                                    $read->execute();

                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                while($rs = $read->fetch(PDO::FETCH_OBJ))  
                                {                                
                                    $id = $rs->id;
                                    $codigo = $rs->codigo;
                                    
                                    if($id == 1)
                                    {
                                        $mapa1 = $codigo;
                                    }
                                    
                                    if($id == 2)
                                    {
                                        $mapa2 = $codigo;
                                    }
                                }
								
							?>
                                <form action="alt_mapas.php" class="form-horizontal" id="validation-form" method="post">
                                   <div class="control-group">
                                      <label class="control-label">Mapa 1:</label>
                                      <div class="controls">
                                         <textarea class="span6" rows="10" name="mapa1" id="mapa1"><?php echo $mapa1; ?></textarea>
                                      </div>
                                   </div>
                                    
                                                                       
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="index.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>