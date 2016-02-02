<!-- content-section-starts -->
<div class="container">
	<div class="row wrap">
	
			<?php if(!empty($blogs)):?>
				<!-- pagination -->					
				<div class="row">
					<div class="col-md-12 text-right">	
						<?=$this->pagination->create_links();?>
					</div>
				</div>
				<!-- pagination -->
																						
	    <div class="col-sm-3">
	        <div class="row">
	            <div class="col-xs-12">
	                <!-- <h2>Archives</h2>  -->
	                <div class="panel panel-default">
	                    <div class="panel-heading text-center">Archives</div>
	                    <div class="panel-body">
	                        <?php foreach ($DateArchives as $DateArchive):?>
	                        	<h4 class="text-center">
	                        		<a class="label label-info" href="<?=base_url('blog/archive/'.$DateArchive->blogDate)?>"><?=$DateArchive->blogDate?></a>
	                        	</h4>
	                        	
	                        <?php endforeach;?>
	                    </div>
	                    <div class="text-center">
	                       <!-- <a href="#"><span class="glyphicon glyphicon-plus"></span> Full Story</a> -->
	                    </div>
	                </div>
	                <!--<hr />  -->
	            </div>
	        </div>
	    </div>
		       	   		<?php foreach ($blogs as $blog):?>
		<div class="col-sm-3"></div>	
	    <div class="col-sm-9">
	        <div class="row">
	            <div class="col-xs-12">
	                <h2><?=$blog->titre?></h2>
	                <p>
	                    <?=$blog->texte?>
	                </p>
	                <br>
	                <div class="text-center">
	                    <a href="#"><span class="glyphicon glyphicon-calendar"></span><?php $bad_date = $blog->date; $better_date = nice_date($bad_date, 'd-m-Y'); echo $better_date?> </a>
	                    
	                    <a data-toggle="modal" data-target="#Media<?=$blog->id_blog?>" href="#"><span class="glyphicon glyphicon-eye-open"></span> Aperçu de l'image/video</a>
	                </div>
	            </div>
	        </div>
	        <hr />
	<!-- Modal media(image ou video)-->
	<div class="modal fade col-xs-12" id="Media<?=$blog->id_blog?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-center" id="myModalLabel"><?=$blog->titre?></h4>
	      </div>
	      <div class="modal-body text-center">
							<?php if($blog->url_video==""):?>
							<a class="zoombox" href="<?=base_url()?>ressources/images/blog/<?= $blog->url_photo?>">
							 <img src="<?= base_url()?>ressources/images/blog/<?= $blog->url_photo?>" data-imagezoom="true" class="img-responsive img-rounded center-block" alt="" /> 
							</a>
							<?php else:?>
							<?=$blog->url_video?>
							<?php endif;?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Modal media(image ou video)-->
</div>	
						<?php endforeach;?>
						<!-- pagination -->					
						<div class="row">
							<div class="col-md-12 text-right">	
								<?=$this->pagination->create_links();?>
							</div>
						</div>
						<!-- pagination -->
						<?php endif;?>


	</div>
</div>
<!-- content-section-ends -->

<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
    .modal-content iframe,.modal-content img{
        margin: 0 auto;
        display: block;
    }
</style>