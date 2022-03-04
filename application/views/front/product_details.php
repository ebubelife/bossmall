
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="<?php echo base_url().$product_info->pro_image?>" alt="" class="view-product-img" />
			<h3>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<a   class="carousel-inner-img" ><img src="<?php echo base_url()?>assets/front/images/home/shipping.jpg" alt=""  style="cursor:pointer" ></a>
					<a  class="carousel-inner-img"><img src="<?php echo base_url()?>assets/front/images/product-details/3.jpg" alt="" style="cursor:pointer"></a>
					<a  class="carousel-inner-img"><img src="<?php echo base_url()?>assets/front/images/product-details/4.jpg" alt="" style="cursor:pointer"></a>
				</div>
				<div class="item">
				<a  class="carousel-inner-img" ><img src="<?php echo base_url()?>assets/front/images/home/shipping.jpg" alt="" style="cursor:pointer" ></a>
					<a  class="carousel-inner-img"><img src="<?php echo base_url()?>assets/front/images/product-details/3.jpg" alt="" style="cursor:pointer"></a>
					<a  class="carousel-inner-img"><img src="<?php echo base_url()?>assets/front/images/product-details/4.jpg" alt="" style="cursor:pointer" ></a>
				</div>
				<div class="item">
				<a   class="carousel-inner-img" ><img src="<?php echo base_url()?>assets/front/images/home/shipping.jpg" alt=""  style="cursor:pointer"></a>
					<a  class="carousel-inner-img"><img src="<?php echo base_url()?>assets/front/images/product-details/3.jpg" alt="" style="cursor:pointer"></a>
					<a  class="carousel-inner-img"><img src="<?php echo base_url()?>assets/front/images/product-details/4.jpg" alt="" style="cursor:pointer"></a>
				</div>

			</div>

			<!-- Controls -->
			<a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<h2><?php echo $product_info->pro_title?></h2>
			<p> <?php echo $product_info->pro_id?></p>
			<!-- <img src="<?php echo base_url()?>assets/front/images/product-details/rating.png" alt="" /> -->
			<span>
				<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<span>$<?php echo $product_info->pro_price?></span><!--This is under form because style factor when product price move to form then style is not formating-->
					<label>Quantity:</label>
					<input type="text" value="1" name="qty"/>
					<input type="hidden" value="<?php echo $product_info->pro_id?>" name="pro_id"/>

					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
					
				</form>	
			</span>
			<p><b>Availability:</b>
				<?php if($product_info->pro_quantity>0){
					echo "In Stock";
				}elseif($product_info->pro_availability==3){
					echo "Up Coming";
				}else{
					echo "Out Of Stock";
				}?>
			</p>
			<!-- <p><b>Condition:</b> New</p> -->
			<p><b>Brand:</b> <?php echo $product_info->brand_name?></p>
			<a href=""><img src="<?php echo base_url()?>assets/front/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div>


