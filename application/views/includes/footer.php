		<!-- Mentions Legales -->
		<div class="modal fade" id="modalML" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Mentions Légales</h4>
		      </div>
		      <div class="modal-body">
		        	<?php if(!empty($mentionsLegales)):?>
	       	   		<?php foreach ($mentionsLegales as $mention):?>
	       	   		<?=$mention->texte;?>
	       	   		
					<?php endforeach;?>
					<?php endif;?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Lu</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!--Fin Mentions Legales -->
		
		<!-- Livraison -->
		<div class="modal fade" id="modalLiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center" id="myModalLabel">Livraison</h4>
		      </div>
		      <div class="modal-body">
				.........
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!--Fin Livraison -->	
		<!-- content-section-ends-here -->
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h5>INSCRIPTION A LA NEWSLETTER</h5>
					<div class="sub-left-right">
						<form action="<?=base_url('Accueil/newsubscribe')?>" method="post">
							<input type="text" name="email" value="Renseigner votre e-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Renseigner votre e-mail';}" />
							<input type="submit" value="ABONNEZ-VOUS" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="footer">
		<div class="container">
		 <div class="footer_top">
			<div class="span_of_4">
				<div class="col-md-3 span1_of_4">
					<h4>Agnes Recup-Art</h4>
					<ul class="f_nav">
						<li><a href="<?=base_url('products')?>">Products</a></li>
						<li><a href="<?=base_url('agenda')?>">Agenda</a></li>
						<li><a href="<?=base_url('blog')?>">Blog</a></li>
						<li><a href="<?=base_url('galerie')?>">Galerie</a></li>
						<li><a href="<?=base_url('presentation')?>">Qui suis je</a></li>
						<li><a href="<?=base_url('contact')?>">Contact</a></li>
						<li><a href="<?= base_url('checkout')?>">Panier</a></li>
					</ul>	
				</div>
				
				<div class="col-md-3 span1_of_4">
					<h4>Compte</h4>
					<ul class="f_nav">
						<li><a href="<?= base_url('login')?>">Se connecter</a></li>
						<li><a href="<?= base_url('register')?>">Créer un compte</a></li>
					</ul>	
				</div>
				
				<div class="col-md-3 span1_of_4">
					<h4>Informations</h4>
					<ul class="f_nav">
						<li><a href="#" data-toggle="modal" data-target="#modalLiv">Livraisons</a></li>
					</ul>	
				</div>

				<div class="col-md-3 span1_of_4">
					<h4>A propos</h4>
					<ul class="f_nav">
						<li><a href="#" data-toggle="modal" data-target="#modalML">Mentions légales</a></li>
					</ul>			
				</div>
				<div class="clearfix"></div>
				</div>
		  </div>
		  <div class="cards text-center">
				
		  </div>
		  <div class="copyright text-center">
				<p>© 2016 Agnès Recup'Art. All Rights Reserved | Design by   <a href="http://w3layouts.com">  W3layouts</a></p>
		  </div>
		</div>
		</div>
		
<!-- script de fermeture div info -->
<script>
$(document).ready(function () {
	 
	window.setTimeout(function() {
	    $("#alert-message").fadeTo(850, 0).slideUp(500, function(){
	        $(this).remove(); 
	    });
	}, 5000);
	 
	});
</script>

<!--fin script -->		
</body>
</html>