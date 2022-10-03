<!-- add userimg col in db -->


<?php require_once("connection.php");
 ?> 

 
 <!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
    <style>
 .container{

 }
    </style>
</head>
<body>

<!--  -->
<center>
    <br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="max-width:>
           
     <form action="profile.php" method="POST" enctype='multipart/form-data'>
  <div class="login_form">

 <img src="https://technosmarter.com/assets/userimgs/logo.png" alt="Techno Smarter" class="logo img-fluid"> <br> <?php 
 if(isset($_POST['update_profile'])){
$name=$_POST['name'];
 $address=$_POST['address'];  
 $phone=$_POST['phone']; 
 $folder='userimgs/';
 $new_userimg_name ='profile_'.rand() . '.' . $extension;
  if ($_FILES["userimg"]["size"] >1000000) {
   $error[] = 'Sorry, your userimg is too large. Upload less than 1 MB in size .';
 
}
 if($file != "")
  {
if($extension!= "jpg" && $extension!= "png" && $extension!= "jpeg"
&& $extension!= "gif" && $extension!= "PNG" && $extension!= "JPG" && $extension!= "GIF" && $extension!= "JPEG") {
    
   $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
}

$sql="SELECT * from users where phone='$phone'";
      $res=mysqli_query($dbc,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

   if($oldphone!=$phone){
     if($phone==$row['phone'])
     {
           $error[] ='phone alredy Exists. Create Unique phone';
          } 
   }
}
    if(!isset($error)){ 
          if($file!= "")
          {
            $stmt = mysqli_query($dbc,"SELECT userimg FROM  users WHERE email='$email'");
            $row = mysqli_fetch_array($stmt); 
            $deleteuserimg=$row['userimg'];
unlink($folder.$deleteuserimg);
move_uploaded_file($file, $folder . $new_userimg_name); 
mysqli_query($dbc,"UPDATE users SET userimg='$new_userimg_name' WHERE email='$email'");
          }
           $result = mysqli_query($dbc,"UPDATE users SET name='$name',address='$address',phone='$phone' WHERE email='$email'");
           if($result)
           {
       header("location:account.php?profile_updated=1");
           }
           else 
           {
            $error[]='Something went wrong';
           }

    }


        }    
        if(isset($error)){ 

foreach($error as $error){ 
  echo '<p class="errmsg">'.$error.'</p>'; 
}
}


        ?> 
     <form method="post" enctype='multipart/form-data' action="">
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 
            <center>
            <?php if($userimg==NULL)
                {
                 echo '<img src="https://technosmarter.com/assets/icon/user.png">';
                } else { echo '<img src="userimgs/'.$userimg.'" style="height:80px;width:auto;border-radius:50%;">';}?> 
                <div class="form-group">
                <label>Change Image &#8595;</label>
                <input class="form-control" type="file" name="userimg" style="width:100%;" >
            </div>

  </center>
           </div>
            <div class="col"><p><a href="logout.php"><span style="color:red;">Logout</span> </a></p>
         </div>
          </div>

          <div class="form-group">
          <div class="row"> 
            <div class="col-3">
                <label> Name</label>
            </div>
             <div class="col">
                <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
            </div>
          </div>
      </div>
      <div class="form-group">
 <div class="row"> 
            <div class="col-3">
                <label>address</label>
            </div>
             <div class="col">
                <input type="text" name="address" value="<?php echo $address;?>" class="form-control">
            </div>
          </div>
      </div>
      <div class="form-group">
 <div class="row"> 
            <div class="col-3">
                <label>phone</label>
            </div>
             <div class="col">
                <input type="text" name="phone" value="<?php echo $phone;?>" class="form-control">
            </div>
          </div>
      </div>
<div class="row"> 
            <div class="col-3">
                <label>Email</label>
            </div>
             <div class="col">
                <input type="text" name="Email" value="<?php echo $Email;?>" class="form-control">
            </div>
          </div>
      </div>
      <div class="form-group">

      <div class="row"> 
            <div class="col-3">
                <label>password</label>
            </div>
             <div class="col">
                <input type="text" name="password" value="<?php echo $password;?>" class="form-control">
            </div>
          </div>
      </div>

<div class="row"> 
            <div class="col-3">
                <label>City</label>
            </div>
             <div class="col">
                <input type="text" name="city" value="<?php echo $city;?>" class="form-control">
            </div>
          </div>
      </div>

      <div class="form-group">





           <div class="row">
           
            <div class="col-sm-6">
<button  class="btn btn-success" name="update_profile">Save Profile</button>
            </div>
           </div>
       </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
    <br><br>
</div> 
            </center>



    
