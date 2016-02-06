
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
				    	<h4 class="tag_head text-center">Tags</h4>
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
			
			
			<?php if(!empty($produit)):?>
			
			<div class="new-product">
				<div class="col-md-5 zoom-grid">
					<div class="flexslider">
						<ul class="slides">
						<?php if(!empty($photos_produit)):?>
						<?php foreach ($photos_produit as $photo_produit):?>
							<li data-thumb="<?= base_url()?>ressources/images/photoProduit/<?=$photo_produit->url_1?>">
								<div class="thumb-image"> <img src="<?= base_url()?>ressources/images/photoProduit/<?=$photo_produit->url_1?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
							</li>
						<?php endforeach;?>
						<?php else:?>
							<li data-thumb="<?= base_url()?>ressources/images/photoProduit/<?= $produit->photo_principale?>">
								<div class="thumb-image"> <img class="img-responsive" src="<?= base_url()?>ressources/images/photoProduit/<?= $produit->photo_principale?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
							</li>
						<?php endif;?>
						</ul>
					</div>
				</div>
				
				<div class="col-md-7 dress-info">
					<div class="dress-name">
						<h3><i><?=strtolower(url_title(convert_accented_characters($produit->nom_produit)))?></i></h3>
						<span><?= $produit->prix;?> €</span>
						<div class="clearfix"></div>
						<p><?= $produit->description?></p>
						<blockquote>
						<p><?= $produit->argumentaire?></p>
						</blockquote>
					</div>
					<div class="span span1">
						<p class="left">Dimension</p>
						<p class="right"><?= $produit->dimensions?></p>
						<div class="clearfix"></div>
					</div>
					<div class="span span2">
						<p class="left">Catégorie</p>
						<p class="right">&diams;<?= $produit->nom_categorie?></p>
						<div class="clearfix"></div>
					</div>
					<div class="span span3">
						<p class="left">Matériaux utilisés</p>
						<?php foreach ($produit_materiaux as $produit_materiau):?>
						<p class="right">&diams;<?= $produit_materiau->nom_materiaux;?>&nbsp;</p>
						<?php endforeach;?>
						<div class="clearfix"></div>
					</div>
					<div class="span span3">
						<p class="col-md-12 col-sm-12 col-xs-12  text-center">Couleur</p>
						<?php foreach ($produit_couleurs as $produit_couleur):?>
						<p class="right col-md-6 col-sm-6 col-xs-6"><?= $produit_couleur->couleur;?>&nbsp;
							<div id="cercle" class="right" style="background: <?= $produit_couleur->code_couleur;?>"></div>
						</p>
						<?php endforeach;?>
						<div class="clearfix"></div>
					</div>
					<div class="span span4">
						<p class="left">Type Livraison</p>
						<p class="right"><?= $produit->type_livraison?></p>
						<p class="left">Frais Livraison</p>
						<p class="right"><?= $produit->frais_livraison?> €</p>
						<div class="clearfix"></div>
					</div>
					<div class="purchase">
					
					<form action="<?=base_url('checkout/add')?>" method="POST">
						<input type="hidden" name="id_produit" value="<?= $produit->id_produit?>">
						<input type="hidden" name="prix" value="<?= $produit->prix?>">
						<input type="hidden" name="frais_livraison" value="<?= $produit->frais_livraison?>">
						<input type="hidden" name="type_livraison" value="<?= $produit->type_livraison?>">
						<input type="hidden" name="nom_produit" value="<?= strtolower(url_title(convert_accented_characters($produit->nom_produit)))?>">
						<input type="hidden" name="photo_principale" value="<?= $produit->photo_principale?>">
						<input type="submit" <?php if($produit->disponible == 0) {echo "disabled";} ?> class="cbp-vm-icon cbp-vm-add item_add" value="Ajouter au panier">
					</form>
						<!--
						<div class="social-icons">
							<ul>
								<li><a class="facebook1" href="#"></a></li>
								<li><a class="twitter1" href="#"></a></li>
								<li><a class="googleplus1" href="#"></a></li>
							</ul>
						</div>
						-->
						<div class="clearfix"></div>
					</div>
				<script src="<?= base_url()?>ressources/js/imagezoom.js"></script>
					<!-- FlexSlider -->
					<script defer src="<?= base_url()?>ressources/js/jquery.flexslider.js"></script>
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
				</div>
				<div class="clearfix"></div>
				
				<?php endif;?>
				

			</div>
			<div class="clearfix"></div>
			</div>
   </div>
   
   
   
   
   <!--
   <div class="other-products products-grid">
		<div class="container">
			<header>
				<h3 class="like text-center">Related Products</h3>   
			</header>			
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single"><img src="<?php echo base_url()?>ressources/images/p1.jpg" alt="" /></a>
						<div class="mask">
							<a href="single">Quick View</a>
						</div>
						<a class="product_name" href="single">Sed ut perspiciatis</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$329</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single"><img src="<?php echo base_url()?>ressources/images/p2.jpg" alt="" /></a>
						<div class="mask">
							<a href="single">Quick View</a>
						</div>
						<a class="product_name" href="single">great explorer</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$599.8</span></a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single"><img src="<?php echo base_url()?>ressources/images/p3.jpg" alt="" /></a>
						<div class="mask">
							<a href="single">Quick View</a>
						</div>
						<a class="product_name" href="single">similique sunt</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">$359.6</span></a></p>
					</div>
					<div class="clearfix"></div>
				  </div>
				</div>
				-->
   <!-- content-section-ends -->
   
   
			
 <script src="<?php echo base_url()?>ressources/js/responsive-tabs.js"></script>
    <script type="text/javascript">
      $( '#myTab a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      $( '#moreTabs a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>

