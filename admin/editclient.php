<?php
require_once "header.php";


if(isset($_GET['cl_id']) && $_GET['cl_id']!=''){
$cid=$_GET["cl_id"];
$query="SELECT * FROM client WHERE cl_id='$cid' ";
   
           $result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $cid=$row['cl_id'];
				$name=$row['name'];
				$username=$row['username'];
				$email=$row['email'];
				$password=$row['password'];
				$cnic=$row['cnic'];
				$phone=$row['phone'];
				$address=$row['address'];
				$gender=$row['gender'];
			   
		   }
}

if(isset($_GET['delete']) && $_GET['delete']!=''){
$cid=$_GET["delete"];
$query="delete FROM client WHERE cl_id='$cid' ";
 $result= mysqli_query($link, $query);
       
        redirect_to("client.php");
}
?>
<html>

<body>

	<?php
	$msg='';
	
	if(isset($_POST['submit'])){
		
    $name=$_POST['name'];
    $username=$_POST['username'];
	$email=$_POST['email'];
    $password=$_POST['password'];
	$cnic=$_POST['cnic'];
    $phone=$_POST['phone']; 
    $address=$_POST['address']; 	
    $gender=$_POST['gender'];
   
    $query="update client set name='$name',username='$username', email='$email',password='$password' , cnic='$cnic',   phone='$phone',address='$address',gender='$gender' where cl_id='$cid'";
    $result= mysqli_query($link, $query);
   
     alert("update successfuly.");
       
        redirect_to("client.php");
    }

?>
 <div class="container   ">

  <div class="">
		<h3>Update Form</h3>
	</div>
	<div class="container bg-dark text-white" id="form">
	<form action="" method="POST" >
  <div class="form-group">
    <label for="fname">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>" required="" Placeholder="">
  </div>
 <div class="form-group">
    <label for="name">User Name:</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>" required="" Placeholder="" >
  </div>
   <div class="form-group">
    <label for="name">e-Mail:</label>
    <input type="email" class="form-control" id="email" name="email" required="" value="<?php echo $email;?>" Placeholder="">
  </div> 
    <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="" value="<?php echo $password;?>" Placeholder="">
  </div>
  
    
  <div class="form-group">
    <label for="username">cnic:</label>
    <input type="text" class="form-control" id="cnic" name="cnic" required="" value="<?php echo $cnic;?>"  >
  </div>
 
  <div class="form-group">
    <label for="phone">phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" required="" value="<?php echo $phone;?>" >
  </div>
  <div class="form-group">
    <label for="name">address:</label>
    <input type="text" class="form-control" id="address" name="address" required="" value="<?php echo $address;?>" >
  </div>
  <div class="form-group">
    <label for="name">Gender:</label>
    <input type="text" class="form-control" id="gender" name="gender" required="" value="<?php echo $gender;?>" Placeholder="">
  </div>
  <div class="form-group">
   
  </div>
  <input type="submit" class="btn btn-default" value="Click to Update" name="submit" id="submit"/>
  <input type="reset" class="btn btn-default" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
</div>

</body>




</html>
