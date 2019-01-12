<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    
    $sql = 'UPDATE tbl_seo SET titulo_site = :titulo_site, keywords = :keywords, description = :description, titulo_face = :titulo_face, url_face = :url_face, description_face = :description_face WHERE pagina = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':titulo_site', $_POST['titulo_site'], PDO::PARAM_STR);
        $create->bindValue(':keywords', $_POST['keywords'], PDO::PARAM_STR);
        $create->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $create->bindValue(':titulo_face', $_POST['titulo_face'], PDO::PARAM_STR);
        $create->bindValue(':url_face', $_POST['url_face'], PDO::PARAM_STR);
        $create->bindValue(':description_face', $_POST['description_face'], PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_seo.php?pag='.$id.'";
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
                                <h3><i class="icon-reorder"></i> Alteração de Configurações SEO</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            <?php
				
				
                                $sql = 'SELECT * FROM tbl_seo WHERE pagina = :id';   
                                
                                try{

                                    $read = $db->prepare($sql);
                                    $read->bindParam(':id', $id, PDO::PARAM_STR);
                                    $read->execute();

                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                $rs = $read->fetch(PDO::FETCH_OBJ);
                                
                            ?>
                                <form action="alt_seo.php" class="form-horizontal" id="validation-form" method="post">   
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Titulo do Site:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="titulo_site" id="titulo_site" class="input-xlarge" value="<?php echo $rs->titulo_site; ?>" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Keywords:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="keywords" id="keywords" class="input-xlarge" value="<?php echo $rs->keywords; ?>" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Description:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="description" id="description" class="input-xlarge" value="<?php echo $rs->description; ?>" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Titulo no Facebook:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="titulo_face" id="titulo_face" class="input-xlarge" data-rule-required="true" value="<?php echo $rs->titulo_face; ?>" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="nome">URl da Página:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="url_face" id="url_face" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" value="<?php echo $rs->url_face ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Description no Face:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="description_face" id="description_face" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" value="<?php echo $rs->description_face ?>" />
                                            </div>
                                        </div>
                                    </div>
                                                                        
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_seo.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Main Content -->

<?php require("footer.php");?>