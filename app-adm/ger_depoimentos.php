<?php require("header.php");?>
<script type="text/ecmascript">
   function excluir(id){
       
        var conf = confirm("Tem certeza que deseja excluir esse registro?");
        if(conf == true)
        {
                $.post("sql/excluir.php?acao=depoimento",{id: id}, function(pegar_dados){
                $(".retorno").fadeIn("slow").html(pegar_dados);
                });
        }
        
          
	
   }
</script>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Gerenciamento de Depoimentos</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Adicionar Depoimento" href="cad_depoimento.php"><i class="icon-plus"></i></a>
                                    </div>
                                
                                </div>
                                <div class="clearfix"></div>
                                <table class="table table-advance" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Imagem</th>
                                            <th>Nome</th>
                                            <th>Resumo</th>
                                            <th style="width:100px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = 'SELECT * FROM tbl_depoimentos ORDER BY id ASC';         
                                        try{

                                            $read = $db->prepare($sql);
                                            $read->execute();

                                        } catch (PDOException $ex) {
                                            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                        }

                                        while($rs = $read->fetch(PDO::FETCH_OBJ))
                                        {
                                            echo'
                                            <tr class="table-flag-blue">
                                            <td>'; if($rs->imagem != "") { echo '<img src="../'.$rs->imagem.'" width="100"  />';} echo '</td>
                                            <td>'.$rs->nome.'</td>
                                            <td>'.$rs->resumo.'</td>
                                            <td>
                                                <div class=btn-group">
                                                    <a class="btn btn-small show-tooltip" title="Editar" href="alt_depoimento.php?id='.$rs->id.'"><i class="icon-edit"></i></a>
                                                    <a class="btn btn-small btn-danger show-tooltip" title="Deletar" onclick="excluir('.$rs->id.')"><i class="icon-trash"></i></a>
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