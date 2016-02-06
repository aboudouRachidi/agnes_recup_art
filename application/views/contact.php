		
<!-- contact-page -->
<div class="contact">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Aller à la Page d'Accueil">Accueil</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Contact
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php if(isset($_SERVER['HTTP_REFERER']))echo $_SERVER['HTTP_REFERER']?>">Retour à la page précédente</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
				<?php if(isset($_SESSION['info'])):?>
					<div class="alert alert-success" id="alert-message"> <?=$_SESSION['info'];?></div>
				<?php endif;?>	
		<div class="contact-info">
			<h2>TROUVER NOUS ICI</h2>
		</div>
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41725.440076996136!2d-0.4072784173486451!3d49.18462255598154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480a42bd4c04c933%3A0x3da5749f30d00859!2sCaen!5e0!3m2!1sfr!2sfr!4v1446004734287" style="border:0"></iframe>
		</div>
		<div class="contact-form">
			<div class="contact-info">
				<h3>Formulaire de contact</h3>
			</div>
			<form action="<?=base_url('contact/sendMessage')?>" method="POST">
				<div class="contact-left">
					<input name="nom" type="text" placeholder="Nom" required>
					<input name="email" type="email" placeholder="E-mail" required value="<?php if(isset($_SESSION['auth']['email']))echo$_SESSION['auth']['email']?>">
					<input name="objet" type="text" placeholder="Objet" required>
				</div>
				<div class="contact-right">
					<textarea name="message" placeholder="Message" required></textarea>
				</div>
				<div class="clearfix"></div>
				<input type="submit" value="ENVOYER">
			</form>
		</div>
		<div class="well">
			<address>
				<strong>Agnès FINET.</strong><br>
						6 impasse Pascal<br>
						14000, Caen<br>
			</address>
			
			<address>
				<strong>E-mail</strong><br>
					<a href="mailto:daxipol@gmail.com">daxipol@gmail.com</a><br>
					<abbr title = "Tel"><i class="fa fa-phone"></i></abbr> 0660 513616
			</address>
		</div>
	</div>
</div>
<!-- //contact-page -->
