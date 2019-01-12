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
        try {
            $read = $db->prepare($sql);
            $read->execute();
        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        echo $rs->codigo;
        ?>
        <!--<div class="loader_wrapper">
            <div class="loader">
                <img src="images/loader.gif" alt="" class="img-fluid">
            </div>
        </div>-->
        <div id="wrapper">
            <header class="new-block main-header">
                <div class="main-nav new-block" style="padding-left: 10%">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="logo">
                                    <a href="<?= $base; ?>"><img src="<?= $imagem[1]; ?>" alt="<?= $imagem_alt[1]; ?>" title="<?= $imagem_title[1]; ?>" class="img-responsive" style=" height: 100px"></a>
                                </div>
                                <a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
                                <nav class="nav">
                                    <ul class="list-unstyled">
                                        <li <?php if ($pag == 1) {
            echo ' class="active"';
        } ?>><a href="<?= $base; ?>">Home</a></li>
                                        <li <?php if ($pag == 2) {
            echo ' class="active"';
        } ?>><a href="faca-seu-pedido">Faça seu pedido</a></li>
                                        <li <?php if ($pag == 3) {
            echo ' class="active"';
        } ?>><a href="nossa-historia">Nossa História</a></li>
                                        <li <?php if ($pag == 4) {
            echo ' class="active"';
        } ?>><a href="rodizio">Rodízio</a></li>
                                        <li <?php if ($pag == 5) {
            echo ' class="active"';
        } ?>><a href="cardapio">Cardápio</a></li>
                                        <li <?php if ($pag == 6) {
            echo ' class="active"';
        } ?>><a href="eventos">Eventos / Reservas</a></li>
                                        <li <?php if ($pag == 7) {
            echo ' class="active"';
        } ?>><a href="contato">Contato</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header> 