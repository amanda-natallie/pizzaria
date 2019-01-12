<?php require('header.php'); ?>
        <section class="page-info new-block">
            <div class="fixed-bg" style="background: url('<?= $imagem[22]; ?>');"></div>
            <div class="overlay"></div>
            <div class="container">
				<h2><?= strip_tags($texto[53]); ?></h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="<?= $base; ?>">Home</a></li>
				  <li class="breadcrumb-item active"><a href=""><?= strip_tags($texto[53]); ?></a></li>
				</ol>
			</div>
        </section>
        <section class="blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="row">
                            <div class="col-lg-12" style=" margin-bottom: 30px">
                                        <div class="title">
                                                <p class="top-h"><?= strip_tags($texto[54]); ?></p>
                                                <h2><?= strip_tags($texto[54]); ?></h2>
                                                <div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
                                        </div>
                                </div>
                                <?php    
                                $paginacao = '';
                                $total_reg = "6";

                                 $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
                                 if (!isset($pagina)) {
                                 $pc = '1';
                                 } else {
                                 $pc = $pagina;
                                 }

                                 $inicio = $pc - 1;
                                 $inicio = $inicio * $total_reg;
                                 $data_atual = date('Y-m-d'); 

                                 $sql = 'SELECT * FROM tbl_videos ORDER BY id DESC';
                                 try{
                                    $read = $db->prepare($sql);
                                    $read->execute();

                                 } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Login! - ' . $ex->getMessage();
                                 }

                                 $todos = 0;
                                 while($rs = $read->fetch(PDO::FETCH_OBJ))
                                 {
                                     $todos++;
                                 }
                                 $tr = $todos;
                                 $tp = $tr / $total_reg;

                                 if($todos == 0)
                                 {
                                     echo '<h4 style="margin-top: 5px; ">Nenhum vídeo encontrado.</h4>';
                                 }else{

                                     $sql = 'SELECT * FROM tbl_videos ORDER BY id DESC LIMIT '.$inicio.', '.$total_reg;

                                     try{
                                         $read = $db->prepare($sql);
                                         $read->execute();

                                     } catch (PDOException $ex) {
                                         echo 'Erro ao Buscar Dados 2! - ' . $ex->getMessage();
                                     }
                                     $total = 0;
                                     $i = 0;
                                      while($rs = $read->fetch(PDO::FETCH_OBJ))
                                      {
                                    ?>  
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style=" margin-bottom: 20px">
                                        <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?= $rs->video; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                 <?php }} ?>
                        </div>
                        <div class="bg-single" style=" margin-top: 30px">
                            <div class="blog-pagination">
                                <ul class="pagination">
                                    <?php  
                                    $anterior = $pc -1;
                                    $proximo = $pc +1;
                                    $tp = ceil($tp);
                                    if ($anterior>0) { ?> <li> <a href="eventos/<?php echo $anterior; ?>" ><i class="flaticon-left-arrow"></i></a> </li><?php }
                                    for($i = 1; $i < $todos + 1; $i++) {

                                            if($i >= $pagina-4){

                                                 if($i <= $pagina+4 && $i <= $tp){
                                                ?>
                                                <li <?php if($i == $pagina){ echo 'class="active"';} ?>><a href="eventos/<?php echo $i; ?>" ><?php echo $i ?></a></li>
                                                <?php 
                                                 }
                                            }
                                     }

                                    if ($tp>=$proximo){ ?>
                                    <li><a href="eventos/<?php echo $proximo; ?>"><i class="flaticon-right-arrow"></i> </a> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4" style=" padding-top: 160px">
                        <div class="about">
                            <h2 class="text-center">Faça sua reserva</h2>
                            <form action="#">
                                <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                                <input type="text" placeholder="Nome" class="form-control">
                                        </div>	
                                </div>
                                <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                                <input type="text" placeholder="Email" class="form-control">
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                                <input type="text" placeholder="Cidade" class="form-control">
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                                <input type="text" placeholder="Telefone" class="form-control">
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                                <input type="text" placeholder="Data do Evento" class="form-control">
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                                <textarea class="form-control" placeholder="Mensagm"></textarea>
                                        </div>
                                </div>
                                <div class="col-lg-12 col-md-12 text-center">
                                        <input type="button" class="btn btn3" value="Enviar">
                                </div>
                        </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
<?php require('footer.php'); ?>