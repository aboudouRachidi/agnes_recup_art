<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
    <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- HEADER -->
	<table bgcolor="#343846" width="100%" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td background="https://www.flickr.com/photos/67574009@N00/5449866162/" bgcolor="#303030" valign="top">
			      <!--[if gte mso 9]>
			      <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;">
			        <v:fill type="tile" src="https://www.flickr.com/photos/67574009@N00/5449866162/" color="#343846" />
			        <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
			      <![endif]-->
		<div>
			<table align="center"width="590" border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
		      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
		      		</tr>
		      		<tr>
		      			<td align="center" style="text-align: center;">
		      				<a href="<?=base_url()?>">
		      				<img src="<?=base_url('ressources/images/Logo.jpg')?>" alt="Logo recup art" width="80" border="0"/>
		      				</a>
		      			</td>
		      		</tr>
					<tr>
		      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
		      		</tr>
					<tr>
		      			<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center; font-size:40px; color:#fff; mso-line-height-rule:exactly; line-height: 28px">
		      				Agnes Recup'Art vous remercie de votre commande 
		      			</td>
		      		</tr>
					<tr>
		      			<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center;color:#878b99; mso-line-height-rule:exactly; line-height: 26px">
		      			<!-- TEXTE SI BESOIN -->
		      			Vous avez la possibilité de suivre l’état de votre commande depuis votre espace client
		      			</td>
		      		</tr>
					<tr>
		      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
		      		</tr>
		      		<tr>
			      		<td align="center">
			      		</td>

		      		</tr>
					<tr>
		      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
		      		</tr>		      		
				</tbody>
			</table>
		</div>
			      <!--[if gte mso 9]>
			        </v:textbox>
			      </v:rect>
			      <![endif]-->
    			</td>
    		</tr>
		</tbody>
	</table>
<!-- /HEADER -->

<!-- BLOC3-->
	<table bgcolor="#677179" width="100%" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
      		</tr>
      		<tr>
      			<td>
      				<table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
      					<tr>
      						<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center; font-size:28px; color:#fff; mso-line-height-rule:exactly; line-height: 28px">
      							Details de votre commande (<b style="font-family:Helvetica, sans-serif;text-align:center; font-size:15px; color:#fff; mso-line-height-rule:exactly; line-height: 20px">Prix Total : <?= $this->cart->total();?> €</b>)
      						</td>
      					</tr>
			   			<tr>
			      			<td height="15" style="font-size:15px; line-height:15px;">&nbsp;</td>
			      		</tr>
			      		<tr>
			      			<td align="center">
			      				<table bgcolor="#7fffd4" align="center" width="24" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td height="4" style="font-size:4px; line-height:4px;">&nbsp;</td>
										</tr>
									</tbody>
			      				</table>
			      			</td>
			      		</tr>
		      			<tr>
			      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
			      		</tr>
			      		<tr>
			      		<td>
			      			<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0">
			      			<?php if($this->cart->contents()):?>
			      				<?php foreach ($this->cart->contents() as $article):?>
			      				<tbody>
			      					<tr>
			      						<td align="center">
			      							<img src="<?= base_url()?>ressources/images/photoProduit/<?=$article['picture']?>" width="90" border="0">
			      						</td>
			      					</tr>
					      			<tr>
						      			<td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
						      		</tr>
			      					<tr>
			      						<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center; font-size:18px; color:#fff; mso-line-height-rule:exactly; line-height: 22px">
			      							<?=$article['name']?> : <?=$article['price']?> €
			      						</td>
			      					</tr>						      		
					      			<tr>
						      			<td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
						      		</tr>
			      					<tr>
			      						<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center; font-size:14px; color:#fff; mso-line-height-rule:exactly; line-height: 24px">		      							
			      							Quantité <?=$article['qty']?>
			      						</td>
			      					</tr>
			      					<tr>
			      						<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center; font-size:18px; color:#fff; mso-line-height-rule:exactly; line-height: 22px">
			      							Livraison par : <?=$article['typeLivraison']?> Frais : <?=$article['fraisLivraison']?>€
			      						</td>
			      					</tr>
			      		<tr>
			      			<td align="center">
			      				<table bgcolor="#fff" align="center" width="500" border="0" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td height="1" style="font-size:1px; line-height:1px;">&nbsp;</td>
										</tr>
									</tbody>
			      				</table>
			      			</td>
			      		</tr>
					<tr>
		      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
		      		</tr>
			      				</tbody>
			      			<?php endforeach;?>
							<?php endif;?>
			      				<tbody>
			      					<tr>
			      						<td align="center">
			      						</td>
			      					</tr>
					      			<tr>
						      			<td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
						      		</tr>
			      					<tr>
			      						<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center; font-size:18px; color:#fff; mso-line-height-rule:exactly; line-height: 22px">
			      						</td>
			      					</tr>						      		
					      			<tr>
						      			<td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
						      		</tr>
			      					<tr>
			      						<td align="center" style="font-family:'Questrial',Helvetica, sans-serif;text-align:center; font-size:14px; color:#fff; mso-line-height-rule:exactly; line-height: 24px">

			      						</td>
			      					</tr>

			      				</tbody>
			      				
			      			</table>

			      			<table align="left" width="40" border="0" cellpadding="0" cellspacing="0">
			      				<tbody>
									<tr>
										<td height="4" style="font-size:4px; line-height:4px;">&nbsp;</td>
									</tr>
			      				</tbody>
			      			</table>
			      			</td>
			      		</tr>   				
      				</table>
      			</td>
      		</tr>
		</tbody>
	</table>
<!-- /BLOC3 -->
</body>

</html>