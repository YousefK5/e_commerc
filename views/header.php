<?php require 'connection.php'; ?>
<!doctype html>
<html lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<title>Home Lookbook | HTML Template</title>
	<link rel="shortcut icon" href="../images/favicon.png">
	<!-- <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->

	<link rel='stylesheet' href='../css/settings.css' type='text/css' media='all' />
	<link rel='stylesheet' href='../css/swatches-and-photos.css' type='text/css' media='all' />
	<link rel='stylesheet' href='../css/font-awesome.min.css' type='text/css' media='all' />
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Montserrat%3A400%2C700&#038;' type='text/css' media='all' />
	<link rel='stylesheet' href='../css/elegant-icon.css' type='text/css' media='all' />
	<link rel='stylesheet' href='../css/style.css' type='text/css' media='all' />
	<link rel='stylesheet' href='../css/shop.css' type='text/css' media='all' />
	<!-- <link rel='stylesheet' href='../css/layout.css' type='text/css' media='all' /> -->

	


</head>

<body>
	<div class="contain"></div>
	<div class="offcanvas open">
		<div class="offcanvas-wrap">
			<div class="offcanvas-user clearfix">
				<a class="offcanvas-user-wishlist-link" href="wishlist.html">
					<i class="fa fa-heart-o"></i> My Wishlist
				</a>
				<a class="offcanvas-user-account-link" href="my-account.html">
					<i class="fa fa-user"></i> Login
				</a>
			</div>
			<nav class="offcanvas-navbar">
				<ul class="offcanvas-nav">
					<li> <a href="index.html">Home <span class="caret"></span></a></li>
			
					<li class="menu-item-has-children dropdown">
						<a href="shop.html" class="dropdown-hover">Shop <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li id="menu-item-10433">
								<a href="shop-by-category.html">Women <span class="caret"></span></a>
								
							</li>
							<li>
								<a href="shop-by-category.html">Brands <span class="caret"></span></a>
							
							</li>
							<li>
								<a href="shop-by-collection.html">Conllections <span class="caret"></span></a>
						
							</li>
							<li>
								<a href="#">Woo </span></a>
				
							</li>
						</ul>
					</li>
					<li><a href="collection.html">Collections</a></li>
			
					<li class="menu-item-has-children dropdown">
						<a href="#" class="dropdown-hover">Pages <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="about-us.html">About us</a></li>
							<li><a href="contact-us.html">Contact Us</a></li>
							<li><a href="faq.html">FAQ</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<div class="offcanvas-widget">
				<div class="widget social-widget">
					<div class="social-widget-wrap social-widget-none">
						<a href="https://www.facebook.com" title="Facebook">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="https://www.twitter.com" title="Twitter">
							<i class="fa fa-behance"></i>
						</a>
						<a href="https://www.instgram.com" title="Instagram">
							<i class="fa fa-instagram instagram-bg-hover"></i>
						</a>
						<a href="https://www.pinterest.com" title="Pinterest">
							<i class="fa fa-pinterest"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="wrapper" class="wide-wrap">
		<div class="offcanvas-overlay"></div>
		<header class="header-type-classic header-absolute header-transparent">
			<div class="topbar">
				<div class="container topbar-wap">
					<div class="row">
						<div class="col-sm-6">
							<div class="left-topbar">
								<div class="topbar-social">
									<a href="https://www.facebook.com" title="Facebook">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="https://www.twitter.com" title="Twitter">
										<i class="fa fa-behance"></i>
									</a>
									<a href="https://www.instgram.com" title="Instagram">
										<i class="fa fa-instagram instagram-bg-hover"></i>
									</a>
									<a href="https://www.pinterest.com" title="Pinterest">
										<i class="fa fa-pinterest"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="right-topbar">
								<div class="user-wishlist">
									<a href="wishlist.html"><i class="fa fa-heart-o"></i> My Wishlist</a>
								</div>
								<div class="user-login">
									<ul class="nav top-nav">
										<li class="menu-item">
											<a data-rel="loginModal" href="#"><i class="fa fa-user"></i> Login</a>
										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="navbar-container">
				<div class="navbar navbar-default  navbar-scroll-fixed">
					<div class="navbar-default-wrap">
						<div class="container">
							<div class="row">
								<div class="col-md-12 navbar-default-col">
									<div class="navbar-wrap">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar bar-top"></span>
												<span class="icon-bar bar-middle"></span>
												<span class="icon-bar bar-bottom"></span>
											</button>
											<a class="navbar-search-button search-icon-mobile" href="#">
												<i class="fa fa-search"></i>
											</a>




											<a class="cart-icon-mobile" href="#">
												<!-- count of cart  -->
												<i class="elegant_icon_bag"></i><span>0</span>
											</a>


											<!-- logo image  -->
											<a class="navbar-brand" href="./">
												<img class="logo" alt="The DMCS" src="../images/logo-transparent.png">
												<img class="logo-fixed" alt="The DMCS" src="../images/logo-fixed.png">
												<img class="logo-mobile" alt="The DMCS" src="../images/logo-mobile.png">
											</a>
										</div>
										<nav class="collapse navbar-collapse primary-navbar-collapse">
											<ul class="nav navbar-nav primary-nav">
												<li class="menu-item-has-children dropdown">
													<a href="./" class="dropdown-hover">
														<span class="underline">Home</span> </span>
													</a>

												</li>
												<li class="menu-item-has-children megamenu megamenu-fullwidth dropdown">
													<a href="shop.html" class="dropdown-hover">
														<span class="underline">Shop</span> <span class="caret"></span>
													</a>
													<ul class="dropdown-menu">
														<li class="menu-item-has-children mega-col-3 dropdown-submenu">
															<h3 class="megamenu-title">
																Women
															</h3>

														</li>
														<li class="menu-item-has-children mega-col-3 dropdown-submenu">
															<h3 class="megamenu-title">
																Brands
															</h3>

														</li>
														<li class="menu-item-has-children mega-col-3 dropdown-submenu">
															<h3 class="megamenu-title">
																Collections
															</h3>

														</li>
														<li class="menu-item-has-children mega-col-3 dropdown-submenu">
															<h3 class="megamenu-title">
																Woo
															</h3>


														</li>
													</ul>
												</li>
												<li><a href="collection.html"><span class="underline">Collections</span></a></li>

												<li class="menu-item-has-children dropdown">

													<!-- Pages link -->
													<a href="#" class="dropdown-hover">
														<span class="underline">Pages</span> <span class="caret"></span>
													</a>
													<ul class="dropdown-menu">
														<li><a href="about-us.html">About us</a></li>
														<li><a href="contact-us.html">Contact Us</a></li>
														<li><a href="faq.html">FAQ</a></li>
													</ul>
												</li>
												<!-- search desktop icon -->

												<li class="navbar-search">
													<a class="navbar-search-button" href="#">
														<i class="fa fa-search"></i>
													</a>
												</li>


												<!-- cart and boxes start -->
	<?php
 if (isset($_GET['del'])) {
     $cart_id = $_GET['del'];

     $query = $connect->prepare('DELETE  FROM `cart` Where cart_id=? ');
     $query->execute([$cart_id]);
 }

 $query = 'SELECT * from `cart`';
 $query = $connect->prepare($query);
 $query->execute();
 $productsInCart = $query->fetchAll(PDO::FETCH_OBJ);

 if (empty($productsInCart)) { ?>
												<li class="navbar-minicart navbar-minicart-nav">
													<a class="minicart-link" href="#">
														<span class="minicart-icon">
															<i class="minicart-icon-svg elegant_icon_bag"></i>
															<span><?php echo count($productsInCart); ?></span>
														</span>
													</a>

													<div class="minicart">
														<div class="minicart-header no-items show">
															Your shopping bag is empty.
														</div>

														<div class="minicart-footer">
															<div class="minicart-actions clearfix">
																<a class="button" href="./shop.php">
																	<span class="text">Go to the shop</span>
																</a>
															</div>
														</div>
													</div>
												</li>


<?php } else { ?>






												<li class="navbar-minicart navbar-minicart-nav">
														<a class="minicart-link" href="#">
															<span class="minicart-icon has-item">
																<i class="minicart-icon-svg elegant_icon_bag"></i> <span><?php echo count(
                    $productsInCart
                ); ?></span>
															</span>
														</a>
														<div class="minicart" style="display:none">
															<div class="minicart-header"><?php echo count(
                   $productsInCart
               ); ?> items in the shopping cart</div>
															<div class="minicart-body">
																<?php foreach ($productsInCart as $pInCart) {

                    $query = "SELECT * from `products` WHERE product_id= '$pInCart->product_id'";
                    $query = $connect->prepare($query);
                    $query->execute();
                    $product = $query->fetch(PDO::FETCH_OBJ);
                    ?>
																<div class="cart-product clearfix">
																	<div class="cart-product-image">
																		<a class="cart-product-img" href="#">
																			<img width="100" height="150" src="../imgs/<?php echo $product->image1; ?>" alt="Product-1"/>
																		</a>
																	</div>
																	<div class="cart-product-details">
																		<div class="cart-product-title">
																			<a href="#"><?php echo $product->product_name; ?></a>
																		</div>
																		<div class="cart-product-quantity-price">
																			<?php echo $pInCart->quantity; ?> x <span class="amount">&#36;<?php echo $product->price; ?></span>
																		</div>
																	</div>
																	<a href="?del=<?php echo $pInCart->cart_id; ?>" class="remove" title="Remove this item">&times;</a>
																</div>
																<?php
                } ?>
															</div>
															<div class="minicart-footer">
																<div class="minicart-actions clearfix">
																	<a class="checkout-button button" href="./cart.php">
																		<span class="text">View Cart</span>
																	</a>
																</div>
															</div>
														</div>
													</li>
<?php }
 ?>

												<!-- cart and boxes -->
											</ul>

											<!--desktop nav end -->
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- search open box -->
					<div class="header-search-overlay hide">
						<div class="container">
							<div class="header-search-overlay-wrap">
								<!-- search form -->
								<form class="searchform">
									<input type="search" class="searchinput" name="s" value="" placeholder="Search..." />
									<input type="submit" class="searchsubmit hidden" name="submit" value="Search" />
								</form>
								<button type="button" class="close">
									<span aria-hidden="true" class="fa fa-times"></span>
									<span class="sr-only">Close</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>