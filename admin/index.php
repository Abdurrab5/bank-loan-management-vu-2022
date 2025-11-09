<?php
require_once "../connection.php";
require_once "../functions.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
 <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  
   <div class="container-fluid" id="header-div">
  <div class="container">
    <h2>Loan Management System</h2>
    <a href="../index.php" class="btn btn-info" role="button">Home</a>
  </div>
  </div>
	<?php
	if(isset($_POST['login'])){
    
    $aid=$_POST['name'];
    $password=$_POST['password'];
      
    $query="SELECT * FROM admin WHERE name='$aid' and password='$password' ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_array($result);
       
        $_SESSION['admin']=$row['name']; 
        alert("You have been logged-in successfuly.");
        //redirecting
        redirect_to("adminpanel.php");
    }else{
        alert("please provide correct login detail: ". mysqli_error($link));
    }
}
?>
	<div>
		<h3 class="container"> Admin Login</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >

    
  <div class="form-group">
    <label for="id">username:</label>
    <input type="text" class="form-control" id="name" name="name" required="">
  </div>
  <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="">
  </div>

  <input type="submit" class="btn btn-default" value="Login" name="login" id="login"/>
  <input type="reset" class="btn btn-default" value="Reset" name="reset" id="reset"/> 

</form>
</div>






</body>
</html>
