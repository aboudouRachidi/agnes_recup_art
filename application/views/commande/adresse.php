
		<!-- checkout -->
<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="">
                       <a href="<?php echo base_url()?>" title="Aller à la Page d'Accueil">Accueil</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="">
                       adresse
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php if(isset($_SERVER['HTTP_REFERER']))echo $_SERVER['HTTP_REFERER']?>">Retour à la page précédente</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			 
			 <h2>Livraison</h2>
              				
				  	<?php if(!empty($users)):?>
					<?php foreach ($users as $user):?>
					<form action="<?=base_url('checkout/orderDelivry')?>" method="POST">
							<div class="row">
								  <div class="col-md-12 text-right">	
									<input  class="btn btn-default btn-lg" type="submit" value="suivant">
								</div>
							</div>
					<div class="jumbotron">
					  <h4>Confirmer l'adresse de livraison</h4>				        
				        <div class="col-xs-10">
				      		<div class="form-group">
					            <label class="control-label col-xs-3" for="postalAddress">Adresse de Livraison:</label>
					            <div class="col-xs-9"></div>
								
								  <div class="card card-block">
							        <div class="form-group">
							        <div class="col-xs-3"></div>
							            <div class="col-xs-9">
							            <?= form_error('adresseLivraison', '<div class="alert alert-danger">','</div>');?>
							            <?= form_error('codePostaleLivraison', '<div class="alert alert-danger">','</div>');?>
							            <?= form_error('villeLivraison', '<div class="alert alert-danger">','</div>');?>
							                <textarea rows="2" name="adresseLivraison" class="form-control" id="delivryAddress" placeholder="Adresse de livraison"><?=$user->adresse_livraison;?></textarea>
							                Code Postale<input type="text" name="codePostaleLivraison" class="form-control" id="ZipCodeLivraison" placeholder="Code Postale livraison" value="<?=$user->code_postale_livraison;?>">
							                Ville<input type="text" name="villeLivraison" class="form-control" id="countryLivraison" placeholder="Ville livraison" value="<?=$user->ville_livraison;?>">
							            </div>
							        </div>
								  </div>
							</div>
						</div>
					  <div class="clearfix"></div>
					</div>
				</form>
				 <?php endforeach;?>
				<?php endif;?>
			</div>
		</div>