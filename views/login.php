<?php
require_once "connection.php";
session_start();

if (isset($_POST['login'])) {
	$password = $_POST['password'];
	$email = $_POST['email'];
	
    $query = "SELECT * from `users` where email=?";
    $query = $connect->prepare($query);
    $query->execute([$email]);



    $user = $query->fetch(PDO::FETCH_OBJ);
	print_r($user);
	// header("Location: welcome.php");

	if (!empty($user)) {
		if($password==$user->password)
		{echo "<script>swal({ icon: 'success',});</script>";
	$_SESSION['userid']=2;}//$user->user_id;}
		else{	echo "<script>alert('incorrect password ');</script>";}
		// header("Location: index.php");
	} else echo "<script>alert('It looks like you’re used incorrect email try login. Please ');</script>";

}

$_SESSION['userid']=2;

?>

<?php require 'header.php'; ?>

<div style="height: 100px ;"></div>

<div class="heading-container">
	<div class="container heading-standar">
		<div class="page-breadcrumb">
			<ul class="breadcrumb">
				<li><span><a href="#" class="home"><span>Home</span></a></span></li>
				<li><span>login</span></li>
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
						<h2 class="shop-account-heading">Login</h2>

						<form class="login" method="post" action="login.php">
							<p class="form-row form-row-wide">
								<label>Email address <span class="required">*</span></label>
								<input type="text" class="input-text" name="email" value="" />
							</p>
							<p class="form-row form-row-wide">
								<label>Password <span class="required">*</span></label>
								<input class="input-text" type="password" name="password" />
							</p>
							<p class="form-row">

								<input type="submit" class="button" name="login" value="Login" />
							</p>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 

<?php  require 'footer.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


<!-- <script>
	document.body.classList.add("shop-account")
</script> -->