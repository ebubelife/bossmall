<?php $all_slider = $this->HomeModel->get_slider_images();?>
<div class="mobile-slider recommended_items" ><!--recommended_items-->

	
	<div id="recommended-item-carousel" class="carousel">
		<div class="carousel-innerr">
			<div class="scrollable-en" id="scrollable-en">	
				<?php foreach( $all_slider as $slider){ ?>
				<div class="mobile-single-slider" id="mobile-single-slider">
					<div class="product-image-wrapper">
						
                            <img src="<?php echo base_url('assets/front/images/home/sliders/').$slider->header_url?>" class="girl img-responsive" alt="" />
							
					</div>
				</div>
                <?php } ?>
				
			
			
				
				
			</div>
		</div>
			
	</div>
					</div><!--/recommended_items-->