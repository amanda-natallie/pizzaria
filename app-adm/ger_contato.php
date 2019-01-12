<?php require("header.php");?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table">&nbsp; Gerenciamento de Dados de Contato</i> </h3>
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
                                            <th>Tipo de informação</th>
                                            <th>Dado atual</th>
                                            <th style="width:100px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                                $sql = 'SELECT * FROM tbl_contato ORDER BY id ASC';         
                                                try{

                                                    $read = $db->prepare($sql);
                                                    $read->execute();

                                                } catch (PDOException $ex) {
                                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                }

                                                while($rs = $read->fetch(PDO::FETCH_OBJ))
                                                {	
                                                        echo"
                                        <tr class=\"table-flag-blue\">
                                            <td>$rs->tipo</td>
                                            <td>$rs->texto</td>
                                            <td>
                                                <div class=\"btn-group\">
                                                    <a class=\"btn btn-small show-tooltip\" title=\"Editar\" href=\"alt_contato.php?id=$rs->id\"><i class=\"icon-edit\"></i></a>
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



                <!-- END Main Content -->
                
<?php require("footer.php");?>