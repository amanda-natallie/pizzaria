<?php require("header.php");
if(isset($_POST['bt_save_df']))
{
       
        
    $sql = 'INSERT INTO tbl_paginas (titulo, url, texto)';
    $sql .= ' VALUES (:titulo, :url, :texto)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
        $create->bindValue(':url', $_POST['url'], PDO::PARAM_STR);
        $create->bindValue(':texto', $_POST['texto'], PDO::PARAM_STR);
              
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_paginas.php";
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
                                <h3><i class="icon-reorder"></i> Cadastro de Páginas</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_pagina.php" class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">   
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Titulo:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="titulo" id="titulo" class="input-xlarge" data-rule-required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="link">URL:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="url" id="url" class="input-xlarge" data-rule-required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   <div class="control-group">
                                      <label class="control-label">Texto:</label>
                                      <div class="controls">
                                         <textarea class="span6 ckeditor"rows="3" name="texto" id="texto"></textarea>
                                      </div>
                                    </div>
                                    
                                                                                                           
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_save_df" value="Salvar">
                                        <a href="ger_parceiros.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
<?php require("footer.php");?>