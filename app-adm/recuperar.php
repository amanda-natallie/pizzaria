<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Recuperar Senha</title>
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
    <body class="login-page">
        <div class="login-wrapper">
            <form id="form-login" method="post" action="confirma_login.php" enctype="multipart/form-data">
                <h3>Recuperação de Senha</h3>
                <hr/>
                <div class="control-group">
                    <div class="controls">
                        <input type="text" placeholder="Email" class="input-block-level" name="usuario" id="usuario" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="button" onclick="redefinir()" class="btn btn-primary input-block-level">Redefinir</button>
                    </div>
                </div>
                <hr/>
                <div class="control-group">
                    <div class="alert alert-info" id="aguarde_redefinir" style="text-align: center !important;  display: none">
                        Processando...
                    </div>
                    <div class="alert alert-warning" id="erro_redefinir" style=" display: none">
                        Preencha todos os campos.
                    </div>
                    <div class="alert alert-danger" id="erro2_redefinir" style=" display: none">
                        Email não encontrado.
                    </div>
                    <div class="alert alert-success" id="sucesso_redefinicao" style=" display: none;">
                      Uma nova senha foi gerada e enviada para seu email.
                  </div>
                </div>
                <p class="clearfix">
                    <a href="login.php" class="goto-forgot pull-left">Voltar para o login</a>
                </p>
            </form>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
            <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
