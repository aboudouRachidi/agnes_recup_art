
		<!-- checkout -->
<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo base_url()?>" title="Aller à la Page d'Accueil">Accueil</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Panier
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php if(isset($_SERVER['HTTP_REFERER']))echo $_SERVER['HTTP_REFERER']?>">Retour à la page précédente</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			 	<?php if(isset($_SESSION['info'])):?>
					<div class="alert alert-warning" id="alert-message"> <?=$_SESSION['info'];?></div>
				<?php endif;?>	
			 <h2>MON PANIER (<?= $this->cart->total_items();?>)</h2>
			 <?php if($this->cart->contents()):?>
	 			<div class="row"><a id="top"></a>
	 			<div class="col-md-8"></div>
	   				<div class="col-md-4 text-right">	
						<a href="<?= base_url('checkout/orderDelivry')?>" class="btn btn-default btn-lg" role="button">Commander maintenant</a>
					</div>
				</div>
			 <?php foreach ($this->cart->contents() as $article):?>	               				
 				<form action="<?=base_url('checkout/update')?>" method="POST">
					<input type="hidden" name="rowid" value="<?= $article['rowid']?>">

							<div class="cart-gd">
								 <div class="well well-lg">
								 <div class="cart-header">
									 <div class="cart-sec simpleCart_shelfItem">
											<div class="cart-item cyc">
												<a class="thumbnail"><img src="<?= base_url()?>ressources/images/photoProduit/<?=$article['picture']?>" class="img-responsive" alt=""></a>
											</div>
										   <div class="cart-item-info">
											<h3><a href="<?= base_url('single/index/'.strtolower(url_title(convert_accented_characters($article['name']))).'/'.$article['id'])?>">
													<?=$article['name']?>
												</a><h4><?=$article['price']?> €</h4>
											</h3>
											
											<ul class="qty">
												<li><p>Quantité</p></li>
												<li><p><input type="number" min="0" size="3"name="qty" value="<?=$article['qty']?>"></p></li>
												<li><input type="submit" class="btn-success btn-xs " value="Modifier"></li>
												<li><a class="btn btn-default btn-xs" role="button" href="<?= base_url('checkout/delete/'.$article['rowid'])?>"><i class="fa fa-times fa-2x"></i></a></li>
											</ul>
												 <div class="delivery">
												 		<ul class="list-group">
														  <li class="list-group-item">
														    <span class=""><?=$article['typeLivraison']?></span>
														    Type de livraison : 
														  </li>
														  <li class="list-group-item">
														    <span class=""><?=$article['fraisLivraison']?>€</span>
														    Frais de livraison :  
														  </li>
														</ul>
												 <div class="clearfix"></div>
									        </div>	
										   </div>
										   <div class="clearfix"></div>
																
									  </div>
								 </div>	
								</div>						  
						  </form>
						 <?php endforeach;?>
						 <?php else :?>
						  <div class="cart-header3">
							  <div class="cart-sec simpleCart_shelfItem">

									<div class="jumbotron">
										  <h3><i class="fa fa-shopping-basket fa-5x">PANIER VIDE</i></h3>
										  
										  <p><a class="btn btn-default btn-lg" href="<?=base_url('products')?>" role="button">ACCEDER A NOTRE BOUTIQUE</a></p>
									</div>
	
		
								   <div class="clearfix"></div>					
							  </div>
						  </div>
						<?php endif;?>
					</div>
		</div>
<!-- //checkout -->	

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><p class="text-center">Connexion</p></h4>
      </div>
<form role="form" action="<?=base_url('checkout/connect')?>" method="POST">
      <div class="modal-body">
                  <div class="form-group">
                    <label for="InputEmail1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" required placeholder="Votre adresse email"/>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                      <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" required placeholder="Votre mot de passe"/>
                  </div>


      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-danger"data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Connexion</button>
                         
      </div>
 </form>
    </div>
  </div>
</div>