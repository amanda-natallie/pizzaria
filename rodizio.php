<?php require('header.php'); ?>
		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('<?= $imagem[18]; ?>');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2><?= strip_tags($texto[44]); ?></h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="<?= $base; ?>">Home</a></li>
				  <li class="breadcrumb-item active"><a href=""><?= strip_tags($texto[44]); ?></a></li>
				</ol>
			</div>
		</section>
		<section class="about-us-block new-block">
			<div class="container-fluid">
				<div class="row">
					<div class="col-custom1 pd0">
						<div class="img-holder">
							<img src="<?= $imagem[19]; ?>" title="<?= $imagem_title[19]; ?>" alt="<?= $imagem_alt[19]; ?>" class="img-responsive">
						</div>
					</div>
					<div class="col-custom2 pd0">
						<div class="fixed-bg">
							<img src="images/bg8.jpg" alt="" class="img-responsive">
						</div>
						<div class="block-stl12">
                                                    <div class="title">
                                                            <p class="top-h"><?= strip_tags($texto[45]); ?></p>
                                                            <h2><?= strip_tags($texto[46]); ?></h2>
                                                    </div>
                                                    <?= $texto[47]; ?>
                                                </div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>		
		<section class="gallery-sec new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<p class="top-h"><?= strip_tags($texto[48]); ?></p>
							<h2><?= strip_tags($texto[49]); ?></h2>
							<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
						</div>
					</div>
					<?php
                                        $sql = 'SELECT * FROM tbl_img_galerias WHERE galeria = 4 ORDER BY id DESC';         
                                        try{

                                            $read = $db->prepare($sql);
                                            $read->execute();

                                        } catch (PDOException $ex) {
                                            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                        }

                                        while($rs = $read->fetch(PDO::FETCH_OBJ))
                                        { ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="block-stl14 stl2">
							<div class="img-holder">
                                                            <img src="<?= $rs->imagem; ?>" title="<?= $rs->nome; ?>" alt="<?= $rs->nome; ?>" class="img-responsive">
								<div class="overlay">
									<ul class="social-nav">
                                                                                    <li><a href="<?= $rs->imagem; ?>" class="image-gal"><i class="flaticon-add"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
                                        <?php } ?>
				</div>
			</div>
		</section>
		
<?php require('footer.php'); ?>