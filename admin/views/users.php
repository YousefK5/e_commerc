<?php
require_once '../../views/connection.php';

$users = $connect->query('SELECT * FROM users');
$users = $users->fetchAll();
?>


<?php require 'header.php'; ?>
<div class="container-fluid page-body-wrapper">
<?php require 'sidebar.php'; ?>

<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-contacts menu-icon"></i>
                </span> Users
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
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="../control/addUser.php" class="btn btn-secondary bttn"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>					
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Orders</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php
                        echo $user['first_name'] . ' ';
                        echo $user['last_name'];
                        ?></td>
                        <td><?php echo $user[
                            'email'
                        ]; ?></td>                        
                        <td><?php echo $user[
                            'phone'
                        ]; ?></td>                        
                        <td><?php echo $user['city']; ?> , <?php echo $user[
     'address'
 ]; ?></td>
                        <td><?php echo $user['is_admin']
                            ? 'Admin'
                            : 'Memeber'; ?></td>
                        <td>
                            <a href="orders.php?id=<?php echo $user[
                                'user_id'
                            ]; ?>" class="settings" title="View Orders" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                        </td>
                        <td>
                            <a href="../control/editUser.php?id=<?php echo $user[
                                'user_id'
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
                                        <a href="../control/deleteUser.php?id=<?php echo $user[
                                            'user_id'
                                        ]; ?>" title="Delete" data-toggle="tooltip" class="delete btn btn-danger">Delete</a>
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
    swal.fire("Success , You Deleted This User");
    
</script>
<?php } ?>

<?php require 'footer.php'; ?>
