<?php
function exportMysqlToCsv($table,$filename = 'exportado.csv')
{
	$csv_terminated = "\n";
	$csv_separator = ";";
	$csv_enclosed = '"';
	$csv_escaped = "\\";
	
	// Buscando os dados do BD
	$fields_cnt = 2;
	$schema_insert = '"nome";"email";';	
	$out = trim(substr($schema_insert, 0, -1));
	$out .= $csv_terminated;
        
        require('config.php');
        
        $sql = 'SELECT nome, email FROM ' . $table;       
        try{

            $read = $db->prepare($sql);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        $schema_insert = '';
	while($rs = $read->fetch(PDO::FETCH_OBJ))
	{
            $schema_insert .= $csv_enclosed.utf8_decode($rs->nome) . $csv_enclosed.';'.$csv_enclosed. utf8_decode($rs->email).$csv_enclosed;
            $schema_insert .= $csv_terminated;
        }
        $out .= $schema_insert;
        $out .= $csv_terminated;
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Length: " . strlen($out));

	//header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=$filename");
	echo $out;
	exit;
}
?>