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
	$query="SELECT * FROM payment where username='$cid' ";
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
							<th>payment id</th>
							<th>Installment No</th>
							<th> Client Name</th>
							<th>Amount Paid</th>
							<th>Remaining Amount</th>
							<th>Paid on</th>
							 </tr>
						</thead>
												

						<tbody>
<?php	
		$i=1;
	while( $row=mysqli_fetch_assoc($result)){
		$id=$row['pay_id'];
		$instal= $row['installment_no'];
		$username=$row['username']; 
		$amount_pay=$row['amount_pay'];
		$remain_amount=$row['remain_amount'];
		$date=$row['datecreated'];
		
?>
					 
							
		<?php
	 	
  
		?>
		<tr>
							<td class="serial"><?php echo $i++; ?></td>
							<td><?Php echo $id; ?></td>	 
							<td><?Php echo $instal;?></td>
							<td><?Php echo $username ;?></td>
							<td><?Php echo $amount_pay;?></td>	
							<td><?Php echo $remain_amount ;?></td>
							<td><?Php echo $date;?></td>				
							
							</tr></tbody><?Php	}?> 
						
	   
						</tbody>
		
						 
					  
				   </div>
<?php
							
						
					
?>		
		