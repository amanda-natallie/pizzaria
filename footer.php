		<footer class="main-footer home2 new-block">
			<div class="fixed-bg parallax " style="background: url('<?= $imagem[13]; ?>');"></div>
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="f-contact">
							<ul class="list-unstyled">
								<li>
									<div class="block-stl4">
										<i class="flaticon-placeholder"></i>
										<a ><?= $contato[1]; ?> - <?= $contato[2]; ?></a>
									</div>
								</li>
								<li>
									<div class="block-stl4">
										<i class="flaticon-phone-call"></i>
										<a ><?= $contato[4]; ?></a>
										<a ><?= $contato[5]; ?></a>
									</div>
								</li>
								<li>
									<div class="block-stl4">
										<i class="flaticon-message"></i>
										<a ><?= $contato[10]; ?></a>
									</div>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="footer-head">
							<h3><?= strip_tags($texto[31]); ?></h3>
						</div>
						<div class="footer-content">
							<?= $texto[32]; ?>
							<ul class="list-unstyled card-block">
								<li><a href="#"><img src="images/crt1.png" alt=""></a></li>
								<li><a href="#"><img src="images/crt2.png" alt=""></a></li>
								<li><a href="#"><img src="images/crt3.png" alt=""></a></li>
								<li><a href="#"><img src="images/crt4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="our-company">
							<div class="footer-head">
								<h3><?= strip_tags($texto[33]); ?></h3>
							</div>
							<div class="footer-content">
								<ul class="list-unstyled">
									<li><a href="<?= $base; ?>">Home</a></li>
									<li><a href="nossa-historia">Nossa História</a></li>
									<li><a href="rodizio">Rodízio</a></li>
                                                                        <li><a href="eventos">Eventos / Reservas</a></li>
                                                                        <li><a href="contato">Contato</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="our-company">
							<div class="footer-head">
								<h3><?= strip_tags($texto[34]); ?></h3>
							</div>
							<div class="footer-content">
								<ul class="list-unstyled">			
                                                                    <li><a href="cardapio">Cardápio</a></li>
                                                                    <li><a href="cadastre-se">Cadastre-se</a></li>
                                                                    <li><a href="faca-seu-pedido">Faça seu pedido</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="flickr">
							<div class="footer-head">
								<h3><?= strip_tags($texto[35]); ?></h3>
							</div>
							<div class="footer-content">
								<div class="fb-page" data-href="<?= $contato[6]; ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?= $contato[6]; ?>" class="fb-xfbml-parse-ignore"><a href="<?= $contato[6]; ?>">Pizzaria Três Irmãos</a></blockquote></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="copy-right">
			<div class="container">
				<p><a>Pizzaria Três Irmãos</a> © <?= date('Y'); ?> - Todos os direitos reservados</p>
				<ul class="social-nav">
                                    <?php if($contato[6] != ''){ ?><li><a href="<?= $contato[6]; ?>" target="_blank" ><i class="fa fa-facebook links-sociais"></i></a></li><?php } ?>
                                    <?php if($contato[7] != ''){ ?><li><a href="<?= $contato[7]; ?>" target="_blank" ><i class="fa fa-instagram links-sociais"></i></a></li><?php } ?>
                                    <?php if($contato[9] != ''){ ?><li><a href="<?= $contato[9]; ?>" target="_blank" ><i class="fa fa-twitter links-sociais"></i></a></li><?php } ?>
                                    <?php if($contato[8] != ''){ ?><li><a href="<?= $contato[8]; ?>" target="_blank" ><i class="fa fa-google-plus links-sociais"></i></a></li><?php } ?>
                                </ul>
			</div>
                        <div class="container">
                            <a href="http://mundial.site/" target="_blank"  style=" text-align: center !important; margin-top: 20px; float: left !important; width: 100% !important"> <img src="images/logo_mundial.png" alt="Footer Banner" class="img-responsive" style=" width: 100px; margin: 0 auto"> </a>
                        </div>
		</div>
		
		<span id="go_to_top" class="go-to-top"><i class="flaticon-up-arrow"></i></span>	
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2&appId=1735953759986637&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/dscountdown.min.js"></script>
    <script src="js/jquery.nice-select.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="pizzamaker.js"></script>
</body>
</html>