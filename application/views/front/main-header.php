
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | BOSSMALL - </title>

	<link href="<?php echo base_url()?>assets/front/css/bootstrap.min.css?<?php echo time() ?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/font-awesome.min.css?<?php echo time() ?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/prettyPhoto.css?<?php echo time() ?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/price-range.css?<?php echo time() ?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/animate.css?<?php echo time() ?>" rel="stylesheet">
		
	<script src="https://use.fontawesome.com/aa228547d6.js"></script>
	

	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tangerine">

	
	<!-- <link href="<?php echo base_url()?>assets/front/css/sliderprice.css" rel="stylesheet"> -->
	<link href="<?php echo base_url()?>assets/front/css/jquery-ui.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/responsive.css?<?php echo time() ?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/main.css?<?php echo time() ?>" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="<?php echo base_url()?>assets/front/js/html5shiv.js"></script>
    <script src="<?php echo base_url()?>assets/front/js/respond.min.js"></script>
    <![endif]-->       

	  <!-- favicon -->
	  <link href="<?php echo base_url()?>assets/front/images/home/SECOND_LOGO.png"  rel="shortcut icon">

  
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

<div class="menu-slide">
	<div class="container-fluid">
		<div class="col-md-12">

		<div class="logo">
							<a href="<?php echo base_url();?>">  <img src="<?php echo base_url()?>assets/front/images/home/FIRST_LOGO.png" alt="" /></a>
		</div>

		<hr>

		


</div>

</div>
		<div class="col-md-12">

<ul class="mobile-menu">
<li class="mobile-menu-items"><a class="" href="#" id=""><?php echo "Support" ?></a></li>
<hr>

<p class="menu-header">BossMall Accounts</p>
<li class="mobile-menu-items"><a class="" href="#" id=""><?php echo "My BossMall Account" ?></a></li>
<li class="mobile-menu-items"><a class="" href="#" id=""><?php echo "Merchants Hub" ?></a></li>
<li class="mobile-menu-items"><a class="" href="#" id=""><?php echo "BossAgents" ?></a></li>
<li class="mobile-menu-items"><a class="" href="#" id=""><?php echo "Vouchers" ?></a></li>
<br>
<p class="menu-header">Categories</p>
<?php $categories = $this->CategoryModel->get_all_category();
		  foreach($categories as $category){
?>
	<li class="mobile-menu-items"><a class="" href="#" id="<?php echo "c-".$category->category_id ?>"><?php echo $category->category_name ?></a></li>

	
<?php } ?>
		</ul>
		  </div>

</div>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +234 309</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> support@mybossmall.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-social-icons">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url();?>">  <img src="<?php echo base_url()?>assets/front/images/home/FIRST_LOGO.png" alt="" /></a>
						</div>
					<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Nigeria
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
							    	<li><a href="#">Ghana</a></li>
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
									<li><a href="#">US</a></li>
									
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									NAIRA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Cedis</a></li>
									<li><a href="#">Canadian Dollar</a></li>						
									<li><a href="#">Pound</a></li>
									<li><a href="#">US Dollar</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8 col-main-menu">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li id="account-menu-trigger"><a href="#"><i class="fa fa-user"></i> Account</a>

								<div class="account-sub-menu">
								<button type="button" class="btn btn-block btn-warning" id="sign-button-navbar">Sign In</button>
								<ul>

		             			    <li class=""><a href="">Boss Agents</a></li>
									 
									<li class=""><a href="">Merchants</a></li>

                             </div>
							
							</li>
								<li><a href="#"><i class="fa fa-star"></i> Compare</a></li>
								<?php $customer_id = $this->session->userdata('cus_id');?>
								<?php $shipping_id = $this->session->userdata('shipping_id');?>

									<?php if($this->cart->total_items()!=Null && $customer_id!=NULL && $shipping_id!=NULL){
										?>
								<li>
									<a href="<?php echo base_url()?>payment"><i class="fa fa-crosshairs"></i> Checkout</a>

								</li>
									<?php }elseif($this->cart->total_items()!=Null && $customer_id!=NULL){?>

								<li>
									<a href="<?php echo base_url()?>billing"><i class="fa fa-crosshairs"></i> Checkout</a>

								</li>

									<?php }else{?>
								<li>
									<a href="<?php echo base_url()?>checkout"><i class="fa fa-crosshairs"></i> Checkout</a>

								</li>
									<?php } ?>
								<li>
									<?php if($this->cart->total_items()!=Null && $customer_id!=NULL && $shipping_id!=NULL){?>
									<a href="<?php echo base_url()?>payment"><i class="fa fa-credit-card"></i>Payment</a>
									<?php } ?>
								</li>
								<li>	
									<a href="<?php echo base_url()?>show-cart"><i class="fa fa-shopping-cart"></i>
									<?php $cart_items =  $this->cart->total_items();
										if($cart_items>0){
									?> 
									 Cart(<?php echo $cart_items;?>)
									 <?php }else{?>
									  Cart(empty)
									 <?php } ?>
									</a>

								</li>
								<?php 
									
								if($customer_id){?>
								<li>
								<!--	<a href="<?php //echo base_url()?>logout"><i class="fa fa-lock"></i> Logout</a>-->
								</li>
								<?php }else{ ?>
								<li>
									<!--<a href="<?php //echo base_url()?>checkout"><i class="fa fa-lock"></i> Login</a>-->
								</li>
								<?php } ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle"  >
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
							   <!--<li><a href="#"  style="color:#444444">Categories  <i class="fa fa-bars"></i></a>
							
							</li>-->
							
							
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="<?php echo base_url()?>search" method="post">
							<input type="text" name="search" placeholder="search" />							
							</form>
						</div> 
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->