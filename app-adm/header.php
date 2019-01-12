<?php include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina();
	
        include "config.php";
        
	$nome_usuario =  $_SESSION['usuarioNome'];
	$id_usuario =  $_SESSION['usuarioID'];
	$tipo_usuario =  $_SESSION['usuarioTipo'];
        
        
        if($tipo_usuario == 1)
        {
            
            $sql = 'SELECT COUNT(*) as total FROM tbl_usuario WHERE nome = "'. $nome_usuario.'" AND id = '. $id_usuario;         
            try{

                $read = $db->prepare($sql);
                $read->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Login! - ' . $ex->getMessage();
            }

           $rs = $read->fetch(PDO::FETCH_OBJ);
           $num_rows = $rs->total;
           
           if($num_rows == 0)
                {?>
                <script type="text/javascript" >
                        alert( 'Este usuário não é um dos Administradores! Consulte o Adminitrador do Sistema.'); location.href="login.php";
                </script>
            <?php
                }else
                {

                }
        }
        else
        {
            ?>
                        <script type="text/javascript" >
                        alert( 'Este usuário não é um dos Administradores! Consulte o Adminitrador do Sistema.'); location.href="login.php";
                </script>
            <?php
                
        }
	
require("assets/wideimage/lib/WideImage.php");	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mundial Gestion</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/normalize/normalize.css">        
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />		
        <link rel="stylesheet" type="text/css" href="assets/dropzone/downloads/css/dropzone.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" href="css/flaty.css">
        <link rel="stylesheet" href="css/flaty-responsive.css">
        <link rel="shortcut icon" href="img/favicon.png">     
        <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    </head>
    <body class="skin-orange">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div id="navbar" class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN Brand -->
                    <a href="#" class="brand">
                        <small>
                            <i class="icon-desktop"></i>
                            Mundial Gestion
                        </small> 
                    </a>
                    <a href="#" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-reorder"></i>
                    </a>
                    <ul class="nav flaty-nav pull-right">
                        <li class="user-profile">
                            <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                                <span class="hidden-phone" id="user_info">
                                    <?php echo $nome_usuario ?>
                                </span>
                                <i class="icon-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-navbar" id="user_menu">                                
                                <li>
                                    <a href="logout.php">
                                        <i class="icon-off"></i>
                                        Sair
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="main-container">
            <?php require('menu.php'); ?>            
            <div id="main-content">
                <div class="page-title">
                    <div>
                        <h1><i class="icon-desktop"></i> <img src="img/logo.png" width="200"  /></h1>
                        <h4>Seu Painel Administrativo</h4>
                    </div>
                </div>
                <div id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="active"><i class="icon-home"></i> Mundial Gestion</li>
                    </ul>
                </div>