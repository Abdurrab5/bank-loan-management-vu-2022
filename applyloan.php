        <?php
require_once "connection.php";
require_once "header.php";
require_once "functions.php";



 $id=$_SESSION['clientname'];
  
 $username="";
 $cnic="";
$email="";

		    $query="SELECT * FROM client where username='$id'  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $username=$row['username'];
			  $cnic=$row['cnic'];
			   $email=$row['email'];
		   }
?>
<html>
<head>
<title></title>

 
 
</head>
<body>

	<?php
	 
	 
	$msg='';
	if(isset($_POST['submit'])){
	  $amount="";
    $username=$_POST['username'];
    $father_name=$_POST['father_name'];
	$cnic=$_POST['cnic'];
	$email=$_POST['email'];
	$salary=$_POST['salary'];
    $loan_category=$_POST['loan_category'];
	
		    $query="SELECT * FROM loan_type where loan_type_name='$loan_category'  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  
			  
			   $amount=$row['loan_size'];
		   }
	 
	$duration=$_POST['duration'];
   
    $query="INSERT into application ( username,father_name,cnic,email, salary,loan_category ,amount,duration, status) VALUES";
    $query.="( '$username','$father_name','$cnic','$email','$salary','$loan_category','$amount','$duration', 'pending')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("Request send successfuly.");
       
        redirect_to("clientpanel.php");
    }else{
			$msg="customer already exist";
        
    }
}                                                                              
 ?>
  

 <div class="container bg-light" >
		<h3 > Client Loan Application</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >
	 
  <div class="form-group">
    <label for=" name">Name:</label>
    <input type="text" class="form-control" value="<?php echo $username?>" name="username"  readonly>
  </div>
 <div class="form-group">
     <label for="name">father Name:</label>
    <input type="text" class="form-control" id="father_name" name="father_name" required="" Placeholder="father_name:" >
  </div>
   <div class="form-group">
     <label for="name">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" required=""   readonly>
  </div>
  <?php 
 
		                                              
   ?>
   <div class="form-group">
    <label for="name">NIC</label>
		   <input type="text" class="form-control" id="cnic" name="cnic" value="<?php echo $cnic;?>" readonly>
  </div> 
   <div class="form-group">
    <label for="name">salary:</label>
    <input type="text" class="form-control" id="salary" name="salary" required="" Placeholder="Enter salary  :">
  </div> 
  <div class="form-group">
  <div ><label for="loan_category:">loan category:</label>
<select  class="text-dark" name="loan_category">
<?php
  
		    $query="SELECT * FROM loan_type  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $loan_type_name=$row['loan_type_name'];
			  
			   $loan_size=$row['loan_size'];
			  
			  
			  

?>
<option value='<?php echo  $loan_type_name;  ?>'><?php echo  $loan_type_name ;  ?></option>
		
   
  <?php

		   }
?>
</select></div>
</div> 
 
 
  
  <div class="form-group">
 
<label for="duration:">Duration:</label>
<select  class="text-dark" name="duration">
<?php
 $query="SELECT * FROM loan_tenor  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $month=$row['month'];

?>
  <option value='<?php echo $row['month'];  ?>'><?php if( $row['month']=="6"){
  echo '6 Months';}elseif($row['month']=="12"){
	   echo '1 year';
  }elseif($row['month']=="24"){
	   echo '2 years';
  }
	  ;  ?></option>
  <?php

		   }
?>
</select> 
   </div> 
  <div class="form-group">
  
  <input type="submit" class="btn btn-default" value="Click to Apply" name="submit" id="submit"/>
  <input type="reset" class="btn btn-default" value="Reset" name="reset" id="reset"/>
   <div class="field_error text-danger"><?php echo $msg?></div>
</div>
</form>
</div>
 
</body>




</html>
