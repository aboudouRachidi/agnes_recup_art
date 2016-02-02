<?php if(!empty($sliderProducts)):?>
<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Les articles en vedette</h3>        			
				     <ul id="flexiselDemo3">
				     			 
			<?php foreach ($sliderProducts as $sliderProduct):?>
						<li>
						<div class="well">
							<a href="<?= base_url('single/index/'.strtolower(url_title(convert_accented_characters($sliderProduct->nom_produit))).'/'.$sliderProduct->id_produit)?>">
								<img src="<?=base_url()?>ressources/images/photoProduit/<?=$sliderProduct->photo_principale?>" class="img-responsive"/>
							</a>
						</div>	
							<div class="product liked-product simpleCart_shelfItem">
								<a class="like_name" href="single.html"><?=$sliderProduct->nom_produit?></a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price"><?=$sliderProduct->prix?>€</span></a></p>
							</div>
						</li>
					<?php endforeach;?>
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="<?php echo base_url()?>ressources/js/jquery.flexisel.js"></script>
				   </div>
				   </div>
<?php endif;?>