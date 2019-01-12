<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> 
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
        <link rel="stylesheet" href="css/flaty.css">
        <link rel="stylesheet" href="css/flaty-responsive.css">
        <link rel="shortcut icon" href="img/favicon.png">
        <script src="assets/modernizr/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="login-page" style=" background: #F7ECE0 !important">
        <div class="login-wrapper">
            <form id="form-login" method="post" action="confirma_login.php" enctype="multipart/form-data">
                <h3>Entrar no Sistema</h3>
                <hr/>
                <div class="control-group">
                    <div class="controls">
                        <input type="text" placeholder="Usuário" class="input-block-level" name="usuario" id="usuario" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="password" placeholder="Senha" class="input-block-level" name="senha" id="senha" />
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary input-block-level">Entrar</button>
                    </div>
                </div>
                <hr/>
                <p class="clearfix">
                    <a href="recuperar.php" class="goto-forgot pull-left">Esqueci minha senha</a>
                </p>
            </form>
    </body>
</html>
