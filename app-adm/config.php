<?php
	
        $conn = 'mysql:host=localhost;dbname=criativi_tres_irmaos';
        
        try{
            $db = new PDO($conn, 'criativi_user', 'criativin@*', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        $base = 'http://desenvolvimento.criativin.com.br/tres_irmaos/';
        $host_email = 'localhost';
        $porta_email = 25;
        $rem_email = 'naoresponda@site.com.br';
        $pass_email = '123456';
        $nome_Email = 'Site';
        $cor_email = '#FFA431';
?>
