<div class="features_items"><!--features_items-->
	<h2 class="title text-center"><?php echo $section_title_one?></h2>
	<?php $allproduct = $this->ProductModel->get_store_products_filter($this->uri->segment(2),8);?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==1){?>
	<div class="col-sm-3 single-store-product col-single-fp"  >
		<div class="product-image-wrapper" style="height:250px;">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="<?php echo base_url().$product->pro_image?>" width="268px" height="249px" alt="" />
					<h2 style="font-size:19px;">₦<?php echo $product->pro_price?>     <span style="font-size:16px;margin-left:10px;color:#8D8A8A"><s> ₦<?php echo $product->pro_price?></s></span></h2> 
					<p><?php echo $product->pro_title?></p>
					<!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
				</div>
				<div class="product-overlay">
					<div class="overlay-content">			
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
							<!--<h2>$<?php //echo $product->pro_price?></h2>--><!--This is under form because style factor when product price move to form then style is not formating-->
							<p><?php echo $product->pro_title?></p>
							
							<input type="hidden" value="1" name="qty"/>
							<input type="hidden" value="<?php echo $product->pro_id?>" name="pro_id"/>
							<button type="submit" class="btn btn-default add-to-cart">
								<i class="fa fa-shopping-cart"></i>
								Add to cart
							</button>
							<a href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
						</form>	
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<?php } }?>
</div><!--features_items-->