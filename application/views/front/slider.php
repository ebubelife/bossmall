<?php $all_slider = $this->HomeModel->get_slider_images();?>

<div class="col-sm-12 slider-section">
	<div id="slider-carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#slider-carousel" data-slide-to="1"></li>
			<li data-target="#slider-carousel" data-slide-to="2"></li>
			<li data-target="#slider-carousel" data-slide-to="3"></li>
		</ol>
		
		<div class="carousel-inner">

			<?php
				$i=1;
				foreach ($all_slider as $slider) {
					if($i==1){
						echo "<div class='item active'>";
					}else{
						echo "<div class='item'>";
					}
			?>
			
			<!--	<div class="col-sm-6">
					<h1><img src="<?php// echo base_url()?>assets/front/images/home/THIRD_LOGO_50X50.png" alt="" /><span style="color:#1c5979">Boss</span><span style="color:#ea4a50">Mall</span></h1>
					<h2><?php// echo $slider->pro_title;?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					<button type="button" class="btn btn-default get">Get it now</button>
				</div>-->
				<div class="col-sm-12">
					<img src="<?php echo base_url('assets/front/images/home/sliders/').$slider->header_url?>" class="girl img-responsive" alt="" />
					
				</div>
			<!--	<div class="col-sm-12">
				<img src="<?php echo base_url()?>/assets/front/images/home/banners/comp.png_rJicC7n0t.png" class="girl img-responsive" alt="" />
				</div>-->


			</div>
			<?php $i++; } ?>

		</div>
		
		<!--<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>-->
	</div>
	
</div>
