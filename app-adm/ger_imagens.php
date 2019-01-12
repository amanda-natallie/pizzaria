<?php require("header.php");?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Gerenciamento de Imagens do Site</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                
                                <div class="clearfix"></div>
                                <table class="table table-advance" id="table1">
                                    <thead>


                                        <tr>
                                            <th>Imagem</th>
                                            <th>ALT</th>
                                            <th>TITLE</th>
                                            <th>Observação</th>
                                            <th style="width:100px">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        $sql = 'SELECT * FROM tbl_imagens ORDER BY id ASC';         
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
                                            <td>'.$rs->alt.'</td>
                                            <td>'.$rs->title.'</td>
                                            <td>'.$rs->observacao.'</td>
                                            <td>
                                                <div class=btn-group">
                                                    <a class="btn btn-small show-tooltip" title="Editar" href="alt_imagem.php?id='.$rs->id.'"><i class="icon-edit"></i></a>
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
