<?php 
	include('config.php');
	session_start();
	$sess_id=$_SESSION['userid'];
	
	$sql = "SELECT * FROM user where `id`='$sess_id'";
	$result=mysqli_query($conn ,$sql);
	$rows = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="js/validate/jquery.validate.css">
    <title>Registration</title>
</head>
<body>
	<nav class="navbar navbar-default" id="mynav">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Deepshan</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <div class="navbar-form navbar-left">
			
		  </div>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#">Hi <?php echo $rows['name']; ?></a></li>
			<li><a href="index.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row">
		<table class="table table-striped table-bordered">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th> Date Time</th>
			</tr>
			<tr>
				<td> <?php echo $rows['id']; ?> </td>
				<td> <?php echo $rows['name']; ?> </td>
				<td> <?php echo $rows['email']; ?> </td>
				<td> <?php echo $rows['password']; ?> </td>
				<td> <?php echo $rows['d']; ?> </td>
				
			</tr>
		</table>
		</div>
	</div>
	
	
	
	<script src="js/jquery.1.12.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validate/jquery.validate.js"></script>
	
</body>
</html>