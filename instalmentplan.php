     <?php
 

require_once "header.php";

 
$cid=$_SESSION['clientname'];
$interest='';

?>
<html>
<head>


 
 
</head>
<body>
<?php
	$query="SELECT * FROM application where status='approve' and username='$cid' ";
		$result= mysqli_query($link,$query);
       
?>
 



	<div>
	<div class="container" >
		<table class="table">
<thead>
								<tr>
									
									<h3 class="text-center">MY Loan </h3>
									
								</tr>
							</thead>
						 <thead>
							<tr>
							<th class="serial">#</th>
							<th>Application ID</th>
							<th>Name</th>
							<th>Father Name</th>
							
							<th>loan type</th>
							<th>Amount</th>
							<th>Duration</th>
							<th>Total payable</th>
				   			<th>Per Month</th>
							<th></th>
							 </tr
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
		
		
		$months=$row['duration'];
		$payable="";
	 if($months>0){
			if($months>=6){
			$first=$amount*3/100;
			
		}if($months>6){
			$second=$amount*5/100;
			}
			
			$payable=$first+$second+$amount	;
		}
if($months>12){
 if($months>=6){
			$first=$amount*5/100;
			
		}if($months>7){
			$second=$amount*7/100;
			}
			$payable=$first+$second+$amount	;
		}

 if($months>24){
	 if($months>=6){
			$first=$amount*7/100;
			
		}if($months>7){
			$second=$amount*9/100;
			}
			$payable=$first+$second+$amount	;
		}
									
		$permonth=$payable/$months;
?>
						<tr>
							<td class="serial"><?php echo $i++; ?></td>
							<td><?Php echo $id; ?></td>	 
							<td><?Php echo $name;?></td>
							<td><?Php echo $fname?></td>
							<td><?Php echo $categ?></td>
							<td><?Php echo $amount ?></td>
							<td><?Php echo $months; ?>months</td>
							<td><?Php echo $payable?></td>
							<td><?Php echo $permonth; ?></td>
	   
						</tr>
		
						 </tbody>
					  
				   </div>
<?php
							};	
					
					
?>		
		