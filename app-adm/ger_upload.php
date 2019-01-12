<?php require("header.php");?>
<script type="text/ecmascript">
   function excluir(id){
       
        var conf = confirm("Tem certeza que deseja excluir esse registro?");
        if(conf == true)
        {
                $.post("sql/excluir.php?acao=upload",{id: id}, function(pegar_dados){
                $(".retorno").fadeIn("slow").html(pegar_dados);
                });
        }
        
          
	
   }
</script>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Upload de Imagens do Site</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Atualizar" href="ger_upload.php"><i class="icon-repeat"> Atualizar</i></a>
                                     
                                    </div>
                                
                                </div>
                                <div class="clearfix"></div>
                                <table class="table table-advance" id="table1">
                                    <thead>
                                <strong>    No final dessa tela você pode inserir imagens para gerar códigos e utilizar no site.<br>
                                </strong><br>
                                <br>

                                        <tr>
                                            <th>Imagem</th>
                                            <th>Código</th>
                                            <th style="width:100px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = 'SELECT * FROM tbl_upload ORDER BY id ASC';         
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
                                            <td><img src="../'.$rs->imagem.'" width="100"  /></td>
                                            <td>'.$rs->codigo.'</td>
                                            <td>
                                                <div class=btn-group">
                                                    <a class="btn btn-small btn-danger show-tooltip" title="Deletar" onclick="excluir('.$rs->id.')"><i class="icon-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>';
                                        }       

                                        ?>

                                    </tbody>
                                </table>
                                <form action="upload_alt_img.php" class="dropzone" id="my-awesome-dropzone"></form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="retorno"></div>
<?php require("footer.php"); ?>