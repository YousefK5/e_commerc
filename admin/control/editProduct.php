
<?php
require_once '../../views/connection.php';

$productID = $_GET['id'];
$product = $connect->query(
    "SELECT * FROM products WHERE product_id='$productID'"
);
$product = $product->fetch();

$categories = $connect->query('SELECT * FROM categories');
$categories = $categories->fetchAll();

try {
    $success = 0;
    if (isset($_POST['updateProduct'])) {
        $name = $_POST['name'];
        $filename1 = $_FILES['uploadimg1']['name']
            ? $_FILES['uploadimg1']['name']
            : null;
        $tempname1 = $_FILES['uploadimg1']['tmp_name'];
        $filename2 = $_FILES['uploadimg2']['name']
            ? $_FILES['uploadimg2']['name']
            : null;
        $tempname2 = $_FILES['uploadimg2']['tmp_name']
            ? $_FILES['uploadimg2']['tmp_name']
            : null;
        $filename3 = $_FILES['uploadimg3']['name']
            ? $_FILES['uploadimg3']['name']
            : null;
        $tempname3 = $_FILES['uploadimg3']['tmp_name']
            ? $_FILES['uploadimg3']['tmp_name']
            : null;
        $folder1 = '../../imgs/' . $filename1;
        $folder2 = '../../imgs/' . $filename2;
        $folder3 = '../../imgs/' . $filename3;

        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $category = $_POST['category'];
        $discount = $_POST['discount'];
        $offer = $_POST['offer']?1:0;
        $newarrive = $_POST['newarrival']?1:0;

        if ($filename1 != null) {
            $sql = $connect->query("UPDATE products SET
            image1='$filename1'
            WHERE product_id='$productID'");
        }

        if ($filename2 != null) {
            $sql = $connect->query("UPDATE products SET
            image2='$filename2'
            WHERE product_id='$productID'");
        }

        if ($filename3 != null) {
            $sql = $connect->query("UPDATE products SET
            image3='$filename3'
            WHERE product_id='$productID'");
        }

        $sql = $connect->query("UPDATE products SET
        product_name='$name' , price='$price' , description='$desc' , category_id='$category', discount='$discount' , offers='$offer' , new_arrive='$newarrive'
        WHERE product_id='$productID'");

        if ($sql) {
            if ($filename1 != null) {
                move_uploaded_file($tempname1, $folder1);
            }
            if ($filename2 != null) {
                move_uploaded_file($tempname2, $folder2);
            }
            if ($filename3 != null) {
                move_uploaded_file($tempname3, $folder3);
            }
            $success = 1;
            header('Refresh: 3; url=../views/products.php');
        }
    }
} catch (Exception $e) {
    $e->getMessage();
}
?>

<?php require '../views/header.php'; ?>
<div class="container-fluid page-body-wrapper">
<?php require 'sidebar.php'; ?>

<div class="main-panel">
          <?php if ($success) {
              echo "<div class='alert alert-success' role='alert'>
            Success , The Product Is Updated.
            </div>";
          } ?>
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="uil uil-archive menu-icon"></i>
                </span> Product
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="container-xl">
                <h3>Edit Product</h3>
                <hr>
                <form class="form" method='post' enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Mastressess" name='name' 
                    value="<?php echo $product['product_name']; ?>" required>
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="50$" name='price'
                    value="<?php echo $product['price']; ?>" required>
                    <label for="floatingInput">Price</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Write Description About Product Here"
                    name="desc" id="floatingTextarea2" style="height: 100px"
                    value="<?php echo $product['description']; ?>" required><?php echo $product['description']; ?></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                <label for="floatingInput">Image 1</label>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" name='uploadimg1'>
                </div>
                <label for="floatingInput">Image 2</label>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" name='uploadimg2'>
                </div>
                <label for="floatingInput">Image 3</label>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" name='uploadimg3'>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name='category'>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category[
                            'category_id'
                        ]; ?>" <?php if (
    $category['category_id'] == $product['category_id']
) {
    echo 'selected';
} ?>><?php echo $category['category_name']; ?></option>
                    <?php } ?>
                    </select>
                    <label for="floatingSelect">Category Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="0-100%" name='discount'
                    value="<?php echo $product['discount']; ?>" required>
                    <label for="floatingInput">discount %</label>
                </div>

                <div class="form-floating mb-3">
                        <!-- <label for="offer">On offer</label> -->
                        <input type="checkbox" id="offer" name="offer" <?php echo $product['offers']?"checked":"" ?>>On offer<br>
                        <!-- <label for="newarrival">New arrival</label> -->
                        <input type="checkbox" id="newarrival" name="newarrival" <?php echo $product['new_arrive']?"checked":"" ?>>New arrival
                        
                    
                </div>

                <div>
                    <input type="submit" class="btn btn-lg btn-outline-primary" value="Update Product" name='updateProduct'>
                </div>
</form>
</div>  
</div>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

<?php require '../views/footer.php'; ?>
