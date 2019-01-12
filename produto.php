<?php require('header.php'); ?>
		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('<?= $imagem[23]; ?>');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2><?= $rs_post->titulo; ?></h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="<?= $base; ?>">Home</a></li>
				  <li class="breadcrumb-item active"><a href=""><?= $rs_post->titulo; ?></a></li>
				</ol>
			</div>
		</section>
                <section class="about-product new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="img-holder">
                                                    <img src="<?= $rs_post->imagem; ?>" alt="<?= $rs_post->titulo; ?>" title="<?= $rs_post->titulo; ?>" class="img-responsive">
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="block-stl6">
							<h2><?= $rs_post->titulo; ?></h2>
                                                        <p class="price" style=" text-decoration: none"><span style=" text-decoration: none">R$<?= number_format($rs_post->valor, 2, ',', '.'); ?></span></p>
							<p class="ab-txt"><?= $rs_post->texto; ?></p>
							<form action="#">
								<div class="form-block">
									<div class="row">										
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												<label>Quantidade:</label>
												<select class="c_select">
													<option value="">01</option>
													<option value="">02</option>
													<option value="">03</option>
													<option value="">04</option>
													<option value="">05</option>
													<option value="">06</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
                                                                                    <div class="form-group btn-block" style=" margin-top: 25px">
												<a href="#" class="btn1 stl2">Add ao carrinho</a>
											</div>
										</div>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>

		<div class="center-wrapper new-block" >
			<div class="fixed-bg parallax" style="background: url('<?= $imagem[21] ?>');"></div>
			<div class="overlay"></div>
			<div class="inner-wrapper">

				<section class="related-products new-block">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="title">
									<h2><?= strip_tags($texto[57]); ?></h2>
									<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
									<?= $texto[58]; ?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="item-slider2 owl-carousel owl-theme">
                                                                        <?php

                                                                    $sql = 'SELECT * FROM tbl_produtos WHERE categoria = :categoria AND id != :id ORDER BY rand() LIMIT 12';         
                                                                    try{

                                                                        $read = $db->prepare($sql);
                                                                        $read->bindParam(':id', $rs_post->id, PDO::PARAM_STR);
                                                                        $read->bindParam(':categoria', $rs_post->categoria, PDO::PARAM_STR);
                                                                        $read->execute();

                                                                    } catch (PDOException $ex) {
                                                                        echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                                    }

                                                                    while($rs = $read->fetch(PDO::FETCH_OBJ))
                                                                    { ?>         
									<div class="item">
										<div class="block-stl2">
                                                                                                <div class="img-holder">
                                                                                                        <img src="<?= $rs->imagem ?>" alt="<?= $rs->titulo; ?>" class="img-responsive">
                                                                                                </div>
                                                                                                <div class="text-block">
                                                                                                        <h3><?= $rs->titulo; ?></h3>
                                                                                                        <p class="sz"><?= $rs->resumo; ?></p>
                                                                                                        <p class="price"><span><?= $rs->subtitulo; ?></span></p>
                                                                                                </div>
                                                                                                <div class="btn-sec">
                                                                                                    <a href="produto/<?= gerarUrl($rs->titulo) . '/' . $rs->id; ?>" class="btn1 stl2">Peça agora</a>
                                                                                                </div>
                                                                                        </div>
									</div>
                                                                    <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</section>
					
			
			</div>
		</div>
<?php require('footer.php'); ?>