<?php 
    require("../scripts/conexao.php");
	
	$categoria = $_REQUEST['categoria'];

	
		?><div class="control-group">
                                        <label for="select" class="control-label">Sub-Categoria</label>
                                        <div class="controls">
                                            <select class="input-xlarge" name="subcategoria" id="subcategoria">
                                                
                                                <?php
								
												
                                                $con_home = mysql_query("SELECT * FROM categoria_sub  WHERE categoria_id = '$categoria'") or die ("Erro ao Buscar Categorias. Consulte o Adminitrador do Sistema.");

                                                while($res_home = mysql_fetch_array($con_home))
                                                {
                                                        $id_cat = $res_home['id'];
                                                        $subcategoria = $res_home['descricao_sub'];

                                                        echo "<option value=\"$id_cat\">$subcategoria</option>";
                                                }
                                                
                                                if(mysql_num_rows($con_home) == 0)
                                                {
                                                    echo "<option value=\"\">Nenhuma</option>";
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                <?php

		
					  
					 
						  
						 