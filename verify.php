<?php
require_once "header.php";
 
  $applicationid="";
 $username="";
 $cnic="";
$email="";
$verifyid="";				 
$requir="";			 
if(isset($_GET['update']) && $_GET['update']!=''){
$verifyid=$_GET["update"];
$query="SELECT * FROM verify where verify_id='$verifyid'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   $applicationid=$row['applicationid'];
			  $username=$row['username'];
			   
			   $email=$row['email'];
			   $requir=$row['requir'];
		   }
}
	    
			 
         


?>
 <body>
 
    


<?php
 

   




            $msg='';
	  if(isset($_POST['submit'])){
              if($_FILES['myfile']['name']!=''){
			 $myfile=rand(111111111,999999999).'_'.$_FILES['myfile']['name'];
				move_uploaded_file($_FILES['myfile']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$myfile);
   $query="update verify set upload='$myfile',status=1  where verify_id='$verifyid'";
    
 $result= mysqli_query($link, $query);
 alert("verification add successfuly.");
 redirect_to("viewverify.php");
			  }else{
				 $msg= 'error not upload';
			  }
			 
	  }
	 
?>


	<div class="container">
			
	</div>
	<div class="container" id="form"  >
	<h3  > Verify requested User</h3>
	      <form action="" method="POST" enctype="multipart/form-data">
  
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
    <input type="text" class="form-control" id="requir" name="requir"  value="<?php echo $requir?>" required=""  readonly >
 
	</div>
	 	 
  <div class="form-group">
			<label for="name">Documents Upload:</label>
    <input type="file" class="form-control" id="myfile" name="myfile"    required=""    >
 
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
