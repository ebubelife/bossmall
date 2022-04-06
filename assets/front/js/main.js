

$(document).ready(function(){

	var mobile_slider = document.getElementById("scrollable-en");
	var inte = 0; reverse = 0;
	 

		setInterval(function(){
			if(inte <5 & reverse ==0){
			mobile_slider.scrollBy(330, 0);		
			inte++;
		//	alert(inte);
			}

			if(inte ==4){
				reverse =1;
				
			}

			if(inte > -1 & reverse ==1){
				reverse =1;
				mobile_slider.scrollBy(-330, 0);		
				inte--;//alert(inte);
			}

			if(inte ==0){
				reverse =0;
			//	mobile_slider.scrollBy(330, 0);		
			//	inte++;
			}
		
		}, 3000);
	 


	var menu_open = false;
	$(".navbar-toggle").click(function(){

			if(menu_open==false){
			$(".menu-slide").addClass("menu-open");
			menu_open = true;
			$(".main-body").css({"overflow-y":"hidden"});
		}
		else{
			$(".menu-slide").removeClass("menu-open");
			menu_open = false;
			$(".main-body").css({"overflow-y":"auto"});
		}
	

	});

	$(".left-side-cat-a").hover(function(){

		$(".categories-list").addClass("add-width");
             
		let id = $(this).attr("id");
	     $(".sub-cat").css("display","none");

		$("."+id).css("display","inline-block");

});

$(".categories-list").mouseleave(function(){

	$(this).removeClass("add-width");
		 
	
	 $(".sub-cat").css("display","none");

	

});




	$("#account-menu-trigger").click(function(){

		$(".account-sub-menu").toggle();
		
		});

		$(".categories-trigger-1").click(function(){

			$(".menu-overlay-1").toggle();
			
			});
		

$(".carousel-inner-img img").click(function(){

	let img_src = $(this).attr("src");

	$(".view-product-img").attr("src",img_src);
	

});

});

		

/*price range*/



 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

/*
   featured items scroll
   


*/

$(document).ready(function(){

	$(".mcr").click(function(){
		

		var feature_swipe = document.getElementById("listing-s");

		feature_swipe.scrollBy(330, 0);		

	});
	$(".mcl").click(function(){
		

		var feature_swipe = document.getElementById("listing-s");

		feature_swipe.scrollBy(-330, 0);		

	});

});



$(document).ready(function(){

	$(".mcr-t").click(function(){
		

		var feature_swipe = document.getElementById("feature-two");

		feature_swipe.scrollBy(330, 0);		

	});
	$(".mcl-t").click(function(){
		

		var feature_swipe = document.getElementById("feature-two");

		feature_swipe.scrollBy(-330, 0);		

	});

});

$(document).ready(function(){

	$(".mcr-other-c").click(function(){
		

		var feature_swipe = document.getElementById("o-store-products");

		feature_swipe.scrollBy(330, 0);		

	});
	$(".mcl-other-c").click(function(){
		
	

		var feature_swipe = document.getElementById("o-store-products");

		feature_swipe.scrollBy(-330, 0);		

	});

});







