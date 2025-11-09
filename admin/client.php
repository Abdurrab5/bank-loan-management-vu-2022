     <?php
 

require_once "header.php";

 


?>
<html>
<head>


 
 
</head>
<body>

<?php
	
	
			
			

	if(isset($_POST['delete'])){
	redirect_to("pendingapplication.php");
			
			
}
	
	
	
	$query="SELECT * FROM client ";
   
           $result= mysqli_query($link,$query);
       
?>
 



<div>
				
				<div class="container" >
<table class="table">

						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Client ID</th>
							   <th>Name</th>
							   <th>Username</th>
							    <th>Email</th>
								 <th>Password</th>
								<th>NIC</th>
							  
							   <th>Phone</th>
							   <th>Address</th>
				   			  <th>Gender</th>
							   <th>Edit</th>
							   <th>Delete</>
							 </tr>
			 </thead>
						 <tbody>

						
						<?php	
						$i=1;
							while( $row=mysqli_fetch_assoc($result)){?>
							<tr>
							   <td class="serial"><?php echo $i++; ?></td>
							
	<td><?Php  echo $row['cl_id']; ?></td>
<td><?Php  echo $row['name']; ?></td>	
    <td><?Php  echo $row['username']; ?></td>
     <td><?Php echo $row['email']; ?></td>
	 <td><?Php echo $row['password']; ?></td>
	  <td><?Php echo $row['cnic']; ?></td>
	  
	   <td><?Php echo $row['phone']; ?></td>
	   <td><?Php echo $row['address']; ?></td>
	   <td><?Php echo $row['gender']; ?></td>
	   
	  
		<form method="GET" action="editclient.php">
		
		 <td><button class="btn btn-warning"  value="<?php echo $row['cl_id']?>" type="submit" name="cl_id"> Edit</button></td>
		 <td><button class="btn btn-danger" value="<?php echo $row['cl_id']?>" type="submit" name="delete">delete</button></td>
		</form>
		
  </tr>
		
							
      

                                     
							  
						 </tbody>
					  
				   </div>
				

   
   
<?php
							};	
?>		</table>
</div>


</body>




</html>