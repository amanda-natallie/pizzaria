<?php 
    require("../scripts/conexao.php");
	
	$disp = $_REQUEST['disp'];

	if($disp == 1)
	{?>
    
    <div class="control-group">
                                      <label class="control-label">Imagem Tecido</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                               <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem</span>
                                               <span class="fileupload-exists">Alterar</span>
                                               <input type="file" class="default" name="imagemtecido" id="imagemtecido"   /></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                         </div>
                                         
                                      </div>
                                   </div>
    
    <?php
		
	}
	
	else if($disp == 2)
	{?>
    
      
                                   <div class="control-group">
                                      <label class="control-label">Imagem Couro</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                               <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem</span>
                                               <span class="fileupload-exists">Alterar</span>
                                               <input type="file" class="default" name="imagemcouro" id="imagemcouro"  /></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                         </div>
                                         
                                      </div>
                                   </div>
    
    <?php
	}
	
	else if($disp == 3)
	{?>
    
    <div class="control-group">
                                      <label class="control-label">Imagem Tecido</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                               <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem</span>
                                               <span class="fileupload-exists">Alterar</span>
                                               <input type="file" class="default" name="imagemtecido" id="imagemtecido"   /></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                         </div>
                                         
                                      </div>
                                   </div>
                                   
                                   <div class="control-group">
                                      <label class="control-label">Imagem Couro</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                               <span class="btn btn-file"><span class="fileupload-new">Selecione a imagem</span>
                                               <span class="fileupload-exists">Alterar</span>
                                               <input type="file" class="default" name="imagemcouro" id="imagemcouro"  /></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remover</a>
                                            </div>
                                         </div>
                                         
                                      </div>
                                   </div>
    
    <?php
	}else
	{}
			
			
?>




		
					  
					 
						  
						 