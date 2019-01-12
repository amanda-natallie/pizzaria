<?php 

require("../config.php");

$acao  = $_GET['acao'];

/* Exclui Usuários */
if($acao == "usuarios")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
        	
        $sql = 'DELETE FROM tbl_usuario WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_usuarios.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "video")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
        	
        $sql = 'DELETE FROM tbl_videos WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_videos.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "pagina")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
        	
        $sql = 'DELETE FROM tbl_paginas WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_paginas.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "upload")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'SELECT * FROM tbl_upload WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem1 = $rs->imagem;	
		
		
        if($imagem1 != "")
        {
                unlink("../../".$imagem1);	
        }
        
        $sql = 'DELETE FROM tbl_upload WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_upload.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "link")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'DELETE FROM tbl_links WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_links.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "categorias")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'DELETE FROM tbl_categorias WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_cat.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
  if($acao == "subcategoria")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'DELETE FROM tbl_subcategorias WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_subcategorias.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "slide")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'SELECT * FROM tbl_slides WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem1 = $rs->imagem;	
		
		
        if($imagem1 != "")
        {
                unlink("../../".$imagem1);	
        }
        
        $sql = 'DELETE FROM tbl_slides WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_slide.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "produto")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'SELECT * FROM tbl_produtos WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem1 = $rs->imagem;	
		
		
        if($imagem1 != "")
        {
                unlink("../../".$imagem1);	
        }
        
        
        $sql = 'DELETE FROM tbl_produtos WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_cardapio.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "eventos")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'SELECT * FROM tbl_eventos WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem2 = $rs->imagem;	
		
		
        if($imagem2 != "")
        {
                unlink("../../".$imagem2);	
        }
        
        $sql = 'DELETE FROM tbl_eventos WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_eventos.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
if($acao == "email")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'DELETE FROM tbl_newsletter WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_emails.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
  if($acao == "cliente")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'SELECT * FROM tbl_clientes WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem2 = $rs->imagem;	
		
		
        if($imagem2 != "")
        {
                unlink("../../".$imagem2);	
        }
        
        $sql = 'DELETE FROM tbl_clientes WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_clientes.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
   if($acao == "parceiro")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'SELECT * FROM tbl_parceiros WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem2 = $rs->imagem;	
		
		
        if($imagem2 != "")
        {
                unlink("../../".$imagem2);	
        }
        
        $sql = 'DELETE FROM tbl_parceiros WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_parceiros.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
    if($acao == "img_galeria")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	$id_galeria= $_POST['galeria'];
        $sql = 'SELECT * FROM tbl_img_galerias WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem2 = $rs->imagem;	
		
		
        if($imagem2 != "")
        {
                unlink("../../".$imagem2);	
        }
        
        $sql = 'DELETE FROM tbl_img_galerias WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="imagens_galeria.php?id='.$id_galeria.'";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
     if($acao == "galeria")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	$sql = 'SELECT * FROM tbl_img_galerias WHERE galeria = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem2 = $rs->imagem;	
		
		
        if($imagem2 != "")
        {
                unlink("../../".$imagem2);	
        }
        
        $sql = 'DELETE FROM tbl_img_galerias WHERE galeria = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                
            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
        
        $sql = 'SELECT * FROM tbl_galerias WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem2 = $rs->capa;	
		
		
        if($imagem2 != "")
        {
                unlink("../../".$imagem2);	
        }
        
        $sql = 'DELETE FROM tbl_galerias WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_galerias.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 
 if($acao == "depoimento")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'SELECT * FROM tbl_depoimentos WHERE id = :id';   

        try{

            $read = $db->prepare($sql);
            $read->bindParam(':id', $id, PDO::PARAM_STR);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $rs = $read->fetch(PDO::FETCH_OBJ);
        
        $imagem1 = $rs->imagem;	
		
		
        if($imagem1 != "")
        {
                unlink("../".$imagem1);	
        }
        
        $sql = 'DELETE FROM tbl_depoimentos WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_depoimentos.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
 if($acao == "perguntas")
{

	if(isset($_POST['id']))
	{
	$id = $_POST['id'];
	
        $sql = 'DELETE FROM tbl_perguntas WHERE id = :id';
            
        try{

            $create = $db->prepare($sql);
            $create->bindValue(':id', $id, PDO::PARAM_INT);

            if($create->execute() ){
                echo '<script type="text/javascript" >
                        alert( "Registro Excluido com Sucesso!"); location.href="ger_perguntas.php";
                </script>';

            }


        } catch (PDOException $e) {
                echo "Erro ao Alterar Registro! - " . $e->getMessage();
        }
    
        }
 }
	?>
    
