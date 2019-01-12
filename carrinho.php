<?php require('header.php'); ?>

		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2>Meu Carrinho</h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active"><a href="#">Meu Carrinho</a></li>
				</ol>
			</div>
		</section>
		<section class="shopping-cart new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table cart-tbl">
							<thead>
								<tr>
									<th class="p_dtl">Produto</th>
									<th class="p_btn">Itens Adicionais</th>
									<th class="p_price">Valor</th>
									<th class="p_quantity">Quantidade</th>
									<th class="p_ttl">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="p_dtl">
										<div class="block-stl9">
											<div class="img-holder">
												<img src="images/img11.png" alt="" class="img-responsive">
											</div>
											<div class="info-block">
												<h5>Nome do Produto</h5>
												<p class="txt-cat">Tamanho Grande</p>
												<p class="ab-txt-block">Tipo de massa</p>
											</div>
										</div>
									</td>
									<td class="p_btn">
										Adicional, adicional, adicional.
									</td>
									<td class="p_price">
										R$30,00
									</td>
									<td class="p_quantity">
										<div class="quantity">
											<input type="number" class="form-control text-center" value="2" min="0">
										</div>
									</td>
									<td class="p_ttl">
										R$60,00
									</td>
								</tr>
								<tr>
									<td class="p_dtl">
										<div class="block-stl9">
											<div class="img-holder">
												<img src="images/img11.png" alt="" class="img-responsive">
											</div>
											<div class="info-block">
												<h5>Nome do Produto</h5>
												<p class="txt-cat">Tamanho Grande</p>
												<p class="ab-txt-block">Tipo de massa</p>
											</div>
										</div>
									</td>
									<td class="p_btn">
										Adicional, adicional, adicional.
									</td>
									<td class="p_price">
										R$30,00
									</td>
									<td class="p_quantity">
										<div class="quantity">
											<input type="number" class="form-control text-center" value="2" min="0">
										</div>
									</td>
									<td class="p_ttl">
										R$60,00
									</td>
								</tr>
								<tr>
									<td class="p_dtl">
										<div class="block-stl9">
											<div class="img-holder">
												<img src="images/img11.png" alt="" class="img-responsive">
											</div>
											<div class="info-block">
												<h5>Nome do Produto</h5>
												<p class="txt-cat">Tamanho Grande</p>
												<p class="ab-txt-block">Tipo de massa</p>
											</div>
										</div>
									</td>
									<td class="p_btn">
										Adicional, adicional, adicional.
									</td>
									<td class="p_price">
										R$30,00
									</td>
									<td class="p_quantity">
										<div class="quantity">
											<input type="number" class="form-control text-center" value="2" min="0">
										</div>
									</td>
									<td class="p_ttl">
										R$60,00
									</td>
								</tr>
								
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>

		<section class="loc-cop-sum  new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="block-stl10">
							<h3>Taxa de Entrega</h3>
							<p>Mauris nec semper justo, a accumsan est. Morbi massa libelementum.</p>
							<form action="#">
								<div class="form-group">
									<select class="form-control">
                                                                            <option></option>
                                                                            <option>Bairro 1</option>
                                                                            <option>Bairro 2</option>
                                                                            <option>Bairro 3</option>
                                                                            <option>Bairro 4</option>
                                                                            <option>Bairro 5</option>
                                                                        </select>
								</div>
                                                            <button class="btn btn5">Aplicar</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						
					</div>
					<div class="col-lg-4 col-md-4 col-xs-12">
						<div class="block-stl10 odr-summary">
							<h3>Dados do Pedido</h3>
							<ul class="list-unstyled">
								<li><span class="ttl">Subtotal</span> <span class="stts">R$180,00</span></li>
								<li><span class="ttl">Entrega</span> <span class="stts">R$10,00</span></li>
							</ul>
							<div class="ttl-all">
								<span class="ttlnm">Total</span>
								<span class="odr-stts">R$190,00</span>
							</div>
						</div>
						<button class="btn btn1 stl2">Finalizar Pedido</button>
					</div>
				</div>
			</div>
		</section>
<?php require('footer.php'); ?>