<?php
require_once '../../views/connection.php';

$products = $connect->query(
    'SELECT * FROM products JOIN categories ON products.category_id=categories.category_id'
);
$products = $products->fetchAll(PDO::FETCH_ASSOC);
?>


<?php require 'header.php'; ?>
<div class="container-fluid page-body-wrapper">
<?php require 'sidebar.php'; ?>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="uil uil-archive menu-icon"></i>
                </span> Products
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
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Products <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="../control/addProduct.php" class="btn btn-secondary bttn"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>					
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Price</th>						
                        <th>Description</th>			
                        <th>Images</th>						
                        <th>Category</th>					
                        <th>Discount</th>
                        <th>Offers</th>
                        <th>New arrivals</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?php echo $product['product_id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><img src="../../imgs/<?php echo $product[
                            'image1'
                        ]; ?>">
                        <?php if ($product['image2'] != null) { ?>
                            <img src="../../imgs/<?php echo $product[
                                'image2'
                            ]; ?>">
                        <?php } ?>
                        <?php if ($product['image3'] != null) { ?>
                            <img src="../../imgs/<?php echo $product[
                                'image3'
                            ]; ?>">
                        <?php } ?>
                        </td>
                        <td><?php echo $product['category_name']; ?></td>


                        <td><?php echo $product['discount']; ?></td>
                        <td><?php echo $product['offers']?"yes":"No"; ?></td>
                        <td><?php echo $product['new_arrive']?"yes":"No"; ?></td>



                        <td>
                            <a href="../control/editProduct.php?id=<?php echo $product[
                                'product_id'
                            ]; ?>" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>    
                        </td>
                    </tr>
                    <div id="deleteEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Delete Product</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">					
                                        <p>Are you sure you want to delete these Records?</p>
                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <a href="../control/deleteProduct.php?id=<?php
                                        echo $product['product_id'];
                                        $sss = 1;
                                        ?>" title="Delete" data-toggle="tooltip" class="delete btn btn-danger">Delete</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  
</div>


<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_GET['d'])) { ?>
<script>
    swal.fire("Success , You Deleted This Product");
    
</script>
<?php } ?>


<?php require 'footer.php'; ?>
