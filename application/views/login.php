<!-- content-section-starts -->
	<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?=base_url()?>" title="Aller à la Page d'Accueil">Accueil</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Se connecter
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php if(isset($_SERVER['HTTP_REFERER']))echo $_SERVER['HTTP_REFERER']?>">Retour à la page précédente</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <h2>NOUVEAU CLIENT</h2>
				 <p>En créant un compte chez agnès recup'art, vous aurez la possibilité de suivre votre commande,et plus... .</p>
				 <a class="acount-btn" href="register">Créer un compte</a>
			   </div>
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<h3>DEJA CLIENT ?</h3>
				<p>Si vous avez déjà un compte chez nous, veuillez-vous connecter s'il vous plaît.</p>
				
				<?php if(isset($error)):?>
					<div class="alert alert-warning"> <?=$error;?></div>
				<?php endif;?>				

				<form action="<?=base_url('Login')?>" method="POST">
				  <div>
					<span>E-Mail<label>*</label></span><?=form_error('email', '<div class="alert alert-danger">','</div>');?>
					<input name="email" type="email" value="<?=set_value('email')?>">
				  </div>
				  <div>
					<span>Mot de passe<label>*</label></span><?=form_error('mdp', '<div class="alert alert-danger">','</div>');?>
					<input name="mdp" type="password"> 
				  </div>
				  <input type="submit" value="Connexion">
				  <a class="forgot" href="<?=base_url('forgotPass')?>">Mot de passe oublié?</a>
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>
		