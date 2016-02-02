		
		<!-- content-section-starts -->
	<div class="container">
	   <div class="products-page">
			<div class="products">
				<div class="product-listy">
					<h2 class="text-center">Produits</h2>
					<ul class="product-list">
					<?php if(!empty($categories)):?>
					<?php foreach ($categories as $categorie):?>
						<li><a href="<?= base_url('products/categoryProducts/'.strtolower(url_title(convert_accented_characters($categorie->nom_categorie))).'/'.$categorie->id_categorie)?>"><?= $categorie->nom_categorie?></a></li>
					<?php endforeach;?>
					<?php endif;?>
					</ul>
				</div>

				<div class="tags">
				    	<h4 class="tag_head text-center">Tags Widget</h4>
				         <ul class="tags_links">
				         	<?php if(!empty($tagsCouleurs)):?>
							<?php foreach ($tagsCouleurs as $tagsCouleur):?>

							<li>
								<a href="<?= base_url('products/tagsCouleursProducts/'.strtolower(url_title(convert_accented_characters($tagsCouleur->couleur))).'/'.$tagsCouleur->id_couleur)?>">
									<?= $tagsCouleur->couleur?>
								</a>
							</li>
							
							<?php endforeach;?>
							<?php endif;?>
							
							<?php if(!empty($tagsMateriaux)):?>
							<?php foreach ($tagsMateriaux as $tagsMateriau):?>

							<li>
								<a href="<?= base_url('products/tagsMateriauxProducts/'.strtolower(url_title(convert_accented_characters($tagsMateriau->nom_materiaux))).'/'.$tagsMateriau->id_materiaux)?>">
									<?= $tagsMateriau->nom_materiaux?>
								</a>
							</li>
							
							<?php endforeach;?>
							<?php endif;?>
						</ul>
					
				     </div>
			</div>
			
			<div class="new-product">
				<div class="new-product-top">
					<ul class="product-top-list">
						<li><a href="<?= base_url()?>">Accueil</a>&nbsp;<span>&gt;</span></li>
						<li><span class="act">Produits</span>&nbsp;</li>
					</ul>
					<p class="back"><a href="<?php if(isset($_SERVER['HTTP_REFERER']))echo $_SERVER['HTTP_REFERER']?>">Retour à la page précédente</a></p>
					<div class="clearfix"></div>
				</div>
				<div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
			            <label>Trier par</label>
			            <select name="order" onchange="location = this.options[this.selectedIndex].value;">
			                            <option value="<?=base_url('products')?>">
			                    Position                </option>
			                            <option value="<?=base_url('products/orderByName')?>">
			                    Nom                </option>
			                            <option value="<?=base_url('products/orderByPrice')?>">
			                    Prix                </option>
			            </select>
			            
			            <a href=""><img src="<?= base_url()?>ressources/images/arrow2.gif" alt="" class="v-middle"></a>
			            
	                   </div>
	                   
	    		     </div>
	    		     	<!-- 
			    	        <ul class="women_pagenation">
						     <li>Page:</li>
						     <li class="active"><a href="#">1</a></li>
						     <li><a href="#">2</a></li>
					  	    </ul>
				  	    -->
	               		 <div class="clearfix"></div>		
			        </div>
			          
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
			        <!-- 
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="Grille">Grille</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">Liste</a>
					</div>   
       	 			-->
					<div class="clearfix"></div>


					<?php if(!empty($produits)):?>
						
					<ul>
       	   				<?php foreach ($produits as $produit):?>
					  <li>
							<a href="<?= base_url('single/index/'.strtolower(url_title(convert_accented_characters($produit->nom_produit))).'/'.$produit->id_produit)?>" class="cbp-vm-image" >
								<div class="simpleCart_shelfItem">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix well well-sm">
								<div class="product_image">
									<img src="<?= base_url()?>ressources/images/photoProduit/<?= $produit->photo_principale;?>" class="img-responsive" alt="<?= $produit->nom_produit;?>" title="<?= $produit->nom_produit;?>"/>
									<div class="mask">
			                       		<div class="info">Aperçu</div>
					                  </div>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title text-left"><?= $produit->nom_produit;?></p>
									   </div>
									   <div class="pricey well well-sm"><span class="item_price"><?= $produit->prix;?> €</span></div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
							<div class="cbp-vm-details">
								<?= character_limiter($produit->description,100);?>
							</div>
									<form action="<?=base_url('checkout/add')?>" method="POST">
										<input type="hidden" name="id_produit" value="<?= $produit->id_produit?>">
										<input type="hidden" name="prix" value="<?= $produit->prix?>">
										<input type="hidden" name="frais_livraison" value="<?= $produit->frais_livraison?>">
										<input type="hidden" name="type_livraison" value="<?= $produit->type_livraison?>">
										<input type="hidden" name="nom_produit" value="<?= strtolower(url_title(convert_accented_characters($produit->nom_produit)))?>">
										<input type="hidden" name="photo_principale" value="<?= $produit->photo_principale?>">
										<input type="submit" <?php if($produit->disponible == 0) {echo "disabled";} ?> class="cbp-vm-icon cbp-vm-add item_add" value="Ajouter au panier">
									</form>
							</div>
						</li>
			<?php endforeach;?>	

			</ul>
					
			<?php else: ?>
			
			<div class="jumbotron">
			  <h1>Aucun produit</h1>
			  
			  <p>Choisir par Materiau</p>
			  
			<?php if(!empty($materiaux)):?>
			<?php foreach ($materiaux as $materiau):?>
            
            <a class="btn btn-primary btn-xs" href="<?= base_url('products/materialProducts/'.strtolower(url_title(convert_accented_characters($materiau->nom_materiaux))).'/'.$materiau->id_materiaux)?>"><?= $materiau->nom_materiaux?></a>
            
            <?php endforeach; ?>
            <?php endif;?>
            <br><br>
			  <p>Choisir Couleur</p>
			  
         	<?php if(!empty($tagsCouleurs)):?>
			<?php foreach ($tagsCouleurs as $tagsCouleur):?>

				<a class="btn btn-default btn-md" style="background-color: <?= $tagsCouleur->code_couleur?>" href="<?= base_url('products/tagsCouleursProducts/'.strtolower(url_title(convert_accented_characters($tagsCouleur->couleur))).'/'.$tagsCouleur->id_couleur)?>">
					
				</a>
			
			<?php endforeach;?>
			<?php endif;?>
			</div>
			
			<?php endif; ?>
						
					
				</div>
				<script src="<?= base_url()?>ressources/js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="<?= base_url()?>ressources/js/classie.js" type="text/javascript"></script>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->
		