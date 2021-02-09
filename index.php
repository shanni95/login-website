<?php 
session_start();
$msg="";
$lmsg="";
if(isset($_POST['submit'])){
	print_r($_POST);
	//die;
	$name=$_POST['name'];
	$email=$_POST['email'];
	$userunm=$_POST['userunm'];
	$password=$_POST['password'];
	$d=date('Y-m-d h:i');
	include('config.php');
	
	$sql = "INSERT INTO `user` (`name`, `email`, `usernname`, `password`, `d`) VALUES ('$name','$email','$userunm','$password','$d')";

	if( mysqli_query ( $conn, $sql) ){
		$msg="Create Account Successfully...";
	}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

if(isset($_POST['login'])){
	
	$lemail=$_POST['lemail'];
	$lpassword=$_POST['lpassword'];
	include('config.php');
	$sql = "SELECT * FROM user where  `email` = '$lemail' AND `password` = '$lpassword'";
	
	$result = mysqli_query($conn , $sql);
	$rows=mysqli_fetch_assoc($result);
	$id=$rows['id'];
	
 	$num = mysqli_num_rows($result);
	if($num==1){
		$_SESSION['userid']=$rows['id'];
		
		header('Location: home.php');
	}else{
		echo "Invalid Email Or Password";
		header('Location: index.php');
	} 
}

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
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="myctn frm ">
					<form action="" method="post">
						<h1 class="text-center">SIGN UP</h1>
						<strong class="text-center"> <?php echo $msg; ?> </strong>
						<div class="form-group">
							<input type="text" class="form-control required" id="name" name="name" placeholder="Your Name">
						</div>
						<div class="form-group">
							<input type="email" class="form-control required email" id="email" name="email" placeholder="Email Id">
						</div>
						<div class="form-group">
							<input type="text" class="form-control required digits" id="userunm" name="userunm" placeholder="User Name">
						</div>
						<div class="form-group">
							<input type="password" class="form-control required" id="password" name="password" placeholder="Choose Password">
						</div>
					 
						<input type="submit" class="btn btn-primary btn-md" name="submit" value="SIGN UP">
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<p class="text-center"></p>
				<div class="myctn">
					<form action="" method="post">
						<h1 class="text-center">LOGIN HERE</h1>
						<div class="form-group">
							<input type="email" placeholder="Your Email" class="form-control required email" name="lemail" id="lemail">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control required" name="lpassword" id="lpassword">
						</div>
						
						<input type="submit" class="btn btn-primary" name="login" id="btn1" value="LOGIN">
					</form>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<script src="js/jquery.1.12.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validate/jquery.validate.js"></script>
	<script>
		$(document).ready( function() {
			
			$("#regForm").validate();
			
		});
		$(document).ready( function() {
			
			$("#logForm").validate();
			
		});
	</script>
</body>
</html>