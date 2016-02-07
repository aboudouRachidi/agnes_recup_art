<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Agnes recupart - <?php if(isset($title)) echo $title;?></title>
<link href="<?= base_url()?>ressources/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?= base_url()?>ressources/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="<?= base_url()?>ressources/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url()?>ressources/css/component.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="<?= base_url()?>ressources/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="<?= base_url()?>ressources/js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="<?= base_url()?>ressources/css/flexslider.css" type="text/css" media="screen" />

<!-- Zoombox -->
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>-->
<script type="text/javascript" src="<?= base_url()?>ressources/js/zoombox/zoombox.js"></script>
<link href="<?= base_url()?>ressources/js/zoombox/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript">
        jQuery(function($){
            $('a.zoombox').zoombox();

            /**
            * Or You can also use specific options
            $('a.zoombox').zoombox({
                theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                opacity     : 0.8,              // Black overlay opacity
                duration    : 800,              // Animation duration
                animation   : true,             // Do we have to animate the box ?
                width       : 600,              // Default width
                height      : 400,              // Default height
                gallery     : true,             // Allow gallery thumb view
                autoplay : false                // Autoplay for video
            });
            */
        });
</script>
<!-- Zoombox -->
<!-- font-awesome -->
<link rel="stylesheet" type='text/css' href="<?=base_url()?>ressources/css/font-awesome/css/font-awesome.css">
<!-- font-awesome -->
</head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>

						<?php if($this->session->userdata('auth') !== null){
							echo '<li><a href="'.base_url('compte').'"><i class="fa fa-user"></i> Espace Client ('.$_SESSION['auth']['email'].')</a></li>';
							}else{?>
							
						<li><a href="<?=base_url('login')?>"><i class="fa fa-user"></i> Se Connecter</a></li>
						<li><a href="<?=base_url('register')?>"><i class="fa fa-user-plus"></i> Créer un compte</a></li>
						
						<?php }?>
								
					</ul>
				</div>
				<div class="header-right">
						<div class="cart box_1">
							<a href="<?=base_url('checkout')?>"><i class="fa fa-shopping-basket" style="color: white"></i>
							<span class="label label-default">
								<?php if($this->cart->contents()):?>
								<?= $this->cart->total();?> €(<?= $this->cart->total_items();?>)
								<?php else :?>
								panier vide
								<?php endif;?>
							</span>
							</a>	
							<p><a href="<?=base_url('checkout/emptyCart')?>" class="label label-danger">Vider panier</a></p>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
<!-- si on a un message d'information quelconque on l'affiche dans cette <div> -->
		<?php if(isset($_SESSION['info'])):?>
			<div class="alert alert-success text-center" id="alert-message"><b class="info"><?=$_SESSION['info'];?></b></div>
		<?php endif;?>
		<?php if(isset($_SESSION['erreur'])):?>
			<div class="alert alert-danger text-center" id="alert-message"><b class="erreur"><?=$_SESSION['erreur'];?></b></div>
		<?php endif;?>
<!-- fin de message d'information -->	