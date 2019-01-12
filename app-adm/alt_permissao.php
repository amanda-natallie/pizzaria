<?php require("header.php");?>
<?php require("menu.php");

$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    $categoria = $_POST['categoria'];
        
    $sql = 'UPDATE tbl_categorias SET categoria = :nome WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':nome', $categoria, PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_cat.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Alterar Registro! - " . $e->getMessage();
    }
}

$sql = 'SELECT * FROM tbl_categorias WHERE id = :id';   
                                
try{

    $read = $db->prepare($sql);
    $read->bindParam(':id', $id, PDO::PARAM_STR);
    $read->execute();

} catch (PDOException $ex) {
    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
}

$rs = $read->fetch(PDO::FETCH_OBJ);
?>

                <!-- BEGIN Main Content -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i> Alteração de Categoria</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            
                                <form action="alt_cat.php" class="form-horizontal" id="validation-form" method="post">       
                                   <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label class="control-label" for="titulo">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="categoria" id="categoria" value="<?php echo $rs->categoria; ?>" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                 
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_cat.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Main Content -->

<?php require("footer.php");?>