<?php require("header.php");

$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    $titulo = $_POST['titulo'];
    $video = $_POST['video'];
    
    $sql = 'UPDATE tbl_videos SET titulo = :titulo, video = :video WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
        $create->bindValue(':video', $_POST['video'], PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_videos.php";
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
                                <h3><i class="icon-reorder"></i> Alteração de Vídeo</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            <?php
				
				
                                $sql = 'SELECT * FROM tbl_videos WHERE id = :id';   
                                
                                try{

                                    $read = $db->prepare($sql);
                                    $read->bindParam(':id', $id, PDO::PARAM_STR);
                                    $read->execute();

                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                $rs = $read->fetch(PDO::FETCH_OBJ);
                                
                            ?>
                                <form action="alt_video.php" class="form-horizontal" id="validation-form" method="post">   
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Titulo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="titulo" id="titulo" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" value="<?php echo $rs->titulo ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label">Vídeo:</label>
                                      <div class="controls">
                                         <textarea class="span6" rows="10" name="video" id="video"><?php echo $rs->video; ?></textarea>
                                      </div>
                                   </div>
                                                                        
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_videos.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>