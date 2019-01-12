<?php require("funcoes.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>        
    <meta name="description" content="<?php echo $site_description_face; ?>">      
    <meta name="keywords" content="<?php echo $site_keywords; ?>">      
    <meta name="robot" content="all">      
    <meta name="rating" content="general">  
    <meta name="language" content="pt-br">     
    <meta property="og:title" content="<?php echo $site_title_face; ?>"> 
    <meta property="og:url" content="<?php echo $site_url_face; ?>">     
    <meta property="og:image" content="<?php echo $site_imagem; ?>">        
    <meta property="og:site_name" content="<?php echo $nome_Email; ?>">       
    <meta property="og:description" content="<?php echo $site_description_face; ?>"> 
    <base href="<?php echo $base; ?>" />
    <link href="<?php echo $imagem[3] ?>" rel="icon" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/colors2.css" id="ui-theme-color">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
     <?php 
        $sql = 'SELECT * FROM tbl_scripts WHERE id = 1';    
        try{            
            $read = $db->prepare($sql);   
            $read->execute();     
        } catch (PDOException $ex) {      
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();        
        }       

        $rs = $read->fetch(PDO::FETCH_OBJ);        
        echo $rs->codigo;
    ?>
    <div class="loader_wrapper">
        <div class="loader">
            <img src="images/loader.gif" alt="" class="img-fluid">
        </div>
    </div>
	<div id="wrapper">
		<header class="new-block main-header home2">
			<div class="top-nav new-block">
				<div class="container">
					<div class="nav-wrapper">
						<div class="location-block">
							<p><i class="fa fa-phone"></i><span> <?= $contato[4]; ?> / <?= $contato[5]; ?></span></p>
						</div>
						<div class="logo">
                                                    <a href="<?= $base; ?>"><img src="<?= $imagem[1]; ?>" alt="<?= $imagem_alt[1]; ?>" title="<?= $imagem_title[1]; ?>" class="img-responsive"></a>
						</div>
						<div class="nav-right-block">
							<ul class="list-unstyled">
                                                            <?php if($contato[6] != ''){ ?><li><a href="<?= $contato[6]; ?>" target="_blank" ><i class="fa fa-facebook links-sociais"></i></a></li><?php } ?>
                                                            <?php if($contato[7] != ''){ ?><li><a href="<?= $contato[7]; ?>" target="_blank" ><i class="fa fa-instagram links-sociais"></i></a></li><?php } ?>
                                                            <?php if($contato[9] != ''){ ?><li><a href="<?= $contato[9]; ?>" target="_blank" ><i class="fa fa-twitter links-sociais"></i></a></li><?php } ?>
                                                            <?php if($contato[8] != ''){ ?><li><a href="<?= $contato[8]; ?>" target="_blank" ><i class="fa fa-google-plus links-sociais"></i></a></li><?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="main-nav new-block home2">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">							
							<a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
							<nav class="nav">
								<ul class="list-unstyled">
									<li class="active"><a href="<?= $base; ?>">Home</a></li>
									<li><a href="faca-seu-pedido">Faça seu pedido</a></li>
									<li><a href="nossa-historia">Nossa História</a></li>
									<li><a href="rodizio">Rodízio</a></li>
									<li><a href="cardapio">Cardápio</a></li>
									<li><a href="eventos">Eventos / Reservas</a></li>
									<li><a href="contato">Contato</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="banner slider2 new-block">
			<div class="fixed-bg">
				<div class="player">
					<video autoplay="autoplay" loop muted>
						<source src="videos/vid1.mp4" type="video/mp4">
					</video>
				</div>
			</div>
			<div class="slider owl-carousel owl-theme">
                                <?php

                                $sql = 'SELECT * FROM tbl_slides ORDER BY id ASC';         
                                try{

                                    $read = $db->prepare($sql);
                                    $read->execute();

                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                while($rs = $read->fetch(PDO::FETCH_OBJ))
                                { ?>
                                <div class="item">
			    	<div class="slider-block slide2 new-block">
			    		<div class="container-fluid">
				    		<div class="row">
				    			<div class="col-lg-6 col-md-6 col-sm-6">
				    				<div class="img-block img2">
				    					<div class="img-holder" data-animation-in="bounceInUp" data-animation-out="animate-out fadeOutRight">
                                                                            <img src="<?= $rs->imagem; ?>" alt="<?= $rs->titulo; ?>" title="<?= $rs->titulo; ?>" class="img-responsive">
				    					</div>
				    				</div>
				    			</div>
				    			<div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="text-block-stl1">
                                                                    <div class="title">
                                                                            <p class="top-h" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight"><?= $rs->titulo; ?></p>
                                                                            <h2 data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutRight"><?= $rs->subtitulo; ?></h2>
                                                                            <p class="bottom-p" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight"><?= $rs->texto; ?></p>
                                                                            <a href="<?= $rs->link; ?>" class="btn1 stl2" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight"><?= $rs->botao; ?></a>
                                                                    </div>
                                                            </div>
				    			</div>
				    		</div>
				    	</div>
				    </div>
                                </div>
                                <?php } ?>
			</div>
		</div>
		<section class="about-us-block new-block">
			<div class="container-fluid">
				<div class="row">
					<div class="col-custom1 pd0">
						<div class="img-holder">
							<img src="<?= $imagem[4]; ?>" alt="<?= $imagem_alt[4]; ?>" title="<?= $imagem_title[4]; ?>" class="img-responsive">
						</div>
					</div>
					<div class="col-custom2 pd0">
						<div class="fixed-bg">
							<img src="images/bg8.jpg" alt="" class="img-responsive">
						</div>
						<div class="block-stl12">
							<div class="title">
                                                            <p class="top-h"><?= strip_tags($texto[1]); ?></p>
								<h2><?= strip_tags($texto[2]); ?></h2>
							</div>
							<?= $texto[3]; ?>
                                                        <a href="nossa-historia" class="btn1 stl2" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight">Saiba mais</a>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>
                <section class="most-popular new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<p class="top-h"><?= strip_tags($texto[4]); ?></p>
							<h2><?= strip_tags($texto[5]); ?></h2>
							<div class="btm-style"><span><img src="images/clr2/btm-style.png" alt="" class="img-responsive"></span></div>
                                                        <?= $texto[6]; ?>
                                                </div>
					</div>
                                        <?php

                                        $sql = 'SELECT * FROM tbl_produtos WHERE novidade = 1 ORDER BY rand() DESC LIMIT 4';         
                                        try{

                                            $read = $db->prepare($sql);
                                            $read->execute();

                                        } catch (PDOException $ex) {
                                            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                        }

                                        while($rs = $read->fetch(PDO::FETCH_OBJ))
                                        { ?>
					<div class="col-lg-3 col-md-4 col-sm-6">
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
		</section>
		<section class="combopack-offer new-block" style=" margin-bottom: 20px">
			<div class="overlay"></div>
			<div class="fixed-bg parallax" style="background: url('<?= $imagem[5]; ?>');"></div>
			<div class="container-fluid" >
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="text-block-stl1">
							<div class="title">
								<p class="top-h"><?= strip_tags($texto[7]); ?></p>
								<h2><?= strip_tags($texto[8]); ?></h2>
                                                                <div style=" color: #FFF; margin-bottom: 30px"><?= $texto[9]; ?></div>
                                                                <a href="<?= strip_tags($texto[11]); ?>" class="btn1 stl2"><?= strip_tags($texto[10]); ?></a>
								<a href="<?= strip_tags($texto[13]); ?>" class="btn1 stl1"><?= strip_tags($texto[12]); ?></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						
							<div class="img-holder">
                                                            <img src="<?= $imagem[6]; ?>" title="<?= $imagem_title[6]; ?>" alt="<?= $imagem_alt[6]; ?>" class="img-responsive">		
							</div>
					</div>
				</div>
			</div>
		</section>		
            <section class="spl-offer2 new-block">
			<div class="container-fluid c-grid">
				<div class="row">
					<div class="col-lg-6">
						<div class="c-grid2">
							<div class="block-stl3 stl5">
								<div class="fixed-bg" style="background: url('<?= $imagem[7]; ?>');"></div>
								<div class="img-holder">
									<img src="<?= $imagem[8]; ?>" title="<?= $imagem_title[8]; ?>" alt="<?= $imagem_alt[8]; ?>" class="img-responsive">
								</div>
								<div class="offer-block">
									<p class="top-h"><?= strip_tags($texto[14]); ?></p>
									<h2><?= strip_tags($texto[15]); ?></h2>
									<?= $texto[16]; ?>
                                                                        <a href="<?= strip_tags($texto[17]); ?>" class="btn3"><?= strip_tags($texto[18]); ?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="block-stl3 stl6">
							<div class="fixed-bg" style="background: url('<?= $imagem[9]; ?>');"></div>
							<div class="img-holder">
								<img src="<?= $imagem[10]; ?>" title="<?= $imagem_title[10]; ?>" alt="<?= $imagem_alt[10]; ?>" class="img-responsive">
							</div>
							<div class="offer-block">
								<p class="top-h"><?= strip_tags($texto[19]); ?></p>
								<h2><?= strip_tags($texto[20]); ?></h2>
								<?= $texto[21]; ?>
								<a href="<?= strip_tags($texto[22]); ?>" class="btn3"><?= strip_tags($texto[23]); ?></a>
							</div>
						</div>
						<div class="block-stl3 stl7">
							<div class="fixed-bg" style="background: url('<?= $imagem[11]; ?>');"></div>
							<div class="img-holder">
								<img src="<?= $imagem[12]; ?>" title="<?= $imagem_title[12]; ?>" alt="<?= $imagem_alt[12]; ?>" class="img-responsive">
							</div>
							<div class="offer-block">
								<p class="top-h"><?= strip_tags($texto[24]); ?></p>
								<h2><?= strip_tags($texto[25]); ?></h2>
								<?= $texto[26]; ?>
								<a href="<?= strip_tags($texto[27]); ?>" class="btn3"><?= strip_tags($texto[28]); ?></a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>            
		<section class="cat-sec home2 new-block">
			<div class="container-fluid pd0">
				<div class="row">
                                    <div class="col-lg-12" style=" padding-top: 20px !important">
						<div class="title">
							<p class="top-h"><?= strip_tags($texto[29]); ?></p>
							<h2><?= strip_tags($texto[30]); ?></h2>
							<div class="btm-style"><span><img src="images/clr2/btm-style.png" alt="" class="img-responsive"></span></div>
						</div>
					</div>
                                    <div class=" clearfix"></div>
                                    <div class="col-lg-2 col-md-2 col-sm-2" style=" margin-top: 50px">
						<ul class="list-unstyled">
                                                    <?php

                                                    $sql = 'SELECT * FROM tbl_categorias ORDER BY ordem ASC';       
                                                    try{

                                                        $read = $db->prepare($sql);
                                                        $read->execute();

                                                    } catch (PDOException $ex) {
                                                        echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                    }
                                                    $i = 0;
                                                    while($rs = $read->fetch(PDO::FETCH_OBJ))
                                                    { ?>
                                                    <li <?php if($i == 0){ echo 'class="active"'; } ?>>
						    	<a data-toggle="pill" href="#tb<?= $rs->id; ?>">
					    			<div class="cat-block">
                                                                    <div class="block-stl1 bg1" style=" text-align: center !important; ">
                                                                                    <img src="<?= $rs->imagem; ?>" alt="<?= $rs->categoria; ?>" style="max-width: 60px; float: none; margin: 0 auto !important;" title="<?= $rs->categoria; ?>" />
                                                                                    <h4><?= $rs->categoria; ?></h4>
										</div>
									</div>
								</a>
                                                    </li>
                                                    <?php $i++; } ?>
						</ul>
					</div>
					<div class="col-lg-10 col-md-10 col-sm-10">
						<div class="tab-filter">
							<div class="tab-content">
                                                            <?php

                                                            $sql2 = 'SELECT * FROM tbl_categorias ORDER BY ordem ASC';       
                                                            try{

                                                                $read2 = $db->prepare($sql2);
                                                                $read2->execute();

                                                            } catch (PDOException $ex) {
                                                                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                            }
                                                            $i = 0;
                                                            while($rs2 = $read2->fetch(PDO::FETCH_OBJ))
                                                            { ?>
								<div id="tb<?= $rs2->id; ?>" class="tab-pane fade <?php if($i == 0){ echo 'in active'; } ?>">
									<div class="row">
                                                                                <?php

                                                                                $sql = 'SELECT * FROM tbl_produtos WHERE categoria = :categoria ORDER BY titulo ASC';         
                                                                                try{

                                                                                    $read = $db->prepare($sql);
                                                                                    $read->bindParam(':categoria', $rs2->id, PDO::PARAM_STR);
                                                                                    $read->execute();

                                                                                } catch (PDOException $ex) {
                                                                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                                                                }

                                                                                while($rs = $read->fetch(PDO::FETCH_OBJ))
                                                                                { ?>                                                                            
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
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
								<?php
                                                                $i++; }
								?>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</section>	
<?php require('footer.php'); ?>