<?php require("config.php");
$ds = DIRECTORY_SEPARATOR;
 
$storeFolder = '../midias/imagens/'; 
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name']; 
	$dividir1 = explode(".", $_FILES['file']['name']);
		
	// Gera um nome aleatório
	$nome = time();
	$nome_imagem1 = $nome . "." . $dividir1[1];          
        
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
     
        $targetFile =  $targetPath . $nome_imagem1;  
 
        move_uploaded_file($tempFile,$targetFile); 
	
	$pasta = "midias/imagens/" . $nome_imagem1;
        $codigo = $url_base . "midias/imagens/" . $nome_imagem1;
	
	$sql = 'INSERT INTO tbl_upload(imagem, codigo)';
        $sql .= ' VALUES (:imagem, :codigo)';

        try{

            $create = $db->prepare($sql);
            $create->bindValue(':imagem', $pasta, PDO::PARAM_STR);
            $create->bindValue(':codigo', $codigo, PDO::PARAM_STR);

            if($create->execute() ){
                
            }


        } catch (PDOException $e) {
                echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
        }	
	
}

?>

