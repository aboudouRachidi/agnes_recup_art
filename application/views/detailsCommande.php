<div class="registration-form">
	<div class="container">
	
 <div class="container">
        <div class="row style_featured">
        
<?php if(!empty($ordersDetails)):?>
<?php foreach ($ordersDetails as $orderDetail):?>
            <div class="col-md-4">
                <div>
                    <img src="<?=base_url()?>/ressources/images/photoProduit/<?=$orderDetail->photo_principale?>" alt="" class="img-rounded img-thumbnail" />
                    <h2><?=$orderDetail->nom_produit?></h2>
                    <p style="text-align: left;">
                        <span>Prix : </span>
                        <?=$orderDetail->prix?> <i class="fa fa-eur"></i>
                    </p>
                    <p style="text-align: left;">
                        <span>Quantité : </span>
                        <?=$orderDetail->quantite?>
                    </p>
                    <p style="text-align: left;">
                        <span>Ce produit a été commander le</span>
                        <?php $bad_date = $orderDetail->date_commande; $better_date = nice_date($bad_date, 'd-m-Y'); echo $better_date?>
                    </p>
                    <a href="<?= base_url('single/index/'.strtolower(url_title(convert_accented_characters($orderDetail->nom_produit))).'/'.$orderDetail->id_produit)?>" class="btn btn-success" title="Afficher plus">Plus... »</a>
                </div>
            </div>
            
 


  <?php endforeach?>
<?php endif;?>           

        	</div>
    	</div>
	</div>
</div>

<style>
.style_featured{
    padding: 20px 0;
    text-align: center;
}
.style_featured > div > div{
    padding: 10px;
    border: 1px solid transparent;
    border-radius: 4px;
    transition: 0.5s;
}
.style_featured > div:hover > div{
    margin-top: +19px;
    border: 1px solid rgb(153, 200, 250);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 9px 9px 9px;
    background: rgba(153, 200, 250, 0.1);
    transition: 0.99s;
}
</style>