
<?php
require_once '../../views/connection.php';

$userID = $_GET['id'];
$user = $connect->query("SELECT * FROM users WHERE user_id='$userID'");
$user = $user->fetch();

try {
    $success = 0;
    if (isset($_POST['updateUser'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $role = $_POST['role'];

        $sql = $connect->query("UPDATE users SET
        first_name='$fname', last_name='$lname' , email='$email' , city = '$city' , phone='$phone' ,address = '$address' , is_admin ='$role' 
        WHERE user_id='$userID'");

        if ($sql) {
            $success = 1;
            header('Refresh: 3; url=../views/users.php');
        }
    }
} catch (Exception $e) {
}
?>

<?php require '../views/header.php'; ?>
<div class="container-fluid page-body-wrapper">
<?php require 'sidebar.php'; ?>

<div class="main-panel">
          <?php if ($success) {
              echo "<div class='alert alert-success' role='alert'>
            Success , You Updated User Information
            </div>";
          } ?>
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
                <h3>Edit User Info</h3>
                <hr>
            <form class="form" method='post'>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="John" name='fname' required
                    value = "<?php echo $user['first_name']; ?>">
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Martin" name='lname' required
                    value = "<?php echo $user['last_name']; ?>">
                    <label for="floatingInput">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="example@gmail.com" name='email'
                    value = "<?php echo $user['email']; ?>" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="0771223322" name='phone'
                    value = "<?php echo $user['phone']; ?>" required>
                    <label for="floatingInput">Phone Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="City" name='city'
                    value = "<?php echo $user['city']; ?>" required>
                    <label for="floatingPassword">City</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Address" name='address'
                    value = "<?php echo $user['address']; ?>" required>
                    <label for="floatingInput">Address</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name='role'>
                    <option <?php $user['is_admin']
                        ? ''
                        : 'selected'; ?> value=0>Member</option>
                    <option <?php $user['is_admin']
                        ? 'seleced'
                        : ''; ?> value=1>Admin</option>
                    </select>
                    <label for="floatingSelect">Role</label>
                </div>
                <div>
                    <input type="submit" class="btn btn-lg btn-outline-primary" value="Update User Info" name='updateUser'>
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
