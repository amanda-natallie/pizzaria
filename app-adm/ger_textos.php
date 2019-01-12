<?php require("header.php");
$pagina = $_GET['pagina'];
?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table">&nbsp; Gerenciamento de Textos</i> </h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right">
                                 
                                </div>
                                <table class="table table-advance">
                                    <thead>
                                        <tr>
                                            <th>Posição</th>
                                            <th>Texto</th>
                                            <th style="width:100px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                                $sql = 'SELECT * FROM tbl_textos WHERE pagina = :pagina ORDER BY id ASC';         
                                                try{

                                                    $read = $db->prepare($sql);
                                                    $read->bindParam(':pagina', $pagina, PDO::PARAM_STR);
                                                    $read->execute();

                                                } catch (PDOException $ex) {
                                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                }

                                                while($rs = $read->fetch(PDO::FETCH_OBJ))
                                                {

                                                        echo "
                                        <tr class=\"table-flag-blue\">
                                            <td>$rs->nome</td>
                                            <td>$rs->texto</td>
                                            <td>
                                                <div class=\"btn-group\">
                                                    <a class=\"btn btn-small show-tooltip\" title=\"Editar\" href=\"alt_texto.php?id=$rs->id&pagina=$pagina\"><i class=\"icon-edit\"></i></a>
                                                </div>
                                            </td>            
                                        </tr>";
                                                }
                                                ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="retorno"></div>
<?php require("footer.php");?>
