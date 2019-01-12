<?php require('header.php'); ?>
		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('<?= $imagem[20]; ?>');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2><?= strip_tags($texto[50]); ?></h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="<?= $base; ?>">Home</a></li>
				  <li class="breadcrumb-item active"><a href=""><?= strip_tags($texto[50]); ?></a></li>
				</ol>
			</div>
		</section>
		<div class="center-wrapper cn-us new-block">
			<div class="fixed-bg parallax" style="background: url('<?= $imagem[21]; ?>');"></div>
			<div class="overlay"></div>
			<div class="send-msg new-block">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="block-stl11">
								<i class="flaticon-placeholder"></i>
								<p><?= $contato[1]; ?> - <?= $contato[2]; ?></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="block-stl11">
								<i class="flaticon-phone-call"></i>
								<p><?= $contato[4]; ?> <br><?= $contato[5]; ?></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="block-stl11">
								<i class="flaticon-message"></i>
								<p><?= $contato[10]; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-block1">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title">
								<h2><?= strip_tags($texto[51]); ?></h2>
                                                                <?php
                                                                $t = str_replace('<p>', '<p class="bottom-p">', $texto[52]);
                                                                echo $t; 
                                                                ?>
                                                        </div>
						</div>
						<div class="clearfix"></div>
						<form action="#">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Nome" class="form-control">
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Assunto" class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Telefone" class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Email" class="form-control">
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<textarea class="form-control" placeholder="Mensagm"></textarea>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 text-center">
								<input type="button" class="btn btn3" value="Enviar">
							</div>
						</form>
					</div>
				</div>
			</div>
				
		</div>
<div>
<?php
$sql = 'SELECT * FROM tbl_mapa';   
                                
try{

    $read = $db->prepare($sql);
    $read->bindParam(':id', $id, PDO::PARAM_STR);
    $read->execute();

} catch (PDOException $ex) {
    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
}

$rs = $read->fetch(PDO::FETCH_OBJ);    
echo $rs->codigo;
?>
</div>
<?php require('footer.php'); ?>