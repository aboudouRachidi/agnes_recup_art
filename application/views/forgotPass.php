<!-- content-section-starts -->
	<div class="content">
	<div class="container">
		<div class="login-page">

			   <div class="account_grid">

			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<h3>MOT DE PASSE OUBLIE</h3>
				<p>Veuillez-renseigner votre adresse e-mail.</p>
				
				<?php if(isset($error)):?>
				<div class="alert alert-warning"> <?php echo $error;?></div>
				<?php endif;?>				

				<form action="forgotPass" method="POST">
				  <div>
					<span>E-Mail<label>*</label></span><?php echo form_error('email', '<div class="alert alert-danger">','</div>');?>
					<input name="email" type="email" value="<?php echo set_value('email')?>">
				  </div>
				  <input type="submit" value="Envoyer">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>