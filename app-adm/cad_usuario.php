<?php require("header.php");
if(isset($_POST['bt_save_df']))
{
    $senha = $_POST['password'];
    $criptografada = md5($senha);
    
    $sql = 'INSERT INTO tbl_usuario (nome, usuario, senha)';
    $sql .= ' VALUES (:nome, :usuario, :senha)';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $create->bindValue(':usuario', $_POST['usuario'], PDO::PARAM_STR);
        $create->bindValue(':senha', $criptografada, PDO::PARAM_STR);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                   location.href="ger_usuarios.php";
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
                                <h3><i class="icon-reorder"></i> Cadastro de Usuários</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="cad_usuario.php" class="form-horizontal" id="validation-form" method="post">
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="nome" id="nome" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="usuario">Email:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="email" name="usuario" id="usuario" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" />
                                            </div>
                                        </div>
                                    </div>
                                    	
                                    <div class="control-group">
                                        <label class="control-label" for="password">Senha:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="password" name="password" id="password" class="input-xlarge" data-rule-required="true" data-rule-minlength="6" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="confirm-password">Confirmação de Senha:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="password" name="confirm-password" id="confirm-password" class="input-xlarge" data-rule-required="true" data-rule-minlength="6" data-rule-equalTo="#password" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" name="bt_save_df" value="Salvar">
                                        <a href="ger_usuarios.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>