<?php require("header.php");
$id_galeria = $_GET['id'];
?>
<script type="text/ecmascript">
   function excluir(id, galeria){
       
        var conf = confirm("Tem certeza que deseja excluir esse registro?");
        if(conf == true)
        {
                $.post("sql/excluir.php?acao=img_galeria",{id: id, galeria: galeria}, function(pegar_dados){
                $(".retorno").fadeIn("slow").html(pegar_dados);
                });
        }
        
          
	
   }
</script>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Gerenciamento de Imagens</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Voltar" href="ger_galerias.php"><i class="icon-reply-all"></i></a>
                                        <a class="btn btn-circle show-tooltip" title="Adicionar Nova Imagem" href="cad_img_galeria.php?id=<?php echo $id_galeria ?>"><i class="icon-plus"></i></a>
                                    </div>
                                
                                </div>
                                <div class="clearfix"></div>
                                <table class="table table-advance" id="table1">
                                    <thead>
                                        <tr>
                                            <th style="width: 150px;">Imagem</th>
                                            <th>Nome</th>
                                            <th style="width:80px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = 'SELECT * FROM tbl_img_galerias WHERE galeria = :galeria ORDER BY id ASC';         
                                        try{

                                            $read = $db->prepare($sql);
                                            $read->bindParam(':galeria', $id_galeria, PDO::PARAM_STR);
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
                                            <td>
                                                <div class=btn-group">
                                                    <a class="btn btn-small btn-danger show-tooltip" title="Deletar" onclick="excluir('.$rs->id.','.$id_galeria.')"><i class="icon-trash"></i></a>
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