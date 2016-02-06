<?//php var_dump($_SESSION)?>
	<div class="banner">
		<div class="container">
<div class="banner-bottom">
	<div class="banner-bottom-left">
		<h2>B<br>U<br>Y</h2>
	</div>
	<div class="banner-bottom-right">
		<div  class="callbacks_container">	       
					<ul class="rslides" id="slider4">
					<?php if(!empty($messageDefilant)):?>
	       	   		<?php foreach ($messageDefilant as $message):?>
	       	   		<?php if($message->afficher == 1){ ?>
						<li>
							<div class="banner-info">
								<h4><?=$message->message;?></h4>
								<p></p>
							</div>
						</li>
						<!--
							<li>
								<div class="banner-info">
								   <h3>Shop Online</h3>
									<p>Start your shopping here...</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								  <h3>Pack your Bag</h3>
									<p>Start your shopping here...</p>
								</div>								
							</li>
						  -->
					<?php } endforeach;?>
					<?php endif;?>
						</ul>

					</div>
					<!--banner-->

	  			<script src="<?php echo base_url()?>ressources/js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	</div>
	<div class="clearfix"> </div>
</div>
	<div class="shop">
		<a href="<?=base_url('products')?>">ACCEDER A NOTRE BOUTIQUE</a>
	</div>
	</div>
		</div>
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
			<!--
				<div class="online-strip">
					<div class="col-md-4 follow-us">
						<h3>Suivez-moi : <a class="facebook" href="#"></a></h3>
					</div>
					<div class="col-md-4 shipping-grid">
						<div class="shipping">
							<img src="<?php echo base_url()?>ressources/images/shipping.png" alt="" />
						</div>
						<div class="shipping-text">
							<h3>Livraison gratuite</h3>
							<p>sur les commande de plus de 100 €</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 online-order">
						<p>Commander en ligne</p>
						<h3>Tel : 0750 xx xx xx</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				-->
				<div class="products-grid">
				<header>
					<h3 class="head text-center">Les derniers articles</h3>
				</header>
					<?php if(!empty($lastProducts)):?>
	       	   		<?php foreach ($lastProducts as $lastProduct):?>
	       	   		
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a class="zoombox" href="<?= base_url()?>ressources/images/photoProduit/<?=$lastProduct->photo_principale?>"><img src="<?= base_url()?>ressources/images/photoProduit/<?=$lastProduct->photo_principale?>" alt="" id="img-responsive" class="img-responsive thumbnail"/></a>
						<div class="mask">
							<a class="zoombox" href="<?= base_url()?>ressources/images/photoProduit/<?=$lastProduct->photo_principale?>">Aperçu</a>
						</div>
						<a href="<?=base_url('single/index/'.strtolower(url_title(convert_accented_characters($lastProduct->nom_produit))).'/'.$lastProduct->id_produit)?>" class="product_name"><?=$lastProduct->nom_produit?></a>
						<p><a class="item_add" href="<?=base_url('single/index/'.strtolower(url_title(convert_accented_characters($lastProduct->nom_produit))).'/'.$lastProduct->id_produit)?>"><i></i> <span class="item_price"><?=$lastProduct->prix?> €</span></a></p>
					</div>
					<?php endforeach;?>
					<?php endif;?>

					<div class="clearfix"></div>
				</div>
			</div>

		</div>
		