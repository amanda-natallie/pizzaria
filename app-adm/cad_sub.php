<?php require("header.php");
if(isset($_POST['bt_save_df']))
{
        
    $sql = 'INSERT INTO tbl_subcategorias (nome, categoria)';
    $sql .= ' VALUES (:nome, :categoria)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $create->bindValue(':categoria', $_POST['categoria'], PDO::PARAM_STR);
                
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_subcategorias.php";
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
                                <h3><i class="icon-reorder"></i>Cadastro de Sub-Categorias</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_sub.php" class="form-horizontal" id="validation-form" method="post">
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="nome" id="nome" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                 
                                    <div class="control-group">
                                        <label for="select" class="control-label">Categoria:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="categoria" id="categoria" data-rule-required="true">
                                                <option value="">-- Selecione uma Categoria --</option>
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
                                                                                                                
                                                        echo '<option value="'.$rs2->id.'">'.$rs2->categoria.'</option>';
                                                    }
                                                    ?>
    						
                                            </select>
                                        </div>
                                    </div> 
                                    
                                    
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_save_df" value="Salvar">
                                        <a href="ger_subcategorias.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>