
		<!-- checkout -->
<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?=base_url()?>" title="Aller à la Page d'Accueil">Accueil</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="">
                       adresse
                    </li>
                    <li class="">
                    <span>&gt;</span>
                       recapitulatif
                    </li>
                    <li class="">
                    <span>&gt;</span>
                       Commande validé
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?=base_url()?>">Retour à la page d'accueil</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>

			 <?php if($this->cart->contents()):?>
	 			<div class="row"><a id="top"></a>
	 			<div class="col-md-4"><h5>Total commande <?= $this->cart->total();?> € <span class="label label-default">(<?= $this->cart->total_items();?> Article(s))</span></h5></div>
	   				<div class="col-md-8 text-right">

	   					<a href="<?=base_url('checkout/sendOrder')?>" class="btn btn-default btn-md" role="button">Envoyer à <?=$_SESSION['auth']['email']?></a>

					</div>
				</div>
				
				<div class="jumbotron">
			 <?php foreach ($this->cart->contents() as $article):?>
			 	     <input type="hidden" name="id_produit" value="<?=$article['id']?>"><input type="hidden" name="total" value="<?=$this->cart->total();?>">         				
					<div class="col-md-2">
						<a class="thumbnail"><img src="<?= base_url()?>ressources/images/photoProduit/<?=$article['picture']?>" class="img-responsive"></a>
					</div>
						<h4><?=$article['name']?>
							<span><?=$article['price']?> €</span>
						</h4>
						<div class="col-md-6">Quantité : <?=$article['qty']?></div>
							
							<div class="col-md-6">Livraison par : <?=$article['typeLivraison']?></div>
							
							<div class="col-md-2">Frais Livraison : <?=$article['fraisLivraison']?>€</div>
					<div class="clearfix"></div>
					<?php endforeach;?>
				</div>	
				<?php endif;?>
		</div>
</div>
		