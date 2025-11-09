    <?php
require_once "connection.php";
require_once "functions.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Online Bank Loan Application System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">

 <link rel="stylesheet" href="css/core.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
 <script type="text/javascript" src="bootstrap/font-awesome/js/all.min.js"></script>


<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-fluid" id="header-div">
	<div class="container">
	 
		<h2>Online Bank Loan Application System</h2><a href="logout.php" style="color:white;float:right" ><?php echo $_SESSION['clientname']?><i class="fa fa-power-off"></i></a>
		<div class="btn-group btn-group-sm"> 
		<a href="clientpanel.php" class="btn btn-primary" role="button">Loan plan</a>
		<a href="appstatus.php" class="btn btn-primary" role="button">Status</a>
		<a href="instalmentplan.php" class="btn btn-primary" role="button">Instalment plan</a>
		<a href="submittedinstalment.php" class="btn btn-primary" role="button">Submitted Instalment  </a>
		<a href="remaininginstalment.php" class="btn btn-primary" role="button">Remaining Instalment </a>
		<a href="missinginstalment.php" class="btn btn-primary" role="button">Missing Instalments</a>
		 
		<a href="applyloan.php" class="btn btn-primary" role="button">Apply Loan</a>
		<a href="viewverify.php" class="btn btn-primary" role="button"> Loan verification</a>

	</div>
	</div>
	</div>
