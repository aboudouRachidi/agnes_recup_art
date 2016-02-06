
<!-- registration-form -->
<div class="registration-form">
	<div class="container">
		<div class="dreamcrub">
				<ul class="breadcrumbs">
					<li class="home">
						<a href="<?=base_url()?>" title="Aller à la Page d'Accueil">Accueil</a>&nbsp;
						<span>&gt;</span>
					</li>
					<li class="women">
						Mon compte
					</li>
				</ul>
					<ul class="previous">
						<li><a href="<?=base_url('compte/logout')?>" title="A bientôt !">Se deconnecter</a></li>
					</ul>
			<div class="clearfix"></div>
		</div>
		
<!-- si on a un utilisateur connecté on affiche bienvenue ainsi que les informations qui lui sont liées avec un foreach() -->
<?php if(!empty($users)):?>
<?php foreach ($users as $user):?>
		<h2>Bienvenue dans votre espace client</h2>		
		
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
						<div class="bs-example">
						    <div class="panel-group" id="accordion">
						        <div class="panel panel-default">
						            <div class="panel-heading">
						                <h4 class="panel-title">
						                    <a data-toggle="collapse" class="glyphicon glyphicon-user" data-parent="#accordion" href="#collapseUser">
       	   										<?=$user->nom;?> <?=$user->prenom;?>					
						                    </a>
						                </h4>
						            </div>
						            <div id="collapseUser" class="panel-collapse collapse in">
						                <div class="panel-body">
						                 <?php if(!empty($orders)):?>
										<?php foreach ($orders as $order):?>
										<?php if($order->code_suivi !== "")?>
										
											<small>Votre commande R_A<?=$order->id_commande?> est en cours de livraison...</small><br>
											
										<?php endforeach;?>
										<?php endif;?>
						                </div>
						            </div>
						        </div>
						        <div class="panel panel-default">
						            <div class="panel-heading">
						                <h4 class="panel-title">
						                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseGC"> <i class="fa fa-cogs"></i> Gestion de votre compte</a>
						                </h4>
						            </div>
						            <!-- si ce formulaire contient des erreurs on ouvre le collapse en 'in' -->
						            <div id="collapseGC" class="panel-collapse collapse <?php if(isset($_SESSION['collapseGC']))echo $_SESSION['collapseGC']?>">
						                <div class="panel-body">
						                        <form class="form-horizontal" action="<?=base_url('compte/update')?>" method="POST">
						                        
											        <div class="form-group">
											        	<?= form_error('nom', '<div class="alert alert-danger">','</div>');?>
											            <label class="control-label col-xs-3" for="firstName">Nom:</label>
											            <div class="col-xs-9">
											                <input type="text" name="nom" class="form-control" id="firstName" placeholder="Votre Nom" value="<?=$user->nom;?>">
											            </div>
											        </div>
											        <div class="form-group">
											            <label class="control-label col-xs-3" for="lastName">Prenom:</label>
											            <div class="col-xs-9">
											                <input type="text" name="prenom" class="form-control" id="lastName" placeholder="Votre prenom" value="<?=$user->prenom;?>">
											            </div>
											        </div>
											        <!-- 
											        <div class="form-group">
											            <label class="control-label col-xs-3" for="inputEmail">Email:</label>
											            <div class="col-xs-9">
											                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="">
											            </div>
											        </div>
													-->
											        <div class="form-group">
											            <label class="control-label col-xs-3" for="phoneNumber">Téléphone:</label>
											            <div class="col-xs-9">
											                <input type="tel" name="telephone" class="form-control" id="phoneNumber" placeholder="Numero de téléphone portable" value="<?=$user->telephone;?>">
											            </div>
											        </div>
											        <div class="form-group">
											            <label class="control-label col-xs-3" for="postalAddress">Adresse Postale:</label>
											            <div class="col-xs-9">
											                <textarea rows="1" name="adresseDomicile" class="form-control" id="postalAddress" placeholder="Adresse Postale"><?=$user->adresse_domicile;?></textarea>
											            </div>
											        </div>
											        <div class="form-group">
											            <label class="control-label col-xs-3" for="postalAddress">Code Postale:</label>
											            <div class="col-xs-9">
											                <input type="text" name="codePostaleDomicile" class="form-control" id="ZipCode" placeholder="Code Postale" value="<?=$user->code_postale_domicile;?>">
											            </div>
											        </div>
											        <div class="form-group">
											            <label class="control-label col-xs-3" for="ville">Ville</label>
											            <div class="col-xs-9">
											                <input type="text" name="villeDomicile" class="form-control" id="countryCode" placeholder="Ville" value="<?=$user->ville_domicile;?>">
											            </div>
											        </div>
											        <div class="form-group">
											            <label class="control-label col-xs-3" for="postalAddress">Livraison:</label>
											            <div class="col-xs-9">
													  		<a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseLivraison" aria-expanded="false" aria-controls="collapseLivraison">
													    		cliquer ici pour ajouter votre adresse de livraison !
													  		</a>
													</div>
														<div class="collapse" id="collapseLivraison">
														  <div class="card card-block">
													        <div class="form-group">
													        <div class="col-xs-3"></div>
													            <div class="col-xs-9">
													                <textarea rows="1" name="adresseLivraison" class="form-control" id="delivryAddress" placeholder="Adresse de livraison"><?=$user->adresse_livraison;?></textarea>
													                <input type="text" name="codePostaleLivraison" class="form-control" id="ZipCodeLivraison" placeholder="Code Postale livraison" value="<?=$user->code_postale_livraison;?>">
													                <input type="text" name="villeLivraison" class="form-control" id="countryLivraison" placeholder="Ville livraison" value="<?=$user->ville_livraison;?>">
													            </div>
													        </div>

														  </div>
														</div>
													</div>
											        <br>
											        <div class="form-group">
											            <div class="col-xs-offset-3 col-xs-9">
											                <input type="submit" class="btn btn-primary" value="Modifier">
											            </div>
											        </div>
											    </form>
						                </div>
						            </div>
						        </div>
						        <div class="panel panel-default">
						            <div class="panel-heading">
						                <h4 class="panel-title">
						                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseMP"> <i class="fa fa-cogs"></i> Modifier votre mot de passe</a>
						                </h4>
						            </div>
						            <!-- si on a des erreurs sur ce formulaire on ouvre le collapse en "in" -->
						            <div id="collapseMP" class="panel-collapse collapse <?php if(isset($_SESSION['collapseMP']))echo $_SESSION['collapseMP']?>">
						                <div class="panel-body">
					                        <form action="<?=base_url('compte/updatePassword')?>" method="POST" class="form-horizontal">

										        <div class="form-group"><?= form_error('mdpActuel', '<div class="alert alert-danger">','</div>');?>
										            <label class="control-label col-xs-3" for="inputPassword">Mot de passe:</label>
										            <div class="col-xs-9">
										                <input type="password" name="mdpActuel" class="form-control" id="inputPassword" placeholder="Votre mot de passe actuel">
										            </div>
										        </div>
										        
										        <div class="form-group"><?= form_error('nouveauMdp', '<div class="alert alert-danger">','</div>');?>
										            <label class="control-label col-xs-3" for="inputPassword">Nouveau:</label>
										            <div class="col-xs-9">
										                <input type="password" name="nouveauMdp" class="form-control" id="inputPassword" placeholder="Nouveau mot de passe">
										            </div>
										        </div>
										        <div class="form-group"><?= form_error('confirmMdp', '<div class="alert alert-danger">','</div>');?>
										            <label class="control-label col-xs-3" for="confirmPassword">Confirmer:</label>
										            <div class="col-xs-9">
										                <input type="password" name="confirmMdp" class="form-control" id="confirmPassword" placeholder="Confirmer le nouveau mot de passe">
										            </div>
										        </div>
										        <div class="form-group">
										            <div class="col-xs-offset-3 col-xs-9">
										                <input type="submit" class="btn btn-primary" value="Modifier">
										            </div>
										        </div>
										    </form>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
				 </div>
			</div>
			
			
			<!-- Mes commandes  -->
			
			<div class="reg-right">
		 			 <div class="panel-group" id="accordion">
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Commande(s) en cours</a>
					        </h4>
					      </div>
					      <div id="collapse1" class="panel-collapse collapse in">
					        <div class="panel-body">
					        
					        <!-- si on a des commandes en cours on les affiche avec un foreach() -->
					        <?php if(!empty($orders)):?>
							<?php foreach ($orders as $order):?>
							
						            <div class="panel panel-default">
						            
						                <div class="row padall">
						                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						                        <span></span>
						                        <img src="<?=base_url('ressources')?>/images/Logo.jpg" height="80" width="80"/>
						                    </div>
						                    
						                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						                   
						                        <div class="clearfix">
						                            <div class="pull-left">
						                                <span>Totale : <?= $order->total;?><i class="fa fa-eur"></i></span> <a class="label label-info" href="<?=base_url('compte/OrderDetail/'.$order->id_commande)?>">details</a>

						                            </div>
						                            <div class="pull-right">
						                               <label class="label label-default" title="code de suivi colis">Suivi : <?= $order->code_suivi;?></label>
						                                 <label class="label label-default" title="N°de Facture">N°: R_A<?= $order->id_commande;?></label>
						                            </div>
						                        </div>
						                        <div>
						                            <h4><span class="fa fa-map-marker icon"></span> <?=$user->ville_livraison?> <?=$user->code_postale_livraison?></h4>
						                           <i class="fa fa-calendar"></i> <?php $bad_date = $order->date_commande; $better_date = nice_date($bad_date, 'd-m-Y'); echo $better_date?>
						                            <span class="fa fa-truck pull-right  btn-warning"> <?php if($order->etat == 1) echo 'En cours';?></span>
						                        </div>
						                    </div>
						                   
						                </div>
						                
						            </div>					
							<?php endforeach?>
							<?php else :?>
							<!-- sinon on affiche aucune commande en cours-->
							<label>Aucune commande en cours</label>
							
							<?php endif;?>
							<!-- fin si il y a des commandes en cours-->
					        </div>
					      </div>
					    </div>
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Commande(s) en attente</a>
					        </h4>
					      </div>
					      <div id="collapse2" class="panel-collapse collapse">
					        <div class="panel-body">
					        <!-- si on a des commandes en attente on les affiche avec un foreach() -->
					        <?php if(!empty($ordersWait)):?>
							<?php foreach ($ordersWait as $orderW):?>
						            <div class="panel panel-default">
						            
						                <div class="row padall">
						                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						                        <span></span>
						                        <img src="<?=base_url('ressources')?>/images/Logo.jpg" height="80" width="80"/>
						                    </div>
						                    
						                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						                   
						                        <div class="clearfix">
						                            <div class="pull-left">
						                                <span>Totale : <?= $orderW->total;?><i class="fa fa-eur"></i></span> <a class="label label-info" href="<?=base_url('compte/OrderDetail/'.$orderW->id_commande)?>">details</a>

						                            </div>
						                            <div class="pull-right">
						                               <label class="label label-default"><?= $orderW->code_suivi;?></label>
						                                 <label class="label label-default">N°: R_A<?= $orderW->id_commande;?></label>
						                                 <a class="label label-danger" href="<?=base_url('compte/cancelOrder/'.$orderW->id_commande)?>">Annuler</a>
						                            </div>
						                        </div>
						                        <div>
						                            <h4><span class="fa fa-map-marker icon"></span> <?=$user->ville_livraison?> <?=$user->code_postale_livraison?></h4>
						                           <i class="fa fa-calendar"></i> <?php $bad_date = $orderW->date_commande; $better_date = nice_date($bad_date, 'd-m-Y'); echo $better_date?>
						                            <span class="pull-right  btn-danger"><i class="fa fa-spinner fa-spin"></i> <?php if($orderW->etat == 0) echo 'En attente' ;?></span>
						                        </div>
						                    </div>
						                   
						                </div>
						                
						            </div>	
							<?php endforeach?>
							
							<?php else :?>
							
							<label>Aucune commande en attente</label>
							
							<?php endif;?>
							<!-- fin si il y a des commandes en attente -->
							</div>
					      </div>
					    </div>
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Commande(s) Terminée(s)</a>
					        </h4>
					      </div>
					      <div id="collapse3" class="panel-collapse collapse">
					        <div class="panel-body">
					        
					        <!-- si on a des commandes terminées on les affiche avec un foreach() -->
					        <?php if(!empty($ordersFinish)):?>
							<?php foreach ($ordersFinish as $orderF):?>
						            <div class="panel panel-default">
						            
						                <div class="row padall">
						                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						                        <span></span>
						                        <img src="<?=base_url('ressources')?>/images/Logo.jpg" height="80" width="80"/>
						                    </div>
						                    
						                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						                   
						                        <div class="clearfix">
						                            <div class="pull-left">
						                                <span>Totale : <?= $orderF->total;?><i class="fa fa-eur"></i></span> <a class="label label-info" href="<?=base_url('compte/OrderDetail/'.$orderF->id_commande)?>">details</a>

						                            </div>
						                            <div class="pull-right">
						                               <label class="label label-default"><?= $orderF->code_suivi;?></label>
						                                 <label class="label label-default">n°: R_A<?= $orderF->id_commande;?></label>
						                            </div>
						                        </div>
						                        <div>
						                            <h4><span class="fa fa-map-marker icon"></span> <?=$user->ville_livraison?> <?=$user->code_postale_livraison?></h4>
						                           <i class="fa fa-calendar"></i> <?php $bad_date = $orderF->date_commande; $better_date = nice_date($bad_date, 'd-m-Y'); echo $better_date?>
													<span class="fa fa-lock icon pull-right btn-success"><?php if($orderF->etat > 1) echo 'Terminée' ;?></span>
						                        </div>
						                    </div>
						                   
						                </div>
						                
						            </div>	
							<?php endforeach?>
							
							<?php else :?>
							
							<label>Aucune commande terminée</label>
							
							<?php endif;?>
							<!-- fin si on a des commandes terminées -->
							</div>
					      </div>
					    </div>
					    
					  </div> 
			</div>
			<div class="clearfix"></div>
		</div>
<?php endforeach?>
<?php endif;?>
<!-- fin si on a un utilisateur connecté -->
	</div>
</div>
<!-- registration-form -->
