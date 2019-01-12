<?php require("header.php");?>
<script type="text/ecmascript">
   function excluir(id){
       
        var conf = confirm("Tem certeza que deseja excluir esse registro? As Subcategorias relacionadas a esta categoria serão deletadas também!");
        if(conf == true)
        {
                $.post("sql/excluir.php?acao=subcategoria",{id: id}, function(pegar_dados){
                $(".retorno").fadeIn("slow").html(pegar_dados);
                });
        }
        
          
	
   }
</script>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i>Gerenciamento de Sub-Categorias</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Adicionar Nova Sub-Categoria" href="cad_sub.php"><i class="icon-plus"></i></a>
                                    </div>
                                
                                </div>
                                <div class="clearfix"></div>
                                <table class="table table-advance" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Categoria</th>
                                            <th>Subcategoria</th>
                                            <th style="width:100px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = 'SELECT *, tbl_categorias.categoria AS nome_categoria, tbl_subcategorias.nome AS nome_sub, tbl_subcategorias.id AS id_sub FROM tbl_subcategorias INNER JOIN tbl_categorias ON(tbl_subcategorias.categoria = tbl_categorias.id) ORDER BY tbl_subcategorias.id DESC';       
                                        try{

                                            $read = $db->prepare($sql);
                                            $read->bindValue(':pagina', 1, PDO::PARAM_STR);
                                            $read->execute();

                                        } catch (PDOException $ex) {
                                            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                        }

                                        while($rs = $read->fetch(PDO::FETCH_OBJ))
                                        {
                                            echo'
                                            <tr class="table-flag-blue">
                                            <td>'.$rs->nome_categoria.'</td>
                                            <td>'.$rs->nome_sub.'</td>
                                            <td>
                                                <div class=btn-group">
                                                    <a class="btn btn-small show-tooltip" title="Editar" href="alt_sub.php?id='.$rs->id_sub.'"><i class="icon-edit"></i></a>
                                                    <a class="btn btn-small btn-danger show-tooltip" title="Deletar" onclick="excluir('.$rs->id_sub.')"><i class="icon-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>';
                                        }       

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="retorno"></div>
<?php require("footer.php"); ?>