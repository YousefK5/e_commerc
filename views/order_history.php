<?php require_once "connection.php"; ?>

<?php
  require "header2.php";
?>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php 
	
	$delevery=0;
	$sub=0;
	
//get cart info 

$query = "SELECT * from `orders`";
$query = $connect->prepare($query);
$query->execute();
$productsInCart = $query->fetchAll(PDO::FETCH_OBJ);


//
if (isset($_POST['qunatity_by_js'])) {

	$query ="UPDATE `cart` SET `quantity` = ? WHERE `cart_id` = ?" ;
	$query = $connect->prepare($query);
	$query->execute([intval($_POST['qunatity_by_js']),$_POST['cart_id']]);
print_r($qunatity);
	
}

//add to cart 
// if (isset($_POST['update_cart'])) {

// 	// $query ="UPDATE `cart` SET `quantity` =? WHERE `cart_id` = ?";
// 	// $query = $connect->prepare($query);
// 	// $query->execute([ intval($_POST['qunatity1']),$_POST['id_c']]);

// 	// $sub=intval($_POST['qunatity1'])*intval($_POST['price']);
	
// }


//coupon
if(isset($_POST['apply_coupon'])){
$coupon=$_POST['coupon_code'];
$query = "SELECT * from `coupons` where name=?";
$query = $connect->prepare($query);
$query->execute([$coupon]);

$coupon_saved = $query->fetch(PDO::FETCH_OBJ);

if(!empty($coupon_saved)){
if (intval($coupon_saved->count) > 0){
   $sub_total=isset( $sub_total)?$sub_total*($coupon_saved->discount/100):1;
	 $query ="UPDATE `coupons` SET `count` =? WHERE `coupon_id` = ?";
	 $query = $connect->prepare($query);
	 $coupon_saved->count-=1;
	 $query->execute([ $coupon_saved->count,$coupon_saved->coupon_id]);
}
else{

	echo "<script>alert('invalid coupon')</script>";

}

}else 
echo "<script>alert('invalid coupon')</script>";
}




?>


               <div class="heading-container">
				<div class="container heading-standar">
					<div class="page-breadcrumb">
						<ul class="breadcrumb">
							<li><span><a href="/views/index.php" class="home"><span>Home</span></a></span></li>
							<li><span>Cart</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="content-container">
				<div class="container">
					<div class="row">
						<div class="col-md-12 main-wrap">
							<div class="main-content">
								<div class="shop">
									<form method="post" action="cart.php">
										<table class="table shop_table cart">
											<thead>
												<tr>
													<th class="product-remove hidden-xs">&nbsp;</th>
													<th class="product-thumbnail hidden-xs">&nbsp;</th>
													<th class="product-name">Product</th>
													<th class="product-price text-center">Price</th>
													<th class="product-quantity text-center">Quantity</th>
													<th class="product-subtotal text-center hidden-xs">Total</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php 
													$total=0;
													$item_count=0;
                                                    foreach ($productsInCart as $cart){
														//product
														$query = "SELECT * from `products` where product_id=? ";
														$query = $connect->prepare($query);
														$query->execute([$cart->product_id]);
														$product= $query->fetch(PDO::FETCH_OBJ);
                                                       
														//categories
														$query = "SELECT categories.name from `categories` where category_id=? ";
														$query = $connect->prepare($query);
														$query->execute([$product->category_id]);
														$category_name= $query->fetch(PDO::FETCH_OBJ);
														
														//
														$qunatity =$cart->quantity;
												        $sub_total=$product->price*$qunatity;


							
														?>
                                                        <tr class="cart_item">
													<td class="product-remove hidden-xs">
														<input type="hidden" value="<?php echo $cart->cart_id?>" name="id_c" id="cart_id<?php echo $cart->cart_id?>">
														<a href="?del=<?php echo $cart->cart_id?>" class="remove" title="Remove this item">&times;</a>
													</td>
													<td class="product-thumbnail hidden-xs">
														<a href="#">
															<img width="100" height="150" src="../images/product/<?php echo $product->image1 ?>" alt="Product-1"/>
														</a>
													</td>
													<td class="product-name">
														<a href="#" data-rel="quickViewModal" data-original-title="" title=""><?php echo $product->name?></a>
														<dl class="variation">
															<dt class="variation-Size">category:</dt>
															<dd class="variation-Size"><p><?php echo $category_name->name ?></p></dd>
														</dl>
													</td>
													<td class="product-price text-center">
													<input type="hidden" value="<?php echo $product->price;?>" name="price">
                                                    <span class="amount">JD <?php echo $product->price;?></span>
													</td>
													<td class="product-quantity text-center">
														<div class="quantity">

										           <input type="number" step="1" min="0" id="qunatity/<?php echo $cart->cart_id?>/<?php echo $product->price;?>" class="breakdown" name="qunatity<?php echo $cart->product_id?>" value="<?php echo $qunatity?>" title="Qty" class="input-text qty text" size="4"/>
														
									
									           </div>
													</td>
													
													<td class="product-subtotal hidden-xs text-center">
														<span class="amount" id="subTotal">JD <?php echo $product->price * $cart->quantity ?></span>
													</td>
												</tr>
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
									<img width="800" height="850" src="../images/product/product-detail/product-1.jpg" alt="Product-1">

								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="summary entry-summary">
								<!--title  -->

								<h1 class="product_title entry-title">Cras rhoncus duis viverra</h1>
								<!-- rating -->

								<div class="shop-product-rating">
									<div class="star-rating">
										<span style="width:40%"></span>
									</div>
									<a href="#reviews" class="shop-review-link">(<span class="count">1</span> customer review)</a>
								</div>
								<!-- price -->

								<p class="price">
									<span class="amount">$12.00</span>–<span class="amount">$23.00</span>
								</p>
								<!-- description -->

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

												</div>
											</div>
										</div>
										<div class="single_variation_wrap">
											<div class="single_variation">
												<!-- price  -->
												<span class="price"><span class="amount">$20.00</span></span>
											</div>
											<form action="add_to_cart.php" method="post">
											<div class="variations_button">
												<div class="quantity">
													<input type="number" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
													<input type="hidden" name="add_to_cart" value="5" title="Qty">

												</div>
				                            <button type="submit" class="button">Add to cart</button>
											</div>
											<form>
										</div>
									</form>
								</div>
								<div class="yith-wcwl-add-to-wishlist">
									<a href="#" class="add_to_wishlist">
										Add to Wishlist
									</a>
								</div>


								<div class="product_meta">
									<!-- <span class="sku_wrapper">SKU: <span class="sku">N/A</span></span> -->

									<!-- Category -->


									<span class="posted_in">Category: <a href="#">Aliquam</a></span>
									<!-- <span class="tagged_as">Tags: <a href="#">Men</a>, <a href="#">Women</a></span> -->
									<!-- <span class="posted_in">Brand: <a href="#">Adesso</a>, <a href="#">Carvela</a>.</span> -->
								</div>
								<div class="share-links">



									<div class="share-icons">
										<span class="facebook-share">
											<a href="https://www.facebook.com" title="Share on Facebook"><i class="fa fa-facebook"></i></a>
										</span>
										<span class="twitter-share">
											<a href="https://www.twitter.com" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
										</span>
										<span class="instgram-share">
											<a href="https://www.instgram.com#" title="Share on Instagram "><i class="fa fa-google-plus"></i></a>
										</span>
										<span class="pinterest-share">
											<a href="https://www.pinterest.com" title="Share on Pinterest"><i class="fa fa-linkedin"></i></a>
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
												<?php
												//   $item_count = $qunatity;
												  $total+=$sub_total; } ?>

                
												<tr>
													<td colspan="6" class="actions">
														<div class="coupon">
                                                            <form method="post" action="cart.php" >
															<label for="coupon_code">Coupon:</label> 
															<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"/> 
															<input type="submit" class="button" name="apply_coupon" value="Apply Coupon"/>
                                                          </form>
														</div>
														<input type="submit" class="button update-cart-button" name="update_cart" value="Update Cart"/>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
									<?php 
													
													  ?>
									<div class="cart-collaterals">
										<div class="cart_totals">
											<h2>Cart Totals</h2>
											<table>
												<tr class="cart-subtotal">
													<th>Subtotal</th>
													<td><span class="amount">JD <?php echo $total ?></span></td>
												</tr>
												<tr class="shipping">
													<th>Discount</th>
													<td><span class="amount"> <?php if( isset($_POST['apply_coupon'])) { echo $coupon_saved->discount ." %";} else echo "0";?></span></td>
												</tr>
												<tr class="order-total">
													<th>Total</th>
													<td><strong><span class="amount">JD <?php if( isset($_POST['apply_coupon'])) {echo $total-$total*($coupon_saved->discount/100); }else echo $total  ?></span></strong></td>
												</tr>
											</table>
											<div class="wc-proceed-to-checkout">
												<a href="#" class="checkout-button button alt wc-forward">Proceed to Checkout</a>
											</div>
										</div>
							
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php	require_once "footer.php"?>

<script>
    document.body.classList.add("shop-account");
</script>
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
		<script type='text/javascript' src='../js/core.min.js'></script>
		<script type='text/javascript' src='../js/widget.min.js'></script>
		<script type='text/javascript' src='../js/mouse.min.js'></script>
		<script type='text/javascript' src='../js/slider.min.js'></script>
		<script type='text/javascript' src='../js/jquery-ui-touch-punch.min.js'></script>
		<script type='text/javascript' src='../js/price-slider.js'></script>



		<script src="cart.js"></script>