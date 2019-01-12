<?php require('header.php'); ?>
		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('<?= $imagem[23]; ?>');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2><?= strip_tags($texto[56]); ?></h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="<?= $base; ?>">Home</a></li>
				  <li class="breadcrumb-item active"><a href=""><?= strip_tags($texto[56]); ?></a></li>
				</ol>
			</div>
		</section>
        <section class="domnoo-menu-filter list-grid-sec new-block">
            <div class="fixed-bg parallax" style="background-image: url(<?= $imagem[21] ?>);"></div>
            <div class="overlay"></div>
            <div class="filters">
                <ul class="button-group tab-flr-btn">
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
                    <li data-filter=".cat<?= $rs->id; ?>" class="btn-flr <?php if($i == 0){ echo 'is-checked'; } ?>">
                        <div class="cat-block">
                            <div class="block-stl1 bg1">
                                <img src="<?= $rs->imagem; ?>" alt="<?= $rs->categoria; ?>" style="max-width: 60px; float: none; margin: 0 auto !important;" title="<?= $rs->categoria; ?>" />
                                <h4><?= $rs->categoria; ?></h4>
                            </div>
                        </div>
                    </li>    
                    <?php } ?>
                </ul>                
            </div>

            <div class="clearfix"></div>
            <div class="grid" id="grid" style=" padding-top: 30px">
                <?php

                $sql = 'SELECT * FROM tbl_produtos ORDER BY titulo ASC';         
                try{

                    $read = $db->prepare($sql);
                    $read->execute();

                } catch (PDOException $ex) {
                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                }

                while($rs = $read->fetch(PDO::FETCH_OBJ))
                { ?>  
                <div class="items-for-flr pizza cat<?= $rs->categoria; ?>" data-newest="1">
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
            <div class="clearfix"></div>            
        </section>
        
<?php require('footer.php'); ?>