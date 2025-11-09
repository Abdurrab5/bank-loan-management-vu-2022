<?php
require_once "header.php";
 
  $user=$_SESSION['clientname'];
 $username="";
 $cnic="";
$email="";
$applicationid="";				 
?>
<div class="container-fluid" >
<div class="container" >
<div>
<div>	
          

          <table class="table" id="table">
                    <thead>
					       <tr>
					       </tr>
					</thead>
					 <thead>
							<tr>
							 	<th>Sno</th>
							<th>Verify Id</th>
							<th>Application Id</th>
							<th>User name</th>
							<th>Email</th>
							<th>Requirments</th>
							<th>Documents</th>
							<th>Status</th>
							<th>Action</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql ="Select * from verify where username='$user'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		       $id=$row['verify_id'];
	           
			  $applicationid=$row['applicationid'];
			  $username=$row['username'];
			  
			  $email=$row['email'];
			  $requir=$row['requir'];
		       $upload=$row['upload'];
			  $status=$row['status'];
                                    

   ?>
	

                                 <tr>
							       <td><?Php echo $i++;?></td>	
							       <td><?Php echo $id; ?></td>	 
							       <td><?Php echo $applicationid;?></td>
								    <td><?Php echo $username;?></td>
								    <td><?Php echo $email;?></td>
									<td><?Php echo $requir;?></td>
							       <td><?Php echo  $upload ;?></td>
							        <td><?Php echo $status; ?></td>	 
							          <td>
				<a href="verify.php?update=<?php echo $id;?>" class="btn btn-sm btn-warning" role="button">verify</a>
				                   </td> 
					<td>
							  
		                           </tr>
					</tbody>
	<?php
	}
	?>
	</div>
	</div>
	</div></div></div></div></div></div>
</body>
</html>