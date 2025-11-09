     <?php
 

require_once "header.php";

 


?>
<html>
<head>


 
 
</head>
<body>
<?php
	$query="SELECT * FROM application where status='approve' ";
   
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
							    <th>Amount</th>
							   <th>duration</th>
				   			  <th>Status</th>
							   <th></th>
							 </tr>
			 </thead>
						 <tbody>

						
						<?php	
						$i=1;
							while( $row=mysqli_fetch_assoc($result)){
								$id=$row['appid'];
		$name= $row['username'];
		$fname=$row['father_name']; 
		$categ=$row['loan_category'];
		$amount=$row['amount'];
		$cnic= $row['cnic']; 
		$sal=$row['salary'];
		$months=$row['duration'];
		
		?>
							<tr>
							   <td class="serial"><?php echo $i++; ?></td>
							
	<td><?Php  echo $id; ?></td>	 
    <td><?Php echo $name; ?></td>
     <td><?Php echo $fname; ?></td>
	  <td><?Php echo $cnic; ?></td>
	  <td><?Php echo $sal; ?></td>
	   <td><?Php echo $categ; ?></td>
	    <td><?Php echo $amount; ?></td>
	   <td><?Php echo $months; ?></td>
	   <td><?Php echo $row['status']; ?></td>
	    <form method="get">
		<input type="hidden" value=" $row['username'];" name="username">
		<input type="hidden" value="$row['amount'];" name="amount">
		<input type="hidden" value="$row['duration'];" name="months">
		
 
	    </form>
  </tr>
		
							
      

                                     
							  
						 </tbody>
					  
				   </div>
				

   
   
<?php

}
			 				






?>		</table>
</div>


</body>




</html>