<?php
require_once '../../views/connection.php';

$categories = $connect->query('SELECT * FROM categories');
$categories = $categories->fetchAll();
?>


<?php require 'header.php'; ?>
<div class="container-fluid page-body-wrapper">
<?php require 'sidebar.php'; ?>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </span> Categories
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
                        <h2>Category <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="../control/addCategory.php" class="btn btn-secondary bttn"><i class="material-icons">&#xE147;</i> <span>Add New Category</span></a>					
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Image</th>			
                        <th>Additional information</th>			
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo $category['category_id']; ?></td>
                        <td><?php echo $category['category_name']; ?></td>
                        <td><img src="../../imgs/<?php echo $category['image']; ?>"></td>
                        <td><?php echo $category['extra']; ?></td>
                        <td>
                            <a href="../control/editCategory.php?id=<?php echo $category[
                                'category_id'
                            ]; ?>" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>    
                        </td>
                    </tr>
                    <div id="deleteEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">						
                                        <h4 class="modal-title">Delete Employee</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">					
                                        <p>Are you sure you want to delete these Records?</p>
                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <a href="../control/deleteCategory.php?id=<?php
                                        echo $category['category_id'];
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
    swal.fire("Success , You Deleted This Category");
    
</script>
<?php } ?>


<?php require 'footer.php'; ?>
