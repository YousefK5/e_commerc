<?php
require 'connection.php';
$query = 'SELECT * from categories';
$query = $connect->prepare($query);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_OBJ);
?>



<?php if (isset($_POST['min'])) {
    // print_r($_POST);
    $min = $_POST['min'];
    $max = $_POST['max'];
    $cat = $_POST['cat'];
    if ($cat == '0') {
        $products = $connect->query(
            "SELECT * FROM products WHERE price BETWEEN '$min' AND '$max'"
        );
    } else {
        $products = $connect->query(
            "SELECT * FROM products WHERE category_id='$cat' AND price BETWEEN '$min' AND '$max'"
        );
    }

    $products = $products->fetchAll(PDO::FETCH_OBJ);
    // print_r($products);
} ?>

                        <ul class="products masonry-products row masonry-wrap">
                            <?php foreach ($products as $product) {
                                foreach ($categories as $categorie) {
                                    if (
                                        $product->category_id ==
                                        $categorie->category_id
                                    ) {
                                        break;
                                    }
                                } ?>
                                <li class="product masonry-item col-md-3 col-sm-6 <?php echo trim(
                                    $categorie->category_name
                                ); ?>">
                                    <div class="product-container">
                                        <figure>
                                            <div class="product-wrap">
                                                <div class="product-images">
                                                    <div class="shop-loop-thumbnail">
                                                        <img width="300px" height="350px" src="../imgs/<?php echo $product->image1; ?>" alt="Product" />
                                                    </div>
                                                    <!-- <div class="yith-wcwl-add-to-wishlist">
																<div class="yith-wcwl-add-button">
																	<a href="#" class="add_to_wishlist">
																		Add to Wishlist
																	</a>
																</div>
															</div> -->
                                                    <div class="clear"></div>
                                                    <div class="shop-loop-quickview">
                                                        <a href="#" data-rel="quickViewModal"><i class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <figcaption>
                                                <div class="shop-loop-product-info">
                                                    <div class="info-title">
                                                        <h3 class="product_title"><a href="#"><?php echo $product->product_name; ?></a></h3>
                                                    </div>
                                                    <div class="info-meta">
                                                        <div class="info-price">
                                                            <span class="price">
                                                                <span class="amount">JD <?php echo $product->price; ?></span>
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

                            <?php
                            } ?>

                        </ul>