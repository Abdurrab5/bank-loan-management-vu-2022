     <?php
 

require_once "header.php";
 
if(isset($_GET['pid']) && $_GET['pid']!=''){
$payid=$_GET["pid"];
$name=$_GET["username"];
$amount=$_GET["amount"];
$penalty=0;
$total_amount=0;
$remain_amount=$_GET["remain_amount"];						
	$todate=$_GET["today"];					
		$query="INSERT into payment (installment_no,username,amount_pay,penalty,amount_w_penalty, remain_amount,datecreated ) VALUES";
    $query.="('$payid','$name','$amount','$penalty','$total_amount','$remain_amount','$todate')";
$result= mysqli_query($link, $query);
		$query="DELETE FROM loan_schedul WHERE sh_id='$payid'";
$result= mysqli_query($link, $query);}
 


?>
<html>
<head>


 
 
</head>
<body>
<?php
	$query="SELECT * FROM loan_schedul  ";
		$result= mysqli_query($link,$query);
       
?>
 



	<div>
	<div class="container" >
		<table class="table">
						<thead>
						<tr>
					<h3 class="text-center">Missing installments </h3>
									
								</tr>
							</thead>
						 <thead>
							<tr>
							<th class="serial">#</th>
							<th>Installment No</th>
							<th> Client Name</th>
							<th>Amount</th>
							<th>Penalty</th>
							<th>Total Payable Amount</th>
							 <th>Remaining Amount</th>
							<th>Due on</th>
							
							 </tr>
						</thead>
												

						<tbody>
<?php	
		$i=1;
	while( $row=mysqli_fetch_assoc($result)){
		$id=$row['sh_id'];
		$name= $row['username'];
		$amount=$row['amount']; 
		$tamount=$row['totalamount']; 
		$date=$row['date_due'];
		
		
		
?>
					 
							
		<?php
				$duedate = new DateTime($row["date_due"]);
				$today   = new DateTime('now');

				if ($duedate < $today) {
	 	
					$penalty =$amount*3/100;
					$total=$penalty+$amount;
			?>
						<tr>
							<td class="serial"><?php echo $i++; ?></td>
							<td><?Php echo $id; ?></td>	 
							<td><?Php echo $name;?></td>
							<td><?Php echo $amount ;?></td>
							<td><?Php echo $penalty ;?></td>
							<td><?Php echo $total ;?></td>
							<td><?Php echo $tamount ;?></td>
							<td><?Php echo $date;?></td>				
						<form method="GET">
							<input type="hidden" value="<?Php echo $name;?>" name="username">
							<input type="hidden" value="<?Php echo $amount; ?>" name="amount">
							<input type="hidden" value="<?Php echo $penalty; ?>" name="penalty">
							<input type="hidden" value="<?Php echo $total; ?>" name="total_amount">
							<input type="hidden" value="<?Php echo $tamount; ?>" name="remain_amount">
							<input type="hidden" value="<?Php echo $date; ?>" name="today">
							<td><button class="btn btn-primary" name="pid" value="<?Php echo $id; ?>">Pay</button></td>
						</form>
						</tr>
						</tbody>
						<?Php	
						}
						
						};?> 
						
	   
		</table>
					</div>
				</div>
			
</body>
</html>