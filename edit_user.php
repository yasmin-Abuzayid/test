<?php
session_start();
$server="localhost";
$username="root";
$password="";
$database="3rs";

$con=mysqli_connect($server,$username,$password,$database);

    
    if (isset($_POST['update'])) 
 {
             $name = $_POST['f_name'];
     		$l_name = $_POST['l_name'];
     		$email = $_POST['email'];
     		$password = $_POST['password'];
     		$phone = $_POST['phone'];
     	
     	    $role_type = $_POST['role'];
     		$id = $_POST['id'];
     	

    $sql = "UPDATE `users` SET f_name='$name', l_name ='$l_name', email ='$email', password ='$password',phone='$phone',role_type='$role_type'  WHERE id = '$id' " ;
		
    $result = $con->query($sql);

    if ($result== TRUE)
    {
    	echo "Record update successfully";
    }
    else {

    	echo "Error:" . $sql . "br" .$conn->error ;
    }


 }







  if (isset($_GET['id'])) {
   $id = $_GET['id'] ; 
   $sql = " SELECT * from users  where id = '$id' " ;
   $result = $con->query($sql);
  
   if ($result->num_rows > 0) {
     	while ($row=$result->fetch_assoc()) {
     		$name = $row['f_name'];
     		$l_name = $row['l_name'];
     		$email = $row['email'];
     		$password= $row['password'];
     		$phone = $row['phone'];
     		
     		$role_type= $row['role_type'];
     		$id = $row['id'];
     	} 
     } else {

     	header('location : user.php');
     }
  	
   }


  ?>


<!DOCTYPE html>
<html >
  <head>
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/form.css">

</head>
<body>
    
    
<?php include"sidbar.php"; ?>   
 

    <div class="main-content">
      <header>
        <h2>
          <label for="nav-toggle">
            <span class="fas fa-bars"></span>
          </label>
          Admin
        </h2>

       
        <div class="user-wrapper">
         <img src="data:image/png;base64,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" width="40px" height="40px" alt="profile-img">
         <div class="">
            <h4>Hi <?php echo $_SESSION["name"] ?></h4>
            <small> Admin</small>
         </div>
        </div>
      </header>

      <main>

      <h2>Edit User</h2>

<div class="container">
  <form method="post">
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="f_name" value="<?php echo $name ; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="l_name" value="<?php echo $l_name ; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email" value="<?php echo $email ; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Phone</label>
    </div>
    <div class="col-75">
      <input type="text" id="phone" name="phone"value="<?php echo $phone ; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Password</label>
    </div>
    <div class="col-75">
      <input type="text" id="password" name="password" value="<?php echo $password ; ?>" >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">role_type</label>
    </div>
    <div class="col-75">
      <input type="text" id="role" name="role" value="<?php echo $role_type ; ?>" >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname"> Id</label>
    </div>
    <div class="col-75">
      <input type="text" id="id" name="id" value="<?php echo $id ; ?>">
    </div>
  </div>

  <br>
  <div class="row">
    <input type="submit" name="update" value="update">
  </div>
  </form>
</div>


      </main>
    </div>


</body>
</html>

