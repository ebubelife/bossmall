<div class="features_items"><!--features_items-->
	<h2 class="title text-center"><?php echo $section_title_one?></h2>


	<div class="container-fluid">
			<div class="listing-s" id="listing-s">	
	<?php $allproduct = $this->ProductModel->get_all_products_filter(10);
	         shuffle($allproduct);
	?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==1){?>
	<div class="col-sm-3 col-single-fp">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img  src="<?php
                                    $img_arr = base64_decode($product->pro_image);
                                    $img_arr = unserialize($img_arr);
                                    $first_img = $img_arr[0];
                                   
                                   echo base_url().$first_img?>" width="268px" height="249px" alt="" />
					<h2 style="font-size:19px;">₦<?php echo $product->pro_price?>    <?php if(!$product->pro_regular_price==0){ ?> <span style="font-size:16px;margin-left:10px;color:#8D8A8A"><s> ₦<?php echo $product->pro_regular_price?></s></span><?php } ?></h2> 
				
									<p ><?php if(strlen($product->pro_title) > 18){
                          echo  substr($product->pro_title,0,18)."..."; }else{echo $product->pro_title;}?></p>
                          
					<!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
				</div>
				<div class="product-overlay">
					<div class="overlay-content">			
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
							<!--<h2>$<?php //echo $product->pro_price?></h2>--><!--This is under form because style factor when product price move to form then style is not formating-->
							<p><?php  if(strlen($product->pro_title) > 18){
                          echo  substr($product->pro_title,0,18)."..."; }else{echo $product->pro_title;}?></p>
							
							<input type="hidden" value="1" name="qty"/>
							<input type="hidden" value="<?php echo $product->pro_id?>" name="pro_id"/>
							<button type="submit" class="btn btn-default add-to-cart">
								<i class="fa fa-shopping-cart"></i>
								Add
							</button>
							<a href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Info</a>
						</form>	
					</div>
				</div>
			</div>
			<div class="choose">
		
				
			<p class="text-center"><a href="<?php base_url()?>store-details/<?php echo $product->store_id?>" style="color:#1c5979"><i class="fa fa-shopping-basket"></i>  <?php $getStore = $this->HomeModel->get_store_by_id($product->store_id); 
				 if(strlen($getStore->store_name) > 15){
                          echo  substr($getStore->store_name,0,15)."..."; }else{echo $getStore->store_name;}
			?></a></p>


			<p class="text-center" ><a style="color:#000000" href="<?php base_url()?>store-details/<?php echo $product->pro_id?>" style="color:#1c5979"><i class="fa fa-map-marker"></i> <?php $getStore = $this->HomeModel->get_store_by_id($product->store_id); 

			     $store_location = $getStore->city . ",".$getStore->state;
				 if(strlen( $store_location) > 15){
                          echo  substr( $store_location,0,15)."..."; }else{echo  $store_location;}
			?></p>
				
			</div>
		</div>
	</div>

	<?php } }?>

				 </div>
				
				<!--------------------------------------------------------------->
				<a href="#s" class="left  mcl control-carousel hidden-xs" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a href="#s" class="right mcr  control-carousel hidden-xs" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
			
				</div></div>
</div><!--features_items-->