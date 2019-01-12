<?php require("header.php");?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Gerenciamento de Scripts</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                                                    
                                </div>
                                <div class="clearfix"></div>
                                    <table class="table table-advance" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Titulo</th>
                                                <th style="width:100px">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            $sql = 'SELECT * FROM tbl_scripts WHERE id = 1';         
                                            try{

                                                $read = $db->prepare($sql);
                                                $read->bindParam(':pagina', $_GET['pag'], PDO::PARAM_STR);
                                                $read->execute();

                                            } catch (PDOException $ex) {
                                                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                            }

                                            while($rs = $read->fetch(PDO::FETCH_OBJ))
                                            {
                                                echo'
                                                <tr class="table-flag-blue">
                                                <td>'.$rs->titulo.'</td>
                                                <td>
                                                    <div class=btn-group">
                                                        <a class="btn btn-small show-tooltip" title="Editar" href="alt_script.php?id=1"><i class="icon-edit"></i></a>
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
