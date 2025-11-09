     <?php
 

require_once "header.php";

 $id=$_SESSION['clientname'];


?>
<html>
<head>


 
 
</head>
<body>
<?php
	$query="SELECT * FROM application where  username='$id' ";
   
           $result= mysqli_query($link,$query);
       
?>
 



<div>
				
				<div class="container" >
<table class="table">

						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Application ID</th>
							   <th>Name</th>
							    <th>Father Name</th>
								<th>NIC</th>
							   <th>salary</th>
							   <th>loan type</th>
							   <th>amount</th>
							   <th>duration</th>
				   			  <th>Status</th>
							   <th></th>
							 </tr>
			 </thead>
						 <tbody>

						
						<?php	
						$i=1;
							while( $row=mysqli_fetch_assoc($result)){?>
							<tr>
							   <td class="serial"><?php echo $i++; ?></td>
							
	<td><?Php  echo $row['appid']; ?></td>	 
    <td><?Php  echo $row['username']; ?></td>
     <td><?Php echo $row['father_name']; ?></td>
	  <td><?Php echo $row['cnic']; ?></td>
	  <td><?Php echo $row['salary']; ?></td>
	   <td><?Php echo $row['loan_category']; ?></td>
	    <td><?Php echo $row['amount']; ?></td>
	   <td><?Php echo $row['duration']; ?></td>
	   <td><?Php echo $row['status']; ?></td>
	   
  </tr>
		
							
      

                                     
							  
						 </tbody>
					  
				   </div>
				

   
   
<?php
							};	
?>		</table>
</div>


</body>




</html>