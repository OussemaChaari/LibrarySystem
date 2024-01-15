<?php
include 'functions.php';
session_start();
	// $name = "";
	// $email = "";
	// $mobile = "";
	// $query = "select * from admins where email = '$_SESSION[email]'";
	// $query_run = mysqli_query($connection,$query);
	// while ($row = mysqli_fetch_assoc($query_run)){
	// 	$name = $row['name'];
	// 	$email = $row['email'];
	// 	$mobile = $row['mobile'];
	// }
    $msgSuccess = array();
    if(isset($_POST['add_cat']))
	{
		$query = "insert into category values('','$_POST[cat_name]')";
		$query_run = mysqli_query($connection,$query);
        if ($query_run) {
            $msgSuccess[] = "Category added successfully";
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Category</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>

		<center><h4>Add a new Category</h4><br></center>
		<div class="row container-fluid">
			<div class="col-md-4"></div>
			<div class="col-md-4">
            <?php include '../messages.php'; ?>
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Category Name:</label>
						<input type="text" class="form-control" name="cat_name" required>
					</div>
					<button type="submit" name="add_cat" class="btn btn-primary">Add Catogry</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>

