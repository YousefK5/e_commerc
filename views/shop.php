<?php require_once 'connection.php'; ?>
<?php require 'header.php'; ?>

<!-- //////////////////////////////////////////////////// -->

<!-- banner -->
<div class="heading-container heading-resize heading-button">
    <div class="heading-background heading-parallax bg-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-wrap">
                        <div class="page-title">
                            <h1>Nunc interdum</h1>
                            <span class="subtitle">Women</span>
                            <a class="btn btn-white-outline heading-button-btn" href="#" title="Buy Now">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$catId = 0;
if (isset($_GET['catName'])) {
    $catId = $_GET['catName'];
}
?>


<!-- fillter -->
<?php
if (isset($_POST['filter'])) {
    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];
    $query =
        'SELECT * from `products` where products.price >= ? and products.price <= ? ';
    $query = $connect->prepare($query);
    $query->execute([$min_price, $max_price]);
    $products = $query->fetchAll(PDO::FETCH_OBJ); // print_r($products);
} else {
    $query = 'SELECT * from `products`';
    $query = $connect->prepare($query);
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_OBJ); // print_r($products);
}
$query = 'SELECT * from categories';
$query = $connect->prepare($query);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_OBJ);

// print_r($categories);
?>


<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar-wrap">
                <div class="main-sidebar">
                    <div class="widget shop widget_price_filter">
                        <h4 class="widget-title"><span>Price</span></h4>
                        <!-- <form method="post" action="shop.php">
                            <div class="price_slider_wrapper">
                                <div class="price_slider"></div>
                                <div class="price_slider_amount">
                                    <input type="range" id="min_price" name="min_price" data-min="10" placeholder="Min price" />
                                    <input type="range" id="max_price" name="max_price" data-max="100" placeholder="Max price" />
                                    <button type="submit" name="filter" class="button">Filter</button>
                                    <div class="price_label">
                                        Price: <span class="from"></span> &mdash; <span class="to"></span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form> -->
                        <div>
                            <input type="range" id="minPrice" name="min_price" data-min="0" value="0" placeholder="Min price" />
                            <span id="spanMin">Min Price : 10</span>
                            <input type="range" id="maxPrice" name="max_price" data-max="100" value="100" placeholder="Max price" /> 
                            <span id="spanMax">Max Price : 100</span>       
                        </div>

                    </div>

                    <div class="widget shop widget_products">
                        <h4 class="widget-title"><span>Best Sellers</span></h4>
                        <ul class="product_list_widget">
                        <?php
                        $products = $connect->query(
                            'SELECT * FROM products LIMIT 5'
                        );
                        while (
                            $product = $products->fetch(PDO::FETCH_ASSOC)
                        ) { ?>
                            <li>
                                <a href="./product_page.php?prod_id=<?php echo $product[
                                    'product_id'
                                ]; ?>" title="Donec tincidunt justo">
                                    <img width="100" height="150" src="../imgs/<?php echo $product[
                                        'image1'
                                    ]; ?>" alt="Product-13" />
                                    <span class="product-title"><?php echo $product[
                                        'product_name'
                                    ]; ?></span>
                                </a>
                                <span class="amount"><?php echo $product[
                                    'price'
                                ]; ?> JD</span>
                                <!-- <ins><span class="amount">&#36;19.00</span></ins> -->
                            </li>
                            <?php }
                        ?>
                        </ul>
                    </div>

                </div>
            </div>
            

            <div class="col-md-9 main-wrap" main-wrap class="main-content  " >
                <div data-itemselector=".product.infinite-scroll-item" data-layout="masonry" data-paginate="infinite_scroll" data-masonry-column="4" class="shop products-masonry  infinite-scroll masonry">
                    <div class="masonry-filter">
                        <div class="filter-action filter-action-center">
                            <?php if (isset($_GET['category'])) {
                                $cutCategory = $_GET['category']; ?> 
                            
                            <ul data-filter-key="filter">
                                <li>
                                    <!-- <a class="selected" href="./shop.php" data-filter-value="*">All</a> -->
                                    <a class="filterCat" data-filter-value="*" id='id0'>All</a>
                                </li>
                                <?php foreach ($categories as $categorie) { ?>

                                    <li>
                                        <a class="<?php if (
                                            $cutCategory ==
                                            $categorie->category_id
                                        ) {
                                            echo 'selected ';
                                        } ?>filterCat" id="id<?php echo $categorie->category_id; ?>" data-filter-value=".<?php echo trim(
    $categorie->category_name
); ?>"><?php echo ucfirst($categorie->category_name); ?></a>
                                    </li>
                                    <script>
                                        console.log(document.querySelector(".selected"));
                                        window.onload = function() {
                                            document.querySelector(".selected").click();
                                        }
                                    </script>
                                <?php } ?>

                            </ul>

                            <?php
                            } else {
                                 ?>
                            <ul data-filter-key="filter">
                                <li>
                                    <!-- <a class="selected" href="./shop.php" data-filter-value="*">All</a> -->
                                    <a class="selected filterCat" data-filter-value="*" id='id0'>All</a>
                                </li>
                                <?php foreach ($categories as $categorie) { ?>

                                    <li>
                                        <a class="filterCat" id="id<?php echo $categorie->category_id; ?>" data-filter-value=".<?php echo trim(
    $categorie->category_name
); ?>"><?php echo ucfirst($categorie->category_name); ?></a>
                                    </li>
                                    <script>
                                        console.log(document.querySelector(".selected"));
                                        window.onload = function() {
                                            document.querySelector(".selected").click();
                                        }
                                    </script>
                                <?php } ?>

                            </ul>
                            <?php
                            } ?>
                        </div>
                    </div>



                    <div class="products-masonry-wrap" id="wrapProducts">

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
                                                        <h3 class="product_title"><a href="./product_page.php?prod_id=<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></a></h3>
                                                    </div>
                                                    <div class="info-meta">
                                                        <div class="info-price">
                                                            <span class="price">
                                                                <span class="amount">JD <?php echo $product->price; ?></span>
                                                            </span>
                                                        </div>
                                                        <div class="loop-add-to-cart">
                                                            <a href="./add_to_cart.php?ad=<?php echo $product->product_id; ?>&from=shop">Add To Cart</a>
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
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    document.body.classList.add("shop", "page-layout-left-sidebar");

    let categ=document.getElementsByClassName("filterCat");
    let curCateg=document.querySelector(".selected");
    let curCat = (curCateg.id).slice(2);
    let leftPrice=document.getElementById("minPrice");
    let rightPrice=document.getElementById("maxPrice");
    console.log(curCat);

    [...categ].forEach(element => {
        element.addEventListener('click', function(e) {
            curCat=(element.id).slice(2);
            console.log(curCat);
            console.log(leftPrice.value);
            console.log(rightPrice.value);
            fetch('filterPrice.php', {
            method: 'POST', // or 'PUT'
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded', 
            },
            body: `min=${leftPrice.value}&max=${rightPrice.value}&cat=${curCat}`,
            })
            .then((response) => {
                response.text().then(res=>{
                    console.log(res);
                    document.getElementById("wrapProducts").innerHTML = res;
                });
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        })
    });

    

    leftPrice.addEventListener("input", function() {
        console.log(curCat);
        fetch('filterPrice.php', {
            method: 'POST', // or 'PUT'
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded', 
            },
            body: `min=${leftPrice.value}&max=${rightPrice.value}&cat=${curCat}`,
            })
            .then((response) => {
                response.text().then(res=>{
                    console.log(res);
                    document.getElementById("wrapProducts").innerHTML = res;
                });
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }, false);

    rightPrice.addEventListener("input", function() {
        console.log(curCat);
        fetch('filterPrice.php', {
            method: 'POST', // or 'PUT'
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded', 
            },
            body: `min=${leftPrice.value}&max=${rightPrice.value}&cat=${curCat}`,
            })
            .then((response) => {
                response.text().then(res=>{
                    console.log(res);
                    document.getElementById("wrapProducts").innerHTML = res;
                });
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }, false); 

</script>

<?php require 'footer.php'; ?>
