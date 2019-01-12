<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    $sql = 'UPDATE tbl_subcategorias SET nome = :nome, categoria = :categoria WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $create->bindValue(':categoria', $_POST['categoria'], PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                  location.href="ger_subcategorias.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Alterar Registro! - " . $e->getMessage();
    }
}

$sql = 'SELECT * FROM tbl_subcategorias WHERE id = :id';   
                                
try{

    $read = $db->prepare($sql);
    $read->bindParam(':id', $id, PDO::PARAM_STR);
    $read->execute();

} catch (PDOException $ex) {
    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
}

$rs = $read->fetch(PDO::FETCH_OBJ);
?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i>Alteração de Subcategoria</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            
                                <form action="alt_sub.php" class="form-horizontal" id="validation-form" method="post">       
                                   <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="nome" id="nome" value="<?php echo $rs->nome; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                 
                                   <div class="control-group">
                                        <label for="select" class="control-label">Categoria:</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="categoria" id="categoria" data-rule-required="true">
                                                
                                                <?php 
                                                    $sql3 = 'SELECT * FROM tbl_categorias ORDER BY id DESC';         
                                                    try{

                                                        $read3 = $db->prepare($sql3);
                                                        $read3->execute();

                                                    } catch (PDOException $ex) {
                                                        echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                    }

                                                    while($rs3 = $read3->fetch(PDO::FETCH_OBJ))
                                                    {
                                                        ?>                                                        
                                                        <option value="<?php echo $rs3->id;?>"<?php if($rs->categoria == $rs3->id){echo "selected";}?>><?php echo $rs3->categoria; ?></option>
                                                        <?php
                                                    }
                                                    ?>
    						
                                            </select>
                                        </div>
                                    </div> 
                                   
                                   
                                   
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_subcategorias.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>