<?php require("header.php");?>
<script type="text/ecmascript">
   function excluir(id){
       
        var conf = confirm("Tem certeza que deseja excluir esse registro?");
        if(conf == true)
        {
                $.post("sql/excluir.php?acao=email",{id: id}, function(pegar_dados){
                $(".retorno").fadeIn("slow").html(pegar_dados);
                });
        }
        
          
	
   }
        function abrir(URL) {

          var width = 550;
          var height = 350;

          var left = 200;
          var top = 200;

          window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}

</script>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Gerenciamento de Email's</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Inserir Email" href="cad_email.php"><i class="icon-plus"></i></a>
                                        <a class="btn btn-circle show-tooltip"  title="Lista Completa" href="javascript:abrir('exportar_email.php');"><i class="icon-file-text-alt"></i></a>
                                    </div>
                                
                                </div>
                                <div class="clearfix"></div>
                                <table class="table table-advance" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th style="width:100px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = 'SELECT * FROM tbl_newsletter ORDER BY id DESC';         
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
                                            <td>'.$rs->nome.'</td>
                                            <td>'.$rs->email.'</td>
                                            <td>
                                                <div class=btn-group">
                                                    <a class="btn btn-small show-tooltip" title="Editar" href="alt_email.php?id='.$rs->id.'"><i class="icon-edit"></i></a>
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
