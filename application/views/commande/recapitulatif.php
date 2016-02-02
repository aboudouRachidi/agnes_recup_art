
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
                </ul>
                <ul class="previous">
                	<li><a href="<?php if(isset($_SERVER['HTTP_REFERER']))echo $_SERVER['HTTP_REFERER']?>">Retour à la page précédente</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			 


	 			<div class="row"><a id="top"></a>
	 			<div class="col-md-8 col-sm-8 col-xs-8"><h1><span class="label label-warning">Total commande <?= $this->cart->total();?> € (<?= $this->cart->total_items();?> Article(s))</span></h1></div>
	   				
	   				<div class="col-md-4 text-right">
	   				<form action="<?=base_url('checkout/saveOrder')?>" method="post">
	   				<?php foreach ($this->cart->contents() as $article):?>
	   				<input type="hidden" name="id_produit" value="<?=$article['id']?>"><input type="hidden" name="qty" value="<?=$article['qty']?>">
	   				<?php endforeach;?>
	   				<input type="hidden" name="total" value="<?=$this->cart->total();?>">
	   				<input type="hidden" name="date" value="<?=date("Y-m-d");?>">
						<input type="submit" class="btn btn-success btn-lg" role="button" value="Enregistrer la commande">
					</form>
					</div>
				</div>
				
				
				
				
				
			 <?php if(!empty($users)):?>
			<?php foreach ($users as $user):?>
				<div class="jumbotron alert alert-success">
					<div class="well col-md-12">
					<h4 class="text-left">La livraison s'effectuera à l'adresse suivante :</h4>
						<h4 class="text-left"><?=$user->nom?> <?=$user->prenom?></h4>
						<h4 class="text-left"><?=$user->adresse_livraison?></h4>
						<h4 class="text-left"><?=$user->code_postale_livraison?>, <?=$user->ville_livraison?></h4>
					</div>
			<?php endforeach;?>
			<?php endif;?>
			 <?php foreach ($this->cart->contents() as $article):?>
			 	     <input type="hidden" name="id_produit" value="<?=$article['id']?>"><input type="hidden" name="total" value="<?=$this->cart->total();?>">         				
					<div class="col-md-2 col-sm-2">
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
				
	 			<div class="row"><a id="top"></a>
	 			<div class="col-md-8"></div>	   				
	   				<div class="col-md-4 text-right">
	   				<form action="<?=base_url('checkout/saveOrder')?>" method="post">
	   				<?php foreach ($this->cart->contents() as $article):?>
	   				<input type="hidden" name="id_produit" value="<?=$article['id']?>"><input type="hidden" name="qty" value="<?=$article['qty']?>">
	   				<?php endforeach;?>
	   				<input type="hidden" name="total" value="<?=$this->cart->total();?>">
	   				<input type="hidden" name="date" value="<?=date("Y-m-d");?>">
						<input type="submit" class="btn btn-success btn-lg" role="button" value="Enregistrer la commande">
					</form>
					</div>
				</div>
					
		</div>
</div>
		