<?php include("../seguranca.php"); // Inclui o arquivo com o sistema de segurança
	protegePagina();
	
        include "../config.php";
        
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
        
        else if($tipo_usuario == 2)
        {
            
            $sql = 'SELECT COUNT(*) as total FROM tbl_arquitetos WHERE login = "'. $nome_usuario.'" AND id = '. $id_usuario;         
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
        }else
        {
            ?>
                        <script type="text/javascript" >
                        alert( 'Este usuário não é um dos Administradores! Consulte o Adminitrador do Sistema.'); location.href="login.php";
                </script>
            <?php
                
        }
	
	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Finalité Gestion</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!--base css styles-->
        <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/bootstrap/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/normalize/normalize.css">
        
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />		
		<link rel="stylesheet" type="text/css" href="../assets/dropzone/downloads/css/dropzone.css" />
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />


        <!--flaty css styles-->
        <link rel="stylesheet" href="../css/flaty.css">
        <link rel="stylesheet" href="../css/flaty-responsive.css">

        <link rel="shortcut icon" href="../img/favicon.png">
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- BEGIN Theme Setting -->
        <div id="theme-setting">
            <a href="#"><i class="icon-gears icon-2x"></i></a>
            <ul>
                <li>
                    <span>Tema</span>
                    <ul class="colors" data-target="body" data-prefix="skin-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span>Barra de Navegação</span>
                    <ul class="colors" data-target="#navbar" data-prefix="navbar-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
                <li>
                    <span>Barra Lateral</span>
                    <ul class="colors" data-target="#main-container" data-prefix="sidebar-">
                        <li class="active"><a class="blue" href="#"></a></li>
                        <li><a class="red" href="#"></a></li>
                        <li><a class="green" href="#"></a></li>
                        <li><a class="orange" href="#"></a></li>
                        <li><a class="yellow" href="#"></a></li>
                        <li><a class="pink" href="#"></a></li>
                        <li><a class="magenta" href="#"></a></li>
                        <li><a class="gray" href="#"></a></li>
                        <li><a class="black" href="#"></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END Theme Setting -->

        <!-- BEGIN Navbar -->
        <div id="navbar" class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN Brand -->
                    <a href="#" class="brand">
                        <small>
                            <i class="icon-desktop"></i>
                            Finalité Gestion
                        </small> 
                    </a>
                    <!-- END Brand -->

                    <!-- BEGIN Responsive Sidebar Collapse -->
                    <a href="#" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-reorder"></i>
                    </a>
                    <!-- END Responsive Sidebar Collapse -->

                    <!-- BEGIN Navbar Buttons -->
                    <ul class="nav flaty-nav pull-right">
                                                  

                        <!-- BEGIN Button User -->
                        <li class="user-profile">
                            <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                                <img class="nav-user-photo" src="../../images/logo.png" />
                                <span class="hidden-phone" id="user_info">
                                    <?php echo $nome_usuario ?>
                                </span>
                                <i class="icon-caret-down"></i>
                            </a>

                            <!-- BEGIN User Dropdown -->
                            <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                                <li class="nav-header">
                                    <i class="icon-time"></i>
                                    Online
                                </li>

                                <li>
                                    <a href="<?php echo "../alt_usuario.php?id=$id_usuario"; ?>">
                                        <i class="icon-user"></i>
                                        Editar Perfil
                                    </a>
                                </li>


                                <li class="divider visible-phone"></li>

                                <li class="visible-phone">
                                    <a href="#">
                                        <i class="icon-tasks"></i>
                                        Tasks
                                        <span class="badge badge-warning">4</span>
                                    </a>
                                </li>
                                <li class="visible-phone">
                                    <a href="#">
                                        <i class="icon-bell-alt"></i>
                                        Notifications
                                        <span class="badge badge-important">8</span>
                                    </a>
                                </li>
                                <li class="visible-phone">
                                    <a href="#">
                                        <i class="icon-envelope"></i>
                                        Messages
                                        <span class="badge badge-success">5</span>
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="../logout.php">
                                        <i class="icon-off"></i>
                                        Sair
                                    </a>
                                </li>
                            </ul>
                            <!-- BEGIN User Dropdown -->
                        </li>
                        <!-- END Button User -->
                    </ul>
                    <!-- END Navbar Buttons -->
                </div><!--/.container-fluid-->
            </div><!--/.navbar-inner-->
        </div>
        <!-- END Navbar -->