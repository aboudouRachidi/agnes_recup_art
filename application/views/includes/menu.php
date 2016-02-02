
	<div class="inner-banner">
		<div class="container">
			<div class="banner-top inner-head">
				<nav class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
				<div class="logo">
					<h1><a href="<?php echo base_url()?>"><span>A</span>GNES RECUP-ART</a></h1>
				</div>
	    </div>
	    <!--/.navbar-header-->
	
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
			<li><a href="<?php echo base_url()?>">Accueil</a></li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produits <b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
									<h6>Par catégories</h6>
									
									<?php if(!empty($categories)):?>
									<?php foreach ($categories as $categorie):?>
						            
						            <li><a href="<?= base_url('products/categoryProducts/'.strtolower(url_title(convert_accented_characters($categorie->nom_categorie))).'/'.$categorie->id_categorie)?>"><?= $categorie->nom_categorie?></a></li>
						            
						            <?php endforeach; ?>
						            <?php endif; ?>
						            
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
									<h6>Par matériaux</h6>
									
									<?php if(!empty($materiaux)):?>
									<?php foreach ($materiaux as $materiau):?>
						            
						            <li><a href="<?= base_url('products/materialProducts/'.strtolower(url_title(convert_accented_characters($materiau->nom_materiaux))).'/'.$materiau->id_materiaux)?>"><?= $materiau->nom_materiaux?></a></li>
						            
						            <?php endforeach; ?>
						            <?php endif;?>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
									<h6>Afficher :</h6>
						            <li><a href="<?=base_url('products')?>">Tous les produits</a></li>
					            </ul>
				            </div>
							<div class="clearfix"></div>
			            </div>
		            </ul>
		        </li>
		        
		        <li class="dropdown"><a href="<?= base_url('agenda')?>" >Agenda</a></li>
		        
		        <li class="dropdown"><a href="<?= base_url('blog')?>" >Blog</a></li>
		        
		        <li class="dropdown"><a href="<?= base_url('galerie')?>" >Galerie</a></li>
		        
		        <li class="dropdown"><a href="<?= base_url('presentation')?>" >Qui suis je</a></li>
		        
				<li><a href="<?= base_url('contact')?>">CONTACT</a></li>
	        </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
	</div>
		</div>
		