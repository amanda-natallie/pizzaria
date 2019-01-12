<?php require("header.php");?>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i> Gerenciamento de Configurações SEO</h3>
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
                                                <th>Titulo do Site</th>
                                                <th>Keywords</th>
                                                <th>Description</th>
                                                <th style="width:100px">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            $sql = 'SELECT * FROM tbl_seo WHERE pagina = :pagina ORDER BY id DESC';         
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
                                                <td>'.$rs->titulo_site.'</td>
                                                <td>'.$rs->keywords.'</td>
                                                <td>'.$rs->description.'</td>
                                                <td>
                                                    <div class=btn-group">
                                                        <a class="btn btn-small show-tooltip" title="Editar" href="alt_seo.php?id='.$_GET['pag'].'"><i class="icon-edit"></i></a>
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
