
<?php
require_once '../../views/connection.php';

$categoryID = $_GET['id'];
$category = $connect->query(
    "SELECT * FROM categories WHERE category_id='$categoryID'"
);
$category = $category->fetch();

try {
    $success = 0;
    if (isset($_POST['updateCategory'])) {
        $name = $_POST['name'];
        $filename = $_FILES['uploadimg']['name'];
        $tempname = $_FILES['uploadimg']['tmp_name'];
        $folder = '../../imgs/' . $filename;

        $sql = $connect->query("UPDATE categories SET
        category_name='$name' , image='$filename'
        WHERE category_id='$categoryID'");

        if ($sql) {
            move_uploaded_file($tempname, $folder);
            $success = 1;
            header('Refresh: 3; url=../views/categories.php');
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
            Success , You Updated Category
            </div>";
          } ?>
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </span> Category
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
                <h3>Edit Category</h3>
                <hr>
                <form class="form" method='post' enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="John Martin" name='name'
                    value = "<?php echo $category[
                        'category_name'
                    ]; ?>" required>
                    <label for="floatingInput">Name</label>
                </div>
                <label for="floatingInput">Image</label>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingInput" name='uploadimg'
                    value = "C:\Apache24\htdocs\E_Commerce\imgs\<?php echo $category[
                        'image'
                    ]; ?>" required>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="extra" name='extra'
                     value = "<?php echo $category['extra']; ?>" required>
                    <label for="floatingInput">Additional information</label>
                </div>
                <div>
                    <input type="submit" class="btn btn-lg btn-outline-primary" value="Update Category" name='updateCategory'>
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
