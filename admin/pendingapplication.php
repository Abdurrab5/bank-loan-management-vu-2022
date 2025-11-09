 <?php
 

require_once "header.php";

 $name="";
$months=0;
$amount=0;
$email="";
?>
<html>
<head>


 
 
</head>
<body>
<?php
 

if(isset($_GET['appid']) && $_GET['appid']!=''){
$cid=$_GET["appid"];
$query="SELECT * FROM application where appid='$cid'   ";
		$result= mysqli_query($link,$query);
		    $row=mysqli_fetch_assoc($result); 
$name=$row["username"];
$months=$row["duration"];
$amount=$row["amount"];
$email=$row["email"];  
		    


$payable=0;
	 if($months>0){
			if($months>=6){
			$first=$amount*3/100;
			
		}if($months>7){
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
	
//$date=date_create("2021-09-25");
$date=new DateTime();
for ($i=1;$i<=$months;$i++){
	
 date_modify($date," +1 month");
$dat=date_format($date,'y-m-d');


$payable=$payable-$permonth;

$payable--;
/* if($payable<$permonth){
	
	$permonth=$payable;
} */



	

 $query="INSERT into loan_schedul (loan_id,username,totalamount, amount,date_due ) VALUES";
    $query.="('$cid','$name','$payable','$permonth','$dat')";
$result= mysqli_query($link, $query);}		
	  if( mysqli_insert_id($link)){
		  $query="UPDATE application SET status='approve' where appid='$cid' ";
			 $result= mysqli_query($link, $query);
			 $to_email = $email;
$subject = "Loan Application";
$body = "Loan Application verify and approved successfully";
$headers = "From: abdurrab5555@gmail.com";
 
if (mail($to_email, $subject, $body, $headers))
 
{
    echo "Email successfully sent to $to_email...";
}
 
else
 
{
   
   echo "Email sending failed!";
}
 
			 
				alert("Application Approve successfuly.");
       
				redirect_to("adminpanel.php");
    }else{
				$msg="course already exist";
        
    }
			
}
	

	$query="SELECT * FROM application WHERE status='pending' ";
   
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
								<th>Email</th>
							   <th>salary</th>
							   <th>loan type</th>
							    <th>Amount</th>
							   <th>duration</th>
				   			  <th>Status</th>
							   <th>Atcion</th>
							 </tr>
			 </thead>
						 <tbody>

						
<?php	
		$i=1;
	while( $row=mysqli_fetch_assoc($result)){
		$id=$row['appid'];
	    $name= $row['username'];
		$fname=$row['father_name']; 
		$email=$row['email']; 
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
	  <td><?Php echo $email; ?></td>
	  <td><?Php echo $sal; ?></td>
	   <td><?Php echo $categ; ?></td>
	    <td><?Php echo $amount; ?></td>
	   <td><?Php echo $months; ?></td>
	   <td><?Php echo $row['status']; ?></td>
	   
	    <td>
				<a href="verify.php?verify=<?php echo $id;?>" class="btn btn-sm btn-warning" role="button">verify</a>
				                   </td> 
					<td>
				<a href="pendingapplication.php?appid=<?php echo $id;?>" class="btn btn-sm btn-success" role="button">Approve</a>
				                   </td> 			   
	   
		
	 
		 
  </tr>
		
							
                            
							  
						 </tbody>
					  
				   </div>
				

   
   
<?php

							};	
?>		</table>
</div>
<?php
			

     
	 
	
	
			
	
	

?>
 			


</body>




</html>