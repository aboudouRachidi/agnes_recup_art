
<!-- content-section-starts-here -->
<div class="container">
	<div class="main-content">	
		 <div class="container">
		        <div class="row style_featured">
		        			<?php if(!empty($galeries)):?>
		        			
<!-- pagination -->					

	<div class="col-md-12 text-right">	
		<?=$this->pagination->create_links();?>
	</div>

<!-- pagination -->
			       	   		<?php foreach ($galeries as $galerie):?>
		            <div class="col-md-4">
		                <div>
		                    <a class="zoombox zgallery1" title="<?= $galerie->description?>" href="<?= base_url()?>ressources/images/galerie/<?= $galerie->url?>">
								<img src="<?= base_url()?>ressources/images/galerie/<?= $galerie->url?>" alt="<?= $galerie->titre?>" title="<?= $galerie->titre?>" style="max-height:280px; max-width:280px"/>
							</a>
							
		                    <h4><?= $galerie->titre?></h4>
		                    
		                    <p style="text-align: left;">
		                        	<?=character_limiter($galerie->description,100)?>
		                    </p>
		                    <div><i class="fa fa-book"></i><a href="#" data-toggle="modal" data-target="#myModal<?=$galerie->id_galerie?>">Lire</a></div>
							<!-- Modal -->
							<div class="modal fade" id="myModal<?=$galerie->id_galerie?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title text-center" id="myModalLabel"><?=$galerie->titre?></h4>
							      </div>
							      <div class="modal-body">
							       	<?=$galerie->description?>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
							      </div>
							    </div>
							  </div>
							</div>
		                </div>
		            </div>
		            	<?php endforeach;?>
<!-- pagination -->					

	<div class="col-md-12 text-right">	
		<?=$this->pagination->create_links();?>
	</div>

<!-- pagination -->
						<?php endif;?>
		        	</div>
				</div>
	</div>
</div>
		
<style>
.style_featured{
    padding: 20px 0;
    text-align: center;
}
.style_featured > div > div{
    padding: 10px;
    border: 1px solid ;
    border-radius: 4px;
    transition: 0.5s;
}
.style_featured > div:hover > div{
    
    border: 1px solid rgb(153, 200, 250);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 9px 9px 9px;
    background: rgba(153, 200, 250, 0.1);
    transition: 0.99s;
}
</style>
