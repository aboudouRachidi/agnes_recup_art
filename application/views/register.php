
		<!-- registration-form -->
<div class="registration-form">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?= base_url()?>" title="Aller à la Page d'Accueil">Accueil</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Créer compte
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php if(isset($_SERVER['HTTP_REFERER']))echo $_SERVER['HTTP_REFERER']?>">Revenir à la page précédente</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
		<h2>S'enregistrer</h2>
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					 <p>Bienvenue, veuillez renseigner les champs ci-dessous s'il vous plaît.</p>
					 <p>Si vous avez déjà un compte chez nous, <a href="<?=base_url('login')?>">cliquez ici</a></p>
					 
					 <?php if(isset($success)):?>
					 <div class="alert alert-success"> <?= $success;?></div>
					 <?php endif;?>
					 
					 <form action="register" method="POST">
					 
		                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Champs requis</strong></div>
		                <div class="form-group">
		                    <label for="nom">Nom : </label><?= form_error('nom', '<div class="alert alert-danger">','</div>');?>
		                    <div class="input-group">
		                        <input name="nom" type="text" value="<?= set_value('nom')?>" class="form-control"  id="InputName" placeholder="Nom" required>
		                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="prenom">Prenom : </label><?= form_error('prenom', '<div class="alert alert-danger">','</div>');?>
		                    <div class="input-group">
		                        <input name="prenom" type="text" value="<?=set_value('prenom')?>" class="form-control"  id="InputFirstName" placeholder="Prenom" required>
		                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="email">E-mail : </label><?= form_error('email', '<div class="alert alert-danger">','</div>');?>
		                    <div class="input-group">
		                        <input name="email" type="email" value="<?= set_value('email')?>" class="form-control" id="InputEmailFirst" placeholder="Email" required>
		                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="InputEmail">Confirmer Email</label>
		                    <div class="input-group">
		                        <input type="email" class="form-control" id="InputEmailSecond" name="ConfirmEmail" placeholder="Confirmer Email" required>
		                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="mdp" >Mot de passe : </label><?= form_error('mdp', '<div class="alert alert-danger">','</div>');?>
		                    <div class="input-group">
		                        <input name="mdp" type="password" class="form-control" id="firstPass" placeholder="Mot de passe" required>
		                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label for="confirm_mdp" >Confirmer mot de passe :</label><?= form_error('confirm_mdp', '<div class="alert alert-danger">','</div>');?>							 
		                    <div class="input-group">
		                        <input name="confirm_mdp" type="password" class="form-control" id="SecondPass" placeholder="Confirmer Mot de passe" required>
		                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
		                    </div>
		                </div>
					
						 <input type="submit" value="VALIDER">
						 <p class="click">En cliquant sur ce boutton, vous acceptez <a href="contrat">les termes et conditions.</a></p> 
					 
					 </form>
				 </div>
			</div>
			<!--
			<div class="reg-right">
				 <h3>Completely Free Account</h3>
				 <div class="strip"></div>
				 <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio 
				 libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
				 <h3 class="lorem">Lorem ipsum dolor.</h3>
				 <div class="strip"></div>
				 <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
			</div>
			-->
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- registration-form -->
