<section id="advertisement">
<?php if(!$store_info->custom_header == 0){?>
	<img src="<?php echo base_url("assets/front/images/shop/header_backgrounds/").$store_info->header_bg?>" alt="" />
		
		<?php } else{?>
			
	<?php } ?>
		<?php if($store_info->custom_header == 0){?>
			<div class="container col-sm-12 top-store-banner" style="background-repeat:no-repeat;background-size:cover;background-image:url('<?php echo base_url("assets/front/images/shop/header_backgrounds/").$store_info->header_bg ?>')">
		<div class="header-overlay">


<div class="overlay-inner">
	<h1 style="font-family: 'Pacifico', cursive;"><?php echo  $store_info->store_name  ?></h1>

	<p class="text-center"><a href="<?php base_url()?>store-details/" style="color:#FFFFFF"><i class="fa fa-map-marker"></i> Awka, Anambra  | Nationwide Delivery</p>
		



</div>
</div><!--/overlay-inner-->
		</div>
<?php }?>
			<!--<img src="<?php //echo base_url()?>assets/front/images/shop/advertisement.jpg" alt="" />-->
		</div>
	</section>