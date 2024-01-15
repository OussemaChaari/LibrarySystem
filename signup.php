<?php
include 'connect.php';
$msgSuccess = array();
if (isset($_POST['register'])) {
	$query = "insert into users values('','$_POST[full_name]','$_POST[email]','$_POST[password]',$_POST[mobile_number],'$_POST[adresse]')";
	$query_run = mysqli_query($connection, $query);
	if ($query_run) {
		$msgSuccess[] = "Registration successful.";
	}
}



?>
<!DOCTYPE html>
<html>

<head>
	<title>LMS</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.content-box {
		background-color: whitesmoke;
		margin: 0px auto;
		padding: 30px 10px;
	}
</style>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Library Management System (LMS)</a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"></span>Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Login</a>
				</li>
			</ul>
		</div>
	</nav><br>
	<span>
		<marquee class="text-info">This is library mangement system. Library opens at 8:00 AM and close at 8:00 PM
		</marquee>
	</span><br><br>
	<div class="row container-fluid content-box">
		<div class="col-md-4" id="side_bar">
			<h5 class="text-info">Library Timing</h5>
			<ul>
				<li>Opening: 8:00 AM</li>
				<li>Closing: 8:00 PM</li>
				<li>(Sunday Off)</li>
			</ul>
			<h5 class="text-info">What We provide ?</h5>
			<ul>
				<li>Full furniture</li>
				<li>Free Wi-fi</li>
				<li>News Papers</li>
				<li>Discussion Room</li>
				<li>RO Water</li>
				<li>Peacefull Environment</li>
			</ul>
		</div>
		<div class="col-md-8" id="main_content">
			<center>
				<h3>User Login Form</h3>
			</center>
			<?php include 'messages.php'; ?>
			<form action="" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Full Name:</label>
							<input type="text" name="full_name" class="form-control" required="">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Email ID:</label>
							<input type="email" name="email" class="form-control" required="">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Password:</label>
							<input type="password" name="password" class="form-control" required="">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Mobile Number:</label>
							<input type="number" name="mobile_number" class="form-control" required="">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Adresse:</label>
							<textarea class="form-control" name="adresse" rows="3" cols="40"></textarea>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<button type="submit" name="register" class="btn btn-primary">Register</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</body>

</html>