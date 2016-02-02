					<?php if(!empty($galeries)):?>
	       	   		
<div class="other-products">
		<div class="container">
				<header>
					<h3 class="head text-center">Ma Galerie</h3>
				</header>      			
				     <ul id="flexiselDemo3">
				     <?php foreach ($galeries as $galerie):?>
						<li>
						 <div class="row style_featured">
            				<div class="col-xs-6 col-md-3">				
								<img class="img-rounded img-thumbnail" src="<?= base_url()?>ressources/images/galerie/<?= $galerie->url;?>" class="img-responsive" title="<?php echo $galerie->titre?>" style="max-height:280px; max-width:280px"/>
						 	</div>
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