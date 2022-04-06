<div class="features_items" id="main-cat-products"><!--features_items-->
	<h2 class="title text-center"><?php 
	$cat = $this->CategoryModel->view_category_by_id($this->uri->segment(2));
	echo $cat->category_name?></h2>
	<?php $allproduct = $this->ProductModel->get_cat_products_filter($this->uri->segment(2),36);?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==1){?>
	<div class="col-sm-3 single-store-product col-single-fp"  >
		<div class="product-image-wrapper" style="height:250px;">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="<?php
                                    $img_arr = base64_decode($product->pro_image);
                                    $img_arr = unserialize($img_arr);
                                    $first_img = $img_arr[0];
                                   
                                   echo base_url().$first_img?>" width="268px" height="249px" alt="" />
					<h2 style="font-size:19px;">₦<?php echo $product->pro_price?>     <span style="font-size:16px;margin-left:10px;color:#8D8A8A"><s> ₦<?php echo $product->pro_regular_price?></s></span></h2> 
					<p><?php  if(strlen($product->pro_title) > 18){
                          echo  substr($product->pro_title,0,18)."..."; }else{echo $product->pro_title;}?></p>
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
								Add
							</button>
							<a href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Info</a>
						</form>	
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<?php } }?>
</div><!--features_items-->


<!------------------------------------------------------------->
cfghdfhsdth

<div class="features_items" id="mobile-cat-products"><!--features_items-->
	<h2 class="title text-center"><?php 
	$cat = $this->CategoryModel->view_category_by_id($this->uri->segment(2));
	echo $cat->category_name?></h2>
	<?php $allproduct = $this->ProductModel->get_cat_products_filter($this->uri->segment(2),36);?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==1){?>
	<div class="col-sm-12 single-store-product"  >
		<div class="product-image-wrapper container-fluid" >
		
				<div class="productinfo row">
					<div class="col-sm-6 inner-row-cat-p" >
					<img src="<?php
                                    $img_arr = base64_decode($product->pro_image);
                                    $img_arr = unserialize($img_arr);
                                    $first_img = $img_arr[0];
                                   
                                   echo base_url().$first_img?>" width="100%" height="100%" alt="" />
						</div>

	           <div class="col-sm-6 inner-row-cat-p">
			
			   <p><?php  if(strlen($product->pro_title) > 25){
                          echo  substr($product->pro_title,0,25)."..."; }else{echo $product->pro_title;}?></p>
								<h2 style="font-size:18px;">₦<?php echo $product->pro_price?>     <span style="font-size:16px;margin-left:10px;color:#8D8A8A"><s> ₦<?php echo $product->pro_regular_price?></s></span></h2> 
								<p class="store-name-cat-p"><a href="<?php base_url()?>store-details/<?php echo $product->store_id?>" style="color:#1c5979"><i class="fa fa-shopping-basket"></i>  <?php $getStore = $this->HomeModel->get_store_by_id($product->store_id); 
				 if(strlen($getStore->store_name) > 25){
                          echo  substr($getStore->store_name,0,25)."..."; }else{echo $getStore->store_name;}
			      ?></a></p>

					
					<!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
	 
                 </div>
			</div>
			
		</div>
	</div>

	<?php } }?>
</div><!--features_items-->