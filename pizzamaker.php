<?php require('header.php');?>
<style>
    .radio-img  > input { 
        display:none;
    }

    .radio-img  > img{
        cursor:pointer;
        border:2px solid transparent;
    }

    .radio-img  > input:checked + img{ 
        border:2px solid orange;
    }
    .title h2 {
        font-size: 22px !important
    }
    .btnFatias, #resetar{
        width: 150px !important;
        min-width: 110px !important;
        max-width: 110px !important;
        display: table !important;
        margin: 0 auto !important
    }
 .owl-carousel {
  opacity: 0;
  transition: opacity .5s .5s;
}

.owl-carousel.active {
  opacity: 1;
}

</style>
<section class="fastive-season new-block">
    <div class="overlay"></div>
    <div class="fixed-bg parallax" style="background: url('images/bg6.jpg');"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title">
                    <p class="top-h">Delivery Online</p>
                    <h2 style="font-size:50px !important">Monte sua pizza!</h2>
                    <div class="btm-style"><span><img src="images/clr2/btm-style.png" alt="" class="img-responsive"></span></div>
                    <p class="bottom-p">Siga o passo a passo para montar o seu pedido. <br>É super fácil e rápido, e você não precisa sair de casa!</p>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>

</section>

<?php if (!$_COOKIE["_Tamanho"]) { ?>
    <section class="this-month new-block" id="divTamanho">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="title">
                        <h2>Passo 1: Tamanho</h2>
                        <div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
                        <p>Escolha o tamanho da pizza a ser adicionado ao seu pedido. Cada tamanho tem um número diferente de fatias.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="block-stl2">
                            <div class="img-holder">
                                <img src="images/pizzaP.png" alt="" class="img-responsive">
                            </div>
                            <div class="text-block">
                                <h3>Pizza Brotinho P</h3>
                                <p class="sz">4 Fatias</p>
                            </div>
                            <div class="btn-sec">
                                <button class="btn1 stl2 btnTamanho" data-tamanho="P" data-nometam="Pizza Brotinho P" data-qtdfatias="4">Quero Esta!</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="block-stl2">
                            <div class="img-holder">
                                <img src="images/pizzaM.png" alt="" class="img-responsive">
                            </div>
                            <div class="text-block">
                                <h3>Pizza Média M</h3>
                                <p class="sz">6 Fatias</p>
                            </div>
                            <div class="btn-sec">
                                <button class="btn1 stl2 btnTamanho" data-tamanho="M" data-nomeTam="Pizza Média M" data-qtdFatias="6">Quero Esta!</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="block-stl2">
                            <div class="img-holder">
                                <img src="images/pizzaG.png" alt="" class="img-responsive">
                            </div>
                            <div class="text-block">
                                <h3>Pizza Gigante G</h3>
                                <p class="sz">8 Fatias</p>
                            </div>
                            <div class="btn-sec">
                                <button class="btn1 stl2 btnTamanho" data-tamanho="G" data-nomeTam="Pizza Gigante G" data-qtdFatias="8">Quero Esta!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pull-right">
                        <div class="table-responsive">
                            <table class="table cart-tbl">
                                <thead>
                                    <tr>
                                        <th class="p_dtl">Seu pedido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p_dtl">
                                            <img src="images/carrinho-vazio.jpg" class="img-responsive" alt="" title="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </section>
<?php } ?>
<section class="shopping-cart new-block" id="Passo2" <?php if (!$_COOKIE["_Tamanho"]) {echo 'style="display:none"';} ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-9" id="QTDFatias">
                <div class="title">
                    <h2>Passo 2: Quantidade de Sabores</h2>
                    <p>Escolha a quantidade de sabores que deseja. Em cada repartição vai um sabor!</p>
                    <br>
                    <div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
                    <br><br><br><br><br></div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-12" id="saboresWrapper">
                        <p id="infoP" style="display:none">Você escolheu:</p>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="DIV1sabores">
                            <div class="block-stl2">
                                <div class="img-holder">
                                    <img src="images/pizza1Fatias.png"  alt="" class="img-responsive">
                                </div>
                                <div class="text-block">
                                    <h3>1 Sabor</h3>
                                </div>
                                <div class="btn-sec">
                                    <button class="btn1 stl2 btnFatias" data-qtdfatias="1">Quero Esta!</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="DIV2sabores">
                            <div class="block-stl2">
                                <div class="img-holder">
                                    <img src="images/pizza2Fatias.png"  alt="" class="img-responsive">
                                </div>
                                <div class="text-block">
                                    <h3>2 Sabores</h3>
                                </div>
                                <div class="btn-sec">
                                    <button class="btn1 stl2 btnFatias" data-qtdfatias="2">Quero Esta!</button>
                                </div>
                            </div>
                        </div>
                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  id="DIV3sabores">
                            <div class="block-stl2">
                                <div class="img-holder">
                                    <img src="images/pizza3Fatias.png"  alt="" class="img-responsive">
                                </div>
                                <div class="text-block">
                                    <h3>3 Sabores</h3>
                                </div>
                                <div class="btn-sec">
                                    <button class="btn1 stl2 btnFatias" data-qtdfatias="3">Quero Esta!</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" id="DIV4sabores">
                            <div class="block-stl2">
                                <div class="img-holder">
                                    <img src="images/pizza4Fatias.png"  alt="" class="img-responsive">
                                </div>
                                <div class="text-block">
                                    <h3>4 Sabores</h3>
                                </div>
                                <div class="btn-sec">
                                    <button class="btn1 stl2 btnFatias" data-qtdfatias="4">Quero Esta!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9" id="escolherSabores" style="display:none">
                        <div class="title">
                            <h2 style="margin-top:0px; margin-bottom: 13px">Escolha o Sabor 1</h2>
                        </div>
                        <div class="item-slider2 sabores owl-carousel owl-theme active">
                            <div class="item">
                                <div class="block-stl2">
                                    <div class="img-holder">
                                        <img src="images/img3.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="text-block">
                                        <h3>Nome da Pizza 1</h3>
                                        <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                                        <p class="price"><span>R$26.00</span></p>
                                    </div>
                                    <div class="btn-sec">
                                        <a class="btn1 stl2">Escolher</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-stl2">
                                    <div class="img-holder">
                                        <img src="images/img4.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="text-block">
                                        <h3>Nome da Pizza 1</h3>
                                        <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                                        <p class="price"><span>R$26.00</span></p>
                                    </div>
                                    <div class="btn-sec">
                                        <a class="btn1 stl2">Escolher</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-stl2">
                                    <div class="img-holder">
                                        <img src="images/img5.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="text-block">
                                        <h3>Nome da Pizza 1</h3>
                                        <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                                        <p class="price"><span>R$26.00</span></p>
                                    </div>
                                    <div class="btn-sec">
                                        <a class="btn1 stl2">Escolher</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-stl2">
                                    <div class="img-holder">
                                        <img src="images/img.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="text-block">
                                        <h3>Nome da Pizza 1</h3>
                                        <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                                        <p class="price"><span>R$26.00</span></p>
                                    </div>
                                    <div class="btn-sec">
                                        <a class="btn1 stl2">Escolher</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-stl2">
                                    <div class="img-holder">
                                        <img src="images/img5.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="text-block">
                                        <h3>Nome da Pizza 1</h3>
                                        <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                                        <p class="price"><span>R$26.00</span></p>
                                    </div>
                                    <div class="btn-sec">
                                        <a class="btn1 stl2">Escolher</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                           
                    </div>
                </div>



          
            <div class="col-lg-3 pull-right" id="carrinhoFIXO">
                <div class="table-responsive">
                    <table class="table cart-tbl">
                        <thead>
                            <tr>
                                <th class="p_dtl">Seu pedido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="CARTtamanho">
                                <td class="p_dtl">
                                    <div class="block-stl9">
                                        <div class="img-holder">
                                            <img src="<?php if ($_COOKIE["_Tamanho"]) {
    echo "images/pizza" . $_COOKIE["_Tamanho"] . ".png";
} ?>" alt="" class="img-responsive" id="imgTam">
                                        </div>
                                        <div class="info-block">
                                            <h5 id="nomeTamCart"><?php if ($_COOKIE["_nomeTamanho"]) {
    echo $_COOKIE["_nomeTamanho"];
} ?></h5>
                                            <p class="txt-cat" id="FatiasTamCart"><?php if ($_COOKIE["_fatiasTamanho"]) {
    if ($_COOKIE["_fatiasTamanho"] == 1) {
        echo $_COOKIE["_fatiasTamanho"] . " Fatia";
    } else {
        echo $_COOKIE["_fatiasTamanho"] . " fatias";
    }
} ?></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr id="CARTsabores" <?php if (!$_COOKIE["_QTDsabor"]) {
    echo 'style="display:none"';
} ?>>
                                <td class="p_dtl">
                                    <div class="block-stl9">
                                        <div class="img-holder">
                                            <img src="<?php if ($_COOKIE["_QTDsabor"]) {
    echo "images/pizza" . $_COOKIE["_QTDsabor"] . "Fatias.png";
} ?>" alt="" class="img-responsive" id="imgSab">
                                        </div>
                                        <div class="info-block">
                                            <h5 id="nomeSab"><?php if ($_COOKIE["_QTDsabor"]) {
    if ($_COOKIE["_QTDsabor"] == 1) {
        echo $_COOKIE["_QTDsabor"] . " Sabor";
    } else {
        echo $_COOKIE["_QTDsabor"] . " Sabores";
    }
} ?></h5>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <button class="btn btn1 stl2" id="resetar">Resetar</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> 
<div class="clearfix"></div>
<section class="page-info new-block">
    <div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
    <div class="overlay"></div>
    <div class="container">
        <h2>Nosso Cardápio</h2>
        <div class="clear-fix"></div>
    </div>
</section>

<div class="clearfix"></div>
<section class="domnoo-menu-filter list-grid-sec new-block">
            <div class="fixed-bg parallax" style="background-image: url(images/ptrn1.jpg);"></div>
            <div class="overlay"></div>
            <div class="filters">
                <ul class="button-group tab-flr-btn">
                    <li data-filter=".all" class="btn-flr is-checked">
                        <div class="cat-block">
                            <div class="block-stl1 bg1">
                                <span class="flaticon-5-point-star"></span>
                                <h4>Ver Tudo</h4>
                            </div>
                        </div>
                    </li>
                    <li data-filter=".pizza" class="btn-flr ">
                        <div class="cat-block">
                            <div class="block-stl1 bg1">
                                <span class="flaticon-pizza"></span>
                                <h4>Pizza</h4>
                            </div>
                        </div>
                    </li>
                    <li data-filter=".burgers" class="btn-flr">
                        <div class="cat-block">
                            <div class="block-stl1 bg2">
                                <span class="flaticon-burger"></span>
                                <h4>Burgers</h4>
                            </div>
                        </div>
                    </li>
                    <li data-filter=".drinks" class="btn-flr">
                        <div class="cat-block">
                            <div class="block-stl1 bg6">
                                <span class="flaticon-drink"></span>
                                <h4>Bebidas</h4>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <br><br><br>
            <div class="grid" id="grid">
              <?php for($i=0;$i<=5;$i++) { ?>
                <div class="items-for-flr pizza all" data-newest="1" data-popularity="5" data-price="6.00">
                        <div class="block-stl2">
                            <div class="img-holder">
                                <img src="images/img3.png" alt="" class="img-responsive">
                            </div>
                            <div class="text-block">
                                <h3>Pizza Calabresa Especial</h3>
                                <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                            </div>
                            <div class="btn-sec">
                                <button class="btn1 stl2 btnTamanho" data-tamanho="P" data-nometam="Pizza Brotinho P" data-qtdfatias="4">Quero Esta!</button>
                            </div>
                        </div>
                    </div>
                    <div class="items-for-flr burgers all" data-newest="3" data-popularity="2" data-price="8.00">
                        <div class="block-stl2">
                            <div class="img-holder">
                                <img src="images/img.png" alt="" class="img-responsive">
                            </div>
                            <div class="text-block">
                                <h3>X-Egg Bacon Especial</h3>
                                <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                            </div>
                            <div class="btn-sec">
                                <button class="btn1 stl2 btnTamanho" data-tamanho="P" data-nometam="Pizza Brotinho P" data-qtdfatias="4">Quero Esta!</button>
                            </div>
                        </div>
                    </div>
                    <div class="items-for-flr salad all" data-newest="4" data-popularity="1" data-price="5.00">
                        <div class="block-stl2">
                            <div class="img-holder">
                                <img src="images/img4.png" alt="" class="img-responsive">
                            </div>
                            <div class="text-block">
                                <h3>Sanduiche Especial</h3>
                                <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                            </div>
                            <div class="btn-sec">
                                <button class="btn1 stl2 btnTamanho" data-tamanho="P" data-nometam="Pizza Brotinho P" data-qtdfatias="4">Quero Esta!</button>
                            </div>
                        </div>
                    </div>
                    <div class="items-for-flr chicken all" data-newest="2" data-popularity="3" data-price="9.00">
                        <div class="block-stl2">
                            <div class="img-holder">
                                <img src="images/img5.png" alt="" class="img-responsive">
                            </div>
                            <div class="text-block">
                                <h3>French Fries Especial</h3>
                                <p class="sz">Molho de tomates frescos, orégano, mozzarella, calabresa defumada especial e parmesão.</p>
                            </div>
                            <div class="btn-sec">
                                <button class="btn1 stl2 btnTamanho" data-tamanho="P" data-nometam="Pizza Brotinho P" data-qtdfatias="4">Quero Esta!</button>
                            </div>
                        </div>
                    </div>
              <?php } ?>
         
            </div>
            
        </section>




<input type="hidden" id="tamanho" value="<?php if ($_COOKIE["_Tamanho"]) {echo $_COOKIE["_Tamanho"] . '"';} ?>">
<input type="hidden" id="NOMEtamanho" value="<?php if ($_COOKIE["_nomeTamanho"]) {echo $_COOKIE["_nomeTamanho"] . '"';} ?>">
<input type="hidden" id="QTDFATIAStamanho" value="<?php if ($_COOKIE["_fatiasTamanho"]) {echo $_COOKIE["_fatiasTamanho"] . '"';} ?>">
<input type="hidden" id="QTDsabor" value="<?php if ($_COOKIE["_QTDsabor"]) {echo $_COOKIE["_QTDsabor"] . '"';} ?>" >
<input type="hidden" id="sabor1" value="">
<input type="hidden" id="ADCsabor1" value="">
<input type="hidden" id="sabor2" value="">
<input type="hidden" id="ADCsabor2" value="">
<input type="hidden" id="sabor3" value="">
<input type="hidden" id="ADCsabor3" value="">
<input type="hidden" id="sabor4" value="">
<input type="hidden" id="ADCsabor4" value="">


<?php require('footer.php'); ?>