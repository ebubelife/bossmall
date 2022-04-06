<div class="col-sm-2">
	<div class="left-sidebar">
	

		<!--/brands_products-->
		<!--price-range-->
		<!-- <div class="price-range">
			<h2>Price Range</h2>
			<div class="well">
				<form action="<?php echo base_url()?>show-product-by-price-range" method="post">
				 <input type="text" class="span2" value="" data-slider-min="10" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
				 <b>$ 0</b> <b class="pull-right">$ 600</b>
				 <input type="submit" Value="filter">
				</form>
			</div>
		</div> -->
		<!--/price-range-->

		<!--price-range-->
		<!--<div class="">
			<h2>Price Range</h2>
			<p id="amount" style="text-align:center"></p>
			<div id="slider-range"></div>

			<div class="pricerange">
			  <form method="post" action="<?php echo base_url()?>show-product-by-price-range" >
			    <input type="hidden" id="amount1" name="amount1" value="">
			    <input type="hidden" id="amount2" name="amount2" value="">
			    <input type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
		</div>
		<!--/price-range-->










		<div class="categories-list text-left"><!--shipping-->

		<ul class="left-side-cat cat">

		<?php $categories = $this->CategoryModel->get_all_category();
		          foreach($categories as $category){
		?>
			<li class="left-side-cat-li"><a class="left-side-cat-a" href="<?php echo base_url()."category-products/".$category->category_id ?>" id="<?php echo "c-".$category->category_id ?>"><?php echo $category->category_name ?></a></li>

			
<?php } ?>
                </ul>

			
				<?php $categories = $this->CategoryModel->get_all_category();
		          foreach($categories as $category){
		?>
		
			<ul class="left-side-cat sub-cat <?php echo "c-".$category->category_id ?>" id="<?php echo "c-".$category->category_id ?>" style=" width:50%;" >

			<?php $sub_categories = $this->CategoryModel->get_sub_category_cat($category->category_id);
		          foreach($sub_categories as $sub_category){
		?>

	<li><a class="left-side-sub-cat-a" href="#"><?php echo $sub_category->sub_category_name ?></a></li>

	<?php } ?>

		</ul>

		<?php } ?>
           
		
		
		</div><!--/categories-list-->


		
		
	</div>
</div>



