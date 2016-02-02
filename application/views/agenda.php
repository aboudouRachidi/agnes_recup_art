
 <!-- content-section-starts -->
<div class="col-md-12">
	<div class="container">
		<div class="row wrap">
		
<?php if(!empty($agenda)):?>
					
			<div class="row"><a id="top"></a>
   				<div class="col-md-12 text-right">	
					<?=$this->pagination->create_links();?>
				</div>
			</div>
			
	<div class="col-sm-3">														
        <div class="row">
            <div class="col-xs-12">
                <!--<h2>Side</h2>  -->
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Archives</div>
                    <div class="panel-body">
                        <?php foreach ($DateArchives as $DateArchive):?>
                        	<h4 class="text-center">
                        		<a class="label label-info" href="<?=base_url('agenda/archive/'.$DateArchive->agendaDate)?>"><?=$DateArchive->agendaDate?></a>
                        	</h4>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
																
	       	   		<?php foreach ($agenda as $evenement):?>	
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-xs-12">
                <h2><?=$evenement->titre?></h2>
					<div class="thumbnail col-md-3">
						
						<?php if($evenement->url_photo == ''){?>
						<a class="zoombox" href="<?=base_url()?>ressources/images/Logo.jpg">
							<img src="<?= base_url()?>ressources/images/Logo.jpg" data-imagezoom="true" class="img-responsive" alt="" /></a><?php }else{?>
						<a class="zoombox" href="<?=base_url()?>ressources/images/agenda/<?= $evenement->url_photo?>">
							<img src="<?= base_url()?>ressources/images/agenda/<?= $evenement->url_photo?>" data-imagezoom="true" class="img-responsive" alt="" /> 
						</a>
						
						<?php }?>

					</div>
					<div class="text-justify">
                <p>
                    <?=$evenement->description?>
                </p>
                </div>
                <br>
                <div class="text-center col-md-12">
                    <a href="#"><span class="fa fa-calendar-check-o"></span>Du : <?php $bad_date = $evenement->date_debut; $better_date = nice_date($bad_date, 'd-m-Y'); echo $better_date?></a>
                    &nbsp;
                    <a href="#"><span class="fa fa-calendar-times-o"></span>Au : <?php $bad_date = $evenement->date_fin; $better_date = nice_date($bad_date, 'd-m-Y'); echo $better_date?></a>
                </div>
            </div>
        </div>
        <hr /> 
    </div>
					<?php endforeach;?>
					
			<div class="row">
   				<div class="col-md-12 text-right">	
				<?=$this->pagination->create_links();?>
				</div>
			</div>
					<?php endif;?>

		</div>			
	</div>
</div>

   <!-- content-section-ends -->