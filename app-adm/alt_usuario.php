<?php require("header.php");
$id = $_REQUEST['id'];

if(isset($_POST['bt_alt_df']))
{
    $senha = $_POST['password'];
    $criptografada = md5($senha);
    
    $sql = 'UPDATE tbl_usuario SET nome = :nome, usuario = :usuario, senha = :senha WHERE id = :id';
            
    try{

        $create = $db->prepare($sql);
        $create->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $create->bindValue(':usuario', $_POST['usuario'], PDO::PARAM_STR);
        $create->bindValue(':senha', $criptografada, PDO::PARAM_STR);
        $create->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($create->execute() ){
            echo '<script type="text/javascript" >
                    location.href="ger_usuarios.php";
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
                                <h3><i class="icon-reorder"></i> Alteração de Usuários</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            <?php
				
				
                                $sql = 'SELECT * FROM tbl_usuario WHERE id = :id';   
                                
                                try{

                                    $read = $db->prepare($sql);
                                    $read->bindParam(':id', $id, PDO::PARAM_STR);
                                    $read->execute();

                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                $rs = $read->fetch(PDO::FETCH_OBJ);
                                $nome = $rs->nome;
				$usuario = $rs->usuario;
				$senha = $rs->senha;
                            ?>
                                <form action="<?php echo "alt_usuario.php"; ?>" class="form-horizontal" id="validation-form" method="post">   
                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
                                    <div class="control-group">
                                        <label class="control-label" for="nome">Nome:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="text" name="nome" id="nome" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" value="<?php echo $nome ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="usuario">Email:</label>
                                        <div class="controls">
                                            <div class="span12">
                                                <input type="email" name="usuario" id="usuario" class="input-xlarge" data-rule-required="true" data-rule-minlength="3" value="<?php echo $usuario ?>" />
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
                                        <input type="submit" class="btn btn-primary" name="bt_alt_df" value="Salvar Alteração">
                                        <a href="ger_usuarios.php"><button type="button" class="btn">Cancelar</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php require("footer.php");?>