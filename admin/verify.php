<?php
require_once "header.php";
 
  
 $username="";
 $cnic="";
$email="";
$applicationid="";				 
			 
if(isset($_GET['verify']) && $_GET['verify']!=''){
$applicationid=$_GET["verify"];
$query="SELECT * FROM application where appid='$applicationid'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			  $username=$row['username'];
			  $cnic=$row['cnic'];
			   $email=$row['email'];
		   }
}
	    
			 
         


?>
 <body>
 
    


<?php
            $msg='';
	  if(isset($_POST['submit'])){
              
			  $applicationid=$_POST['applicationid'];
			  $username=$_POST['username'];
			  
			  $email=$_POST['email'];
			  $requir=$_POST['requir'];
			 // lvdbhtqaufitnyni
$to_email = $email;
$subject = "Your Loan Verification";
$body = $requir;
$headers = "From: abdurrab5555@gmail.com";
 
if (mail($to_email, $subject, $body, $headers))
 
{
    echo "Email successfully sent to $to_email...";
}
 
else
 
{
   
   echo "Email sending failed!";
}
 
 
	  
			$query="INSERT into verify(applicationid,username,email,requir,upload,status) VALUES";
			$query.="('$applicationid','$username','$email','$requir','',0)";
			$result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
				alert("verification add successfuly.");
       
				redirect_to("viewverify.php");
    }else{
				$msg="course already exist";
        
    }
}
	 
?>


	<div class="container">
			
	</div>
	<div class="container" id="form">
	<h3  > Verify requested User</h3>
	      <form action="" method="POST" >
  
    <div class="form-group">
           <label for="name">Application Id:</label>
    <input type="text" class="form-control" id="applicationid" name="applicationid" value="<?php echo $applicationid;?>" required="" Placeholder="course_name:" >
    </div>
	 
	 <div class="form-group">
    <label for=" name">Name:</label>
    <input type="text" class="form-control" value="<?php echo $username?>" name="username"  readonly>
  </div>
  
   <div class="form-group">
     <label for="name">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" required=""   readonly>
  </div>
	
	 
	  
	 
  <div class="form-group">
			<label for="name">Requiements:</label>
    <input type="text" class="form-control" id="requir" name="requir"  required="" Placeholder="requirments:" >
 
	</div>
	 
   <div class="form-group">
  <input type="submit" class="btn btn-success" value="Save" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
