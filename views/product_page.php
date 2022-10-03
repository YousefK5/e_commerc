<?php session_start(); ?>

<?php require 'connection.php'; ?>

<?php require 'header2.php'; ?>


<div class="heading-container">
			<div class="container heading-standar">
				<div class="page-breadcrumb">
					<ul class="breadcrumb">
						<li><span><a href="#" class="home"><span>Home</span></a></span></li>
						<li><span>Product Detail</span></li>
						<?php
      $product_id = $_GET['prod_id'];

      $query = $connect->prepare(
          'SELECT * FROM `products` Where product_id=? '
      );
      $query->execute([$product_id]);

      $product = $query->fetch(PDO::FETCH_OBJ);

// print_r($product);
?>
					</ul>
				</div>
			</div>
		</div>
		<div class="content-container">
			<div class="container-full">
				<div class="row">
					<div class="col-md-12 main-wrap">
						<div class="main-content">
							<div class="container">
								<div class="row">
									<div class="col-md-12 no-min-height"></div>
								</div>
							</div>
							<div class="product">
								<div class="container">
									<div class="row summary-container">
										<div class="col-md-8 col-sm-6 entry-image">
											<div class="single-product-images">
												<div class="single-product-images-slider">
													<div class="caroufredsel product-images-slider" data-synchronise=".single-product-images-slider-synchronise" data-scrollduration="500" data-height="variable" data-scroll-fx="none" data-visible="1" data-circular="1" data-responsive="1">
														<div class="caroufredsel-wrap">
															<ul class="caroufredsel-items">
																<li class="caroufredsel-item">
																	<div class="thumb">
																		<a href="../imgs/<?php echo $product->image1; ?> " data-rel="magnific-popup-verticalfit" title="Product-detail">
																			<img width="800" height="850" src="../imgs/<?php echo $product->image1; ?> " alt="Product-detail" />
																		</a>
																	</div>
																</li>
																<?php
                if ($product->image2 != null) { ?>
																<li class="caroufredsel-item">
																	<div class="thumb">
																		<a href="../imgs/<?php echo $product->image2; ?> " data-rel="magnific-popup-verticalfit" title="Product-detail">
																			<img width="800" height="850" src="../imgs/<?php echo $product->image2; ?> " alt="Product-detail" />
																		</a>
																	</div>
																</li>
																<?php }
                if ($product->image3 != null) { ?>
																<li class="caroufredsel-item">
																	<div class="thumb">
																		<a href="../imgs/<?php echo $product->image3; ?> " data-rel="magnific-popup-verticalfit" title="Product-detail">
																			<img width="800" height="850" src="../imgs/<?php echo $product->image3; ?> " alt="Product-detail" />
																		</a>
																	</div>
																</li>
																<?php }
                ?>
															</ul>
															<a href="#" class="caroufredsel-prev"></a>
															<a href="#" class="caroufredsel-next"></a>
														</div>
													</div>
												</div>

																				<?php if (isset($_POST['add_to_card'])) {
                        $_SESSION['userid'] = 13;
                        $qunatity = $_POST['quantity'];
                        $insert = $connect->prepare(
                            'INSERT INTO cart (quantity,product_id,user_id) VALUES (?,?,?)'
                        );
                        $insert->execute([
                            $qunatity,
                            $product->product_id,
                            $_SESSION['userid'],
                        ]);
                    } ?>
												<div class="single-product-thumbnails">
													<div class="caroufredsel product-thumbnails-slider" data-visible-min="2" data-visible-max="4" data-scrollduration="500" data-direction="up" data-height="100%" data-circular="1" data-responsive="0">
														<div class="caroufredsel-wrap">
															<ul class="single-product-images-slider-synchronise caroufredsel-items">
																<li class="caroufredsel-item selected">
																	<div class="thumb">
																		<a href="#" data-rel="1" title="Product-detail">
																			<img width="100" height="150" src="../imgs/<?php echo $product->image1; ?> " alt="Product-detail" />
																		</a>
																	</div>
																</li>
																<?php
                if ($product->image2 != null) { ?>
																<li class="caroufredsel-item">
																	<div class="thumb">
																		<a href="#" data-rel="2" title="Product-detail">
																			<img width="100" height="150" src="../imgs/<?php echo $product->image2; ?>" alt="Product-detail" />
																		</a>
																	</div>
																</li>
																<?php }
                if ($product->image3 != null) { ?>
																<li class="caroufredsel-item">
																	<div class="thumb">
																		<a href="#" data-rel="3" title="Product-detail">
																			<img width="100" height="150" src="../imgs/<?php echo $product->image3; ?>" alt="Product-detail" />
																		</a>
																	</div>
																</li>
																<?php }
                ?>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-6 entry-summary">
											<div class="summary">
												<h1 class="product_title entry-title"><?php echo $product->product_name; ?></h1>

												<p class="price"><span class="amount"><?php echo $product->price; ?> JD</span></p>
												<div class="product-excerpt">
													<p>
														<?php echo $product->description; ?></p>
												</div>
												<div class="product-actions res-color-attr">
													<form class="cart" method="post">
														<div class="product-options-outer">
															<div class="variation_form_section">
																<div class="product-options icons-lg">
																	<table class="variations-table">
																	</table>
																</div>
															</div>
														</div>


						
														<div class="single_variation_wrap">
															<div class="single_variation">
																<span class="price"><span class="amount"></span></span>
															</div>
															<div class="variations_button">
																<div class="quantity">
																	<input type="number" class="breakd" id="qunatity/<?php echo $product->product_id; ?>" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
																</div>
																<button type="submit" id="button" name="add_to_card" class="button">Add to cart</button>
															</div>
														</div>
													</form>
												</div>
												<div class="offcanvas-widget">


													<div class="share-links">
														<div class="share-icons">
															<span class="facebook-share">
																<a href="https://www.facebook.com" title="Facebook">
																	<i class="fa fa-facebook"></i>
																</a> </span>
															<span class="twitter-share">
																<a href="https://www.twitter.com" title="Twitter">
																	<i class="fa fa-behance"></i>
																</a> </span>
															<span class="google-plus-share">
																<a href="https://www.instgram.com" title="Instagram">
																	<i class="fa fa-instagram instagram-bg-hover"></i>
																</a> </span>
															<span class="linkedin-share">
																<a href="https://www.pinterest.com" title="Pinterest">
																	<i class="fa fa-pinterest"></i>
																</a> </span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div style="height:100px ;"></div>
									<div class="container">
										<div class="row">
											<div class="col-sm-12">
												<div class="related products">
													<div class="related-title">
														<h3><span>Related Products</span></h3>
													</div>
													<ul class="products columns-4" data-columns="4">



<?php
$query = $connect->prepare('SELECT * FROM `products` Where category_id=? ');
$query->execute([$product->category_id]);

$products = $query->fetchAll(PDO::FETCH_OBJ);
$count = 0;
foreach ($products as $prod) {
    if ($count < 4 && $prod->product_id != $product->product_id) {
        $count++; ?>
														<li class="product">
															<div class="product-container">
																<figure>
																	<div class="product-wrap">
																		<div class="product-images">
																			<div class="shop-loop-thumbnail">
																				<img width="300" height="350" src="imgs/<?php echo $prod->image1; ?>" alt="Product-2" />
																			</div>
													
																			<div class="clear"></div>
																			<div class="shop-loop-quickview">
																				<a href="#" data-rel="quickViewModal"><i class="fa fa-plus"></i></a>
																			</div>
																		</div>
																	</div>
																	<figcaption>
																		<div class="shop-loop-product-info">
																			<div class="info-title">
																				<h3 class="product_title"><a href="#"><?php echo $prod->product_name; ?></a></h3>
																			</div>
																			<div class="info-meta">
																				<div class="info-price">
																					<span class="price">
																						<span class="amount"><?php echo $prod->price; ?></span>
																					</span>
																				</div>
																				<div class="loop-add-to-cart">
																					<a href="./add_to_cart.php?ad=<?php echo $prod->product_id; ?>">Select options</a>
																				</div>
																			</div>
																		</div>
																	</figcaption>
																</figure>
															</div>
														</li>
														<!-- <li class="product">
															<div class="product-container">
																<figure>
																	<div class="product-wrap">
																		<div class="product-images">
																			<div class="shop-loop-thumbnail">
																				<img width="300" height="350" src="images/product/product-3.jpg" alt="Product-3" />
																			</div>
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#" class="add_to_wishlist">
																						Add to Wishlist
																					</a>
																				</div>
																			</div>
																			<div class="clear"></div>
																			<div class="shop-loop-quickview">
																				<a href="#" data-rel="quickViewModal"><i class="fa fa-plus"></i></a>
																			</div>
																		</div>
																	</div>
																	<figcaption>
																		<div class="shop-loop-product-info">
																			<div class="info-title">
																				<h3 class="product_title"><a href="#">Creamy Spring Pasta</a></h3>
																			</div>
																			<div class="info-meta">
																				<div class="info-price">
																					<span class="price">
																						<span class="amount">&#36;12.00</span>&ndash;<span class="amount">&#36;23.00</span>
																					</span>
																				</div>
																				<div class="loop-add-to-cart">
																					<a href="#">Select options</a>
																				</div>
																			</div>
																		</div>
																	</figcaption>
																</figure>
															</div>
														</li>
														<li class="product">
															<div class="product-container">
																<figure>
																	<div class="product-wrap">
																		<div class="product-images">
																			<div class="shop-loop-thumbnail">
																				<img width="300" height="350" src="images/product/product-4.jpg" alt="Product-4" />
																			</div>
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#" class="add_to_wishlist">
																						Add to Wishlist
																					</a>
																				</div>
																			</div>
																			<div class="clear"></div>
																			<div class="shop-loop-quickview">
																				<a href="#" data-rel="quickViewModal"><i class="fa fa-plus"></i></a>
																			</div>
																		</div>
																	</div>
																	<figcaption>
																		<div class="shop-loop-product-info">
																			<div class="info-title">
																				<h3 class="product_title"><a href="#">Green Chile Burritos</a></h3>
																			</div>
																			<div class="info-meta">
																				<div class="info-price">
																					<span class="price">
																						<span class="amount">&#36;10.75</span>
																					</span>
																				</div>
																				<div class="loop-add-to-cart">
																					<a href="#">Select options</a>
																				</div>
																			</div>
																		</div>
																	</figcaption>
																</figure>
															</div>
														</li>
														<li class="product">
															<div class="product-container">
																<figure>
																	<div class="product-wrap">
																		<div class="product-images">
																			<div class="shop-loop-thumbnail">
																				<img width="300" height="350" src="images/product/product-5.jpg" alt="Product-5" />
																			</div>
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#" class="add_to_wishlist">
																						Add to Wishlist
																					</a>
																				</div>
																			</div>
																			<div class="clear"></div>
																			<div class="shop-loop-quickview">
																				<a href="#" data-rel="quickViewModal"><i class="fa fa-plus"></i></a>
																			</div>
																		</div>
																	</div>
																	<figcaption>
																		<div class="shop-loop-product-info">
																			<div class="info-title">
																				<h3 class="product_title"><a href="#">Jalapeno Dressing Salad</a></h3>
																			</div>
																			<div class="info-meta">
																				<div class="info-price">
																					<span class="price">
																						<span class="amount">&#36;17.75</span>
																					</span>
																				</div>
																				<div class="loop-add-to-cart"> -->
																					<!-- <a href="#">Select options</a>
																				</div>
																			</div>
																		</div>
																	</figcaption>
																</figure>
															</div>
														</li> -->
														<?php
    }
}
?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-widget">
				<div class="container">
					<div class="footer-widget-wrap">
						<div class="row">
							<div class="footer-widget-col col-md-2 col-sm-6">
								<div class="widget widget_nav_menu">
									<h3 class="widget-title"><span>Infomation</span></h3>
									<ul class="menu">
										<li><a href="#">About Us</a></li>
										<li><a href="#">Work Here</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Dealer Locator</a></li>
										<li><a href="#">Happenings</a></li>
									</ul>
								</div>
							</div>
							<div class="footer-widget-col col-md-2 col-sm-6">
								<div class="widget widget_nav_menu">
									<h3 class="widget-title"><span>Customer Care</span></h3>
									<ul class="menu">
										<li><a href="#">Support</a></li>
										<li><a href="#">FAQ</a></li>
										<li><a href="#">Repair Center</a></li>
										<li><a href="#">Contact us</a></li>
									</ul>
								</div>
							</div>
							<div class="footer-widget-col col-md-2 col-sm-6">
								<div class="widget widget_nav_menu">
									<h3 class="widget-title"><span>Quick Link</span></h3>
									<ul class="menu">
										<li><a href="#">Order Status</a></li>
										<li><a href="#">Shipping Policy</a></li>
										<li><a href="#">Return Policy</a></li>
										<li><a href="#">Digital Gift Card</a></li>
									</ul>
								</div>
							</div>
							<div class="footer-widget-col col-md-2 col-sm-6">
								<div class="widget widget_nav_menu">
									<h3 class="widget-title"><span>Help</span></h3>
									<ul class="menu">
										<li><a href="#">Privacy</a></li>
										<li><a href="#">Terms and Conditions</a></li>
										<li><a href="#">Social Responsibility</a></li>
									</ul>
								</div>
							</div>
							<div class="footer-widget-col col-md-4 col-sm-6">
								<div class="widget widget_text">
									<h3 class="widget-title"><span>The Store</span></h3>
									<div class="textwidget">
										<p><i class="fa fa-map-marker"></i> No 68/12, Tower Street,New York, USA</p>
										<p><i class="fa fa-phone"></i> (012) 1234 7824</p>
										<p><i class="fa fa-envelope"></i> <a href="mailto:email@domain.com">email@domain.com</a></p>
										<p class="payment"><img src="images/footer-payment-color.png" alt=""></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer id="footer" class="footer">
				<div class="footer-info">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
								<div class="footer-info-logo">
									<a href="#"><img alt="The DMCS" src="images/footer-logo.png"></a>
								</div>
								<div class="copyright text-center">Copyright right © 2015 DMCS. All Rights Reserved.</div>
								<div class="footer-social">
									<a href="#" title="Facebook" target="_blank">
										<i class="fa fa-facebook facebook-bg-hover"></i>
									</a>
									<a href="#" title="Twitter" target="_blank">
										<i class="fa fa-twitter twitter-bg-hover"></i>
									</a>
									<a href="#" title="Google+" target="_blank">
										<i class="fa fa-google-plus google-plus-bg-hover"></i>
									</a>
									<a href="#" title="Pinterest" target="_blank">
										<i class="fa fa-pinterest pinterest-bg-hover"></i>
									</a>
									<a href="#" title="RSS" target="_blank">
										<i class="fa fa-rss rss-bg-hover"></i>
									</a>
									<a href="#" title="Instagram" target="_blank">
										<i class="fa fa-instagram instagram-bg-hover"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<div class="modal fade user-login-modal" id="userloginModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="userloginModalForm">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Login</h4>
						</div>
						<div class="modal-body">
							<div class="user-login-facebook">
								<button class="btn-login-facebook" type="button">
									<i class="fa fa-facebook"></i>Sign in with Facebook
								</button>
							</div>
							<div class="user-login-or"><span>or</span></div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" id="username" name="log" required class="form-control" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" id="password" required value="" name="pwd" class="form-control" placeholder="Password">
							</div>
							<div class="checkbox clearfix">
								<div class="form-flat-checkbox pull-left">
									<input type="checkbox" name="rememberme" id="rememberme" value="forever"><i></i>&nbsp;Remember Me
								</div>
								<span class="lostpassword-modal-link pull-right">
									<a href="#lostpasswordModal" data-rel="lostpasswordModal">Lost your password?</a>
								</span>
							</div>
						</div>
						<div class="modal-footer">
							<span class="user-login-modal-register pull-left">
								<a data-rel="registerModal" href="#">Not a Member yet?</a>
							</span>
							<button type="submit" class="btn btn-default btn-outline">Sign in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade user-register-modal" id="userregisterModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="userregisterModalForm">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Register account</h4>
						</div>
						<div class="modal-body">
							<div class="user-login-facebook">
								<button class="btn-login-facebook" type="button">
									<i class="fa fa-facebook"></i>Sign in with Facebook
								</button>
							</div>
							<div class="user-login-or"><span>or</span></div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="user_login" required class="form-control" value="" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="user_email">Email</label>
								<input type="email" id="user_email" name="user_email" required class="form-control" value="" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="user_password">Password</label>
								<input type="password" id="user_password" required value="" name="user_password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="user_password">Retype password</label>
								<input type="password" id="cuser_password" required value="" name="cuser_password" class="form-control" placeholder="Retype password">
							</div>
						</div>
						<div class="modal-footer">
							<span class="user-login-modal-link pull-left">
								<a data-rel="loginModal" href="#loginModal">Already have an account?</a>
							</span>
							<button type="submit" class="btn btn-default btn-outline">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade user-lostpassword-modal" id="userlostpasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="userlostpasswordModalForm">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Forgot Password</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Username or E-mail:</label>
								<input type="text" name="user_login" required class="form-control" value="" placeholder="Username or E-mail">
							</div>
						</div>
						<div class="modal-footer">
							<span class="user-login-modal-link pull-left">
								<a data-rel="loginModal" href="#loginModal">Already have an account?</a>
							</span>
							<button type="submit" class="btn btn-default btn-outline">Sign in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade shop product-quickview" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<div class="modal-body">
						<div class="product-quickview-content">
							<div class="row">
								<div class="col-sm-6">
									<div class="single-product-images">
										<div class="single-product-images-slider">
											<img width="800" height="850" src="images/product/product-detail/product-1.jpg" alt="Product-1">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="summary entry-summary">
										<h1 class="product_title entry-title">Cras rhoncus duis viverra</h1>
										<div class="shop-product-rating">
											<div class="star-rating">
												<span style="width:80%"></span>
											</div>
											<a href="#reviews" class="shop-review-link">(<span class="count">1</span> customer review)</a>
										</div>
										<p class="price">
											<span class="amount">$12.00</span>–<span class="amount">$23.00</span>
										</p>
										<div class="product-excerpt">
											<p>
												Proin malesuada enim nulla, nec bibendum justo vestibulum non. Duis et ipsum convallis, bibendum enim a, hendrerit diam. Praesent tellus mi, vehicula et risus eget, laoreet tristique tortor. Fusce id metus eget nibh imperdiet fermentum non in metus.
											</p>
										</div>
										<div class="product-actions res-color-attr">
											<form class="cart">
												<div class="product-options-outer">
													<div class="variation_form_section">
														<div class="product-options icons-lg">
															<table class="variations-table">
																<tbody>
																	<tr>
																		<td><label>Color</label></td>
																		<td>
																			<div class="select-option swatch-wrapper">
																				<a href="#" title="Green" class="swatch-color green">Green</a>
																			</div>
																			<div class="select-option swatch-wrapper selected">
																				<a href="#" title="Red" class="swatch-color red">Red</a>
																			</div>
																			<div class="select-option swatch-wrapper">
																				<a href="#" title="White" class="swatch-color white">White</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td><label>Size</label></td>
																		<td>
																			<div class="select-option swatch-wrapper selected">
																				<a href="#" title="Extra Large" class="swatch-anchor">
																					<img src="images/sizes/XL.jpg" alt="thumbnail" width="35" height="35" />
																				</a>
																			</div>
																			<div class="select-option swatch-wrapper">
																				<a href="#" title="Extra Extra Large" class="swatch-anchor">
																					<img src="images/sizes/XXL.jpg" alt="thumbnail" width="35" height="35" />
																				</a>
																			</div>
																			<div class="select-option swatch-wrapper">
																				<a href="#" title="Medium" class="swatch-anchor">
																					<img src="images/sizes/M.jpg" alt="thumbnail" width="35" height="35" />
																				</a>
																			</div>
																			<div class="select-option swatch-wrapper">
																				<a href="#" title="Small" class="swatch-anchor">
																					<img src="images/sizes/S.jpg" alt="thumbnail" width="35" height="35" />
																				</a>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="single_variation_wrap">
													<div class="single_variation">
														<span class="price"><span class="amount">$20.00</span></span>
													</div>
													<div class="variations_button">
														<div class="quantity">
															<input type="number" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
														</div>
														<button type="submit" class="button">Add to cart</button>
													</div>
												</div>
											</form>
										</div>
										<div class="yith-wcwl-add-to-wishlist">
											<a href="#" class="add_to_wishlist">
												Add to Wishlist
											</a>
										</div>
										<div class="product_meta">
											<span class="sku_wrapper">SKU: <span class="sku">N/A</span></span>
											<span class="posted_in">Category: <a href="#">Aliquam</a></span>
											<span class="tagged_as">Tags: <a href="#">Men</a>, <a href="#">Women</a></span>
											<span class="posted_in">Brand: <a href="#">Adesso</a>, <a href="#">Carvela</a>.</span>
										</div>
										<div class="share-links">
											<div class="share-icons">
												<span class="facebook-share">
													<a href="#" title="Share on Facebook"><i class="fa fa-facebook"></i></a>
												</span>
												<span class="twitter-share">
													<a href="#" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
												</span>
												<span class="google-plus-share">
													<a href="#" title="Share on Google +"><i class="fa fa-google-plus"></i></a>
												</span>
												<span class="linkedin-share">
													<a href="#" title="Share on Linked In"><i class="fa fa-linkedin"></i></a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
		<script type='text/javascript' src='../js/jquery-migrate.min.js'></script>
		<script type='text/javascript' src='../js/jquery.themepunch.tools.min.js'></script>
		<script type='text/javascript' src='../js/jquery.themepunch.revolution.min.js'></script>
		<script type='text/javascript' src='../js/easing.min.js'></script>
		<script type='text/javascript' src='../js/imagesloaded.pkgd.min.js'></script>
		<script type='text/javascript' src='../js/bootstrap.min.js'></script>
		<script type='text/javascript' src='../js/superfish-1.7.4.min.js'></script>
		<script type='text/javascript' src='../js/jquery.appear.min.js'></script>
		<script type='text/javascript' src='../js/script.js'></script>
		<script type='text/javascript' src='../js/swatches-and-photos.js'></script>
		<script type='text/javascript' src='../js/jquery.prettyPhoto.min.js'></script>
		<script type='text/javascript' src='../js/jquery.prettyPhoto.init.min.js'></script>
		<script type='text/javascript' src='../js/jquery.selectBox.min.js'></script>
		<script type='text/javascript' src='../js/jquery.parallax.js'></script>
		<script type='text/javascript' src='../js/jquery.touchSwipe.min.js'></script>
		<script type='text/javascript' src='../js/jquery.transit.min.js'></script>
		<script type='text/javascript' src='../js/jquery.carouFredSel.min.js'></script>
		<script type='text/javascript' src='../js/isotope.pkgd.min.js'></script>
		<script type='text/javascript' src='../js/jquery.magnific-popup.min.js'></script>
		<script src="cart.js"></script>
</body>

</html>