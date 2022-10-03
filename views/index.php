<?php require 'header.php';
require './connection.php';
?>




			<div class="content-container no-padding">
				<div class="container-full">
					<div class="row">
						<div class="col-md-12 main-wrap">
							<div class="main-content">
								<div id="home-slider" data-autorun="yes" data-duration="6000" class="carousel slide fade dhslider dhslider-custom " data-height="650">
									<div class="dhslider-loader">
										<div class="fade-loading">
											<i></i><i></i><i></i><i></i>
										</div>
									</div>
									<div class="carousel-inner dhslider-wrap">
										<div class="item slider-item active">
											<div class="slide-bg slide-bg-1"></div>  
											<div class="slider-caption caption-align-left">
												<div class="slider-caption-wrap">
													<span class="slider-top-caption-text">Winter is here!</span>
													<h2 class="slider-heading-text">Ready to get comfy? </h2>
													<div class="slider-caption-text">There’s no place like bed. Sleep easy with the softest natural bedding essentials.</div>
													<div class="slider-buttons">
														<a href="#" class="btn btn-lg btn-white-outline">Detail</a>
														<a href="#" class="btn btn-lg btn-white-outline">Buy Now</a>
													</div>
												</div>
											</div>
										</div>
										<div class="item slider-item">
											<div class="slide-bg slide-bg-2"></div>  
											<div class="slider-caption caption-align-right">
												<div class="slider-caption-wrap">
													<span class="slider-top-caption-text">Great deals for our great customers.</span>
													<h2 class="slider-heading-text">Here, you'll get a good night sleep, not just a mattress.</h2>
													<div class="slider-caption-text">the right place to choose a mattress.</div>
													<div class="slider-buttons">
														<a href="#" class="btn btn-lg btn-white">SEE MORE</a>
														<a href="#" class="btn btn-lg btn-white-outline">GET NOW</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<ol class="carousel-indicators parallax-content">
										<li data-target="#home-slider" data-slide-to="0" class="active"></li>
										<li data-target="#home-slider" data-slide-to="1"></li>
									</ol>
								</div>
								<div class="product-categories-grid">
									<div class="product-categories-grid-wrap clearfix">
										<div class="product-category-wall">


										<?php $sql = $connect->query('SELECT * from categories'); ?>

											<?php $category = $sql->fetch(PDO::FETCH_ASSOC);
// print_r($category) ;
?>
											<div class="wall-col col-md-6 col-sm-12 title-in product-category-wall" >
												
												<a href="./shop.php?category=<?php echo $category['category_id']; ?>">
													<div class="product-category-grid-item">
														<div class="product-category-grid-item-wrap">
															<div class="product-category-grid-featured-wrap">
																<div class="product-category-grid-featured bg-1" style="background-image: url(../images/categories/<?php echo $category[
                    'image'
                ]; ?>)"></div>
															</div>
															<div class="product-category-grid-featured-summary  ">
																<h3><?php echo $category['category_name']; ?> <small><?php echo $category[
     'extra'
 ]; ?></small></h3>
															</div>
														</div>
													</div>
												</a>
											</div>

											<?php $category = $sql->fetch(PDO::FETCH_ASSOC); ?>
											<div class="wall-col col-md-6 col-sm-12 title-out product-category-wall">
												<a href="#">
													<div class="product-category-grid-item">
														<div class="product-category-grid-item-wrap">
															<div class="product-category-grid-featured-wrap">
																<div class="product-category-grid-featured bg-2" style="background-image: url(../images/categories/<?php echo $category[
                    'image'
                ]; ?>)"></div>
															</div>
															<div class="product-category-grid-featured-summary">
																<h3>
                                                                <?php echo $category[
                                                                    'category_name'
                                                                ]; ?> <small><?php echo $category[
     'extra'
 ]; ?></small>
																</h3>
															</div>
														</div>
													</div>
												</a>
											</div>
											<?php $category = $sql->fetch(PDO::FETCH_ASSOC); ?>
											<div class="wall-col col-md-6 col-sm-12 title-out product-category-wall">
												<a href="#">
													<div class="product-category-grid-item">
														<div class="product-category-grid-item-wrap">
															<div class="product-category-grid-featured-wrap">
																<div class="product-category-grid-featured bg-3" style="background-image: url(../images/categories/<?php echo $category[
                    'image'
                ]; ?>)"></div>
															</div>
															<div class="product-category-grid-featured-summary">
																<h3><?php echo $category['category_name']; ?> <small><?php echo $category[
     'extra'
 ]; ?></small></h3>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div>



										<div class="product-category-wall wall-row">


										<?php $category = $sql->fetch(PDO::FETCH_ASSOC); ?>
											<div class="wall-col col-sm-4 title-out height-auto product-category-wall">
												<a href="#">
													<div class="product-category-grid-item">
														<div class="product-category-grid-item-wrap">
															<div class="product-category-grid-featured-wrap">
																<div class="product-category-grid-featured bg-4" style="background-image: url(../images/categories/<?php echo $category[
                    'image'
                ]; ?>)"></div>
															</div>
															<div class="product-category-grid-featured-summary">
																<h3><?php echo $category['category_name']; ?> <small><?php echo $category[
     'extra'
 ]; ?></small></h3>
															</div>
														</div>
													</div>
												</a>
											</div>

	    									<?php $category = $sql->fetch(PDO::FETCH_ASSOC); ?>
											<div class="wall-col col-sm-4 title-out height-auto product-category-wall">
												<a href="#">
													<div class="product-category-grid-item">
														<div class="product-category-grid-item-wrap">
															<div class="product-category-grid-featured-wrap">
																<div class="product-category-grid-featured bg-5" style="background-image: url(../imgs/<?php echo $category[
                    'image'
                ]; ?>)"></div>
															</div>
															<div class="product-category-grid-featured-summary">
																<h3>
																<?php echo $category['category_name']; ?> <small><?php echo $category[
     'extra'
 ]; ?></small>
																</h3>
															</div>
														</div>
													</div>
												</a>
											</div>
											<?php $category = $sql->fetch(PDO::FETCH_ASSOC); ?>
											<div class="wall-col col-sm-4 title-out height-auto product-category-wall">
												<a href="#">
													<div class="product-category-grid-item">
														<div class="product-category-grid-item-wrap">
															<div class="product-category-grid-featured-wrap">
																<div class="product-category-grid-featured bg-6" style="background-image: url(../imgs<?php echo $category[
                    'image'
                ]; ?>)"></div>
															</div>
															<div class="product-category-grid-featured-summary">
																<h3>
                                                                <?php echo $category[
                                                                    'category_name'
                                                                ]; ?> <small><?php echo $category[
     'extra'
 ]; ?></small>
																</h3>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="col-md-12 main-wrap">
	<div class="main-content">
		<div class="lookbooks">
			<div class="lookbook lookbook-right clearfix">
				<div class="loobook-wrap clearfix">
					<div class="lookbook-info">
					<a href="./shop.php">
						<div class="lookbook-info-wrap" style="min-height: 300px;">
							<div class="lookbook-info-sumary">
								<span class="lookbook-small-title"></span>
								<!-- <h3><a href="./shop.php"><span class="nth-word-first"></span></a></h3> -->
								<!-- <a class="btn btn-primary lookbook-action" href="./shop.php"><span>Shop Now</span></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="lookbook-thumb">
						<div class="caroufredsel product-slider" data-height="variable" data-scroll-fx="scroll" data-scroll-item="1" data-visible-min="1" data-visible-max="3" data-responsive="1" data-infinite="1" data-autoplay="0" data-circular="1">
							<div class="caroufredsel-wrap">
								<div class="shop shop-lookbok columns-3">
									<ul class="products columns-3" data-columns="3">

									<?php
         $sql1 = $connect->query(
             "SELECT * FROM products WHERE new_arrive='1' "
         );
         while ($prod = $sql1->fetch(PDO::FETCH_ASSOC)) { ?>
										<li class="product">
											<div class="product-container">
												<figure>
													<div class="product-wrap">
														<div class="product-images">
															<div class="shop-loop-thumbnail">
																<img width="300" height="350" src="../imgs/<?php echo $prod[
                    'image1'
                ]; ?>" alt="Product-2"/>
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
																<h3 class="product_title"><a href="./product_page.php?prod_id=<?php echo $prod[
                    'product_id'
                ]; ?>"><?php echo $prod['product_name']; ?></a></h3>
																</div>
															<div class="info-meta">
																<div class="info-price">
																	<span class="price">
																		<span class="amount">&#36;<?php echo $prod[
                      'price'
                  ]; ?></span>&ndash;<span class="amount">&#36;150</span>
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
										<?php }
         ?>

								</div>
								<a href="#" class="caroufredsel-prev"></a>
								<a href="#" class="caroufredsel-next"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="lookbook lookbook-left clearfix">
				<div class="loobook-wrap clearfix">
					<div class="lookbook-info">
						<div class="lookbook-info-wrap bg-1">
							<div class="lookbook-info-sumary" style="margin-top: 120px;">
								<span class="lookbook-small-title">Winter is not a Season, It's a Celebration</span>
								<h3><a href="./shop.php"><span class="nth-word-first">Winter Offers</span></a></h3>
								<a class="btn btn-primary lookbook-action" href="./shop.php"><span>Shop Now</span></a>
							</div>
						</div>
					</div>
					<div class="lookbook-thumb">
						<div class="caroufredsel product-slider" data-height="variable" data-scroll-fx="scroll" data-scroll-item="1" data-visible-min="1" data-visible-max="3" data-responsive="1" data-infinite="1" data-autoplay="0" data-circular="1">
							<div class="caroufredsel-wrap">
								<div class="shop shop-lookbok columns-3">
									<ul class="products columns-3" data-columns="3">
									<?php
         $sql1 = $connect->query("SELECT * FROM products  WHERE offers='1' ");
         while ($prod = $sql1->fetch(PDO::FETCH_ASSOC)) { ?>
										<li class="product">
											<div class="product-container">
												<figure>
													<div class="product-wrap">
														<div class="product-images">
															<div class="shop-loop-thumbnail">
																<img width="300" height="350" src="../imgs/<?php echo $prod[
                    'image1'
                ]; ?>" alt="Product-2"/>
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
																<h3 class="product_title"><a href="./product_page.php?prod_id=<?php echo $prod[
                    'product_id'
                ]; ?>"><?php echo $prod['product_name']; ?></a></h3>
																</div>
															<div class="info-meta">
																<div class="info-price">
																	<span class="price">
																		<span class="amount">&#36;<?php echo $prod[
                      'price'
                  ]; ?></span>&ndash;<span class="amount">&#36;150</span>
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
										<?php }
         ?>

								</div>
								<a href="#" class="caroufredsel-prev"></a>
								<a href="#" class="caroufredsel-next"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="lookbook lookbook-right clearfix">
				<div class="loobook-wrap clearfix">
					<div class="lookbook-info">
					<a href="./shop.php">
						<div class="lookbook-info-wrap bg-2" style="min-height: 300px;">
							 <div class="lookbook-info-sumary"> 
								 <!-- <span class="lookbook-small-title">Cras quis</span> -->
								<!-- <h3><a href="#"><span class="nth-word-first">Discounts</span>  </a></h3> -->
								<!-- <a class="btn btn-primary lookbook-action" href="#"><span>Shop Now</span></a>  -->
								
							</div>
						 </div>
						 </a>
					</div>
					<div class="lookbook-thumb">
						<div class="caroufredsel product-slider" data-height="variable" data-scroll-fx="scroll" data-scroll-item="1" data-visible-min="1" data-visible-max="3" data-responsive="1" data-infinite="1" data-autoplay="0" data-circular="1">
							<div class="caroufredsel-wrap">
								<div class="shop shop-lookbok columns-3">
									<ul class="products columns-3" data-columns="3">

									<?php
         $sql1 = $connect->query(
             "SELECT * FROM products  WHERE discount!='0' "
         );
         while ($prod = $sql1->fetch(PDO::FETCH_ASSOC)) { ?>
										<li class="product">
											<div class="product-container">
												<figure>
													<div class="product-wrap">
														<div class="product-images">
															<div class="shop-loop-thumbnail">
																<img width="300" height="350" src="../imgs/<?php echo $prod[
                    'image1'
                ]; ?>" alt="Product-2"/>
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
																<h3 class="product_title"><a href="./product_page.php?prod_id=<?php echo $prod[
                    'product_id'
                ]; ?>"><?php echo $prod['product_name']; ?></a></h3>
																</div>
															<div class="info-meta">
																<div class="info-price">
																	<span class="price">
																		<span class="amount">&#36;<?php echo $prod[
                      'price'
                  ]; ?></span>&ndash;<span class="amount">&#36;150</span>
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
										<?php }
         ?>

								</div>
								<a href="#" class="caroufredsel-prev"></a>
								<a href="#" class="caroufredsel-next"></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		<div class="footer-services">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 footer-service-item">
						<a class="footer-service-item-i" href="#">
							<i class="footer-service-icon fa fa-send-o"></i>
							<h3 class="footer-service-title">Shipping & Returns</h3>
							<span class="footer-service-text">
								World wide shipping to selected countries
							</span>
						</a>
					</div>
					<div class="col-sm-4 footer-service-item">
						<a class="footer-service-item-i" href="#">
							<i class="footer-service-icon fa fa-life-bouy"></i>
							<h3 class="footer-service-title">FAQ</h3>
							<span class="footer-service-text">
								Answers to frequently asked questions
							</span>
						</a>
					</div>
					<div class="col-sm-4 footer-service-item">
						<a class="footer-service-item-i" href="#">
							<i class="footer-service-icon fa fa-home"></i>
							<h3 class="footer-service-title">Stores</h3>
							<span class="footer-service-text">Find our retail locations</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>























































								<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->








<?php require 'footer.php'; ?>


