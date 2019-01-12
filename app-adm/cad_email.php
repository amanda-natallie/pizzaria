<?php require("header.php");

if(isset($_POST['bt_save_df']))
{
        
    $sql = 'INSERT INTO tbl_newsletter (nome, email)';
    $sql .= ' VALUES (:nome, :email)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $create->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                   location.href="ger_emails.php";
            </script>';

        }


    } catch (PDOException $e) {
            echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
    }
}

?>

                <!-- BEGIN Main Content -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i> Cadastro de Email</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_email.php" class="form-horizontal" id="validation-form" method="post">
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="nome" id="nome" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="email">Email:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="email" id="email" class="input-xlarge" data-rule-required="true" />
                                            </div>
                                        </div>
                                    </div>
                                    	
                                                                       
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_save_df" value="Salvar">
                                        <a href="ger_emails.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>