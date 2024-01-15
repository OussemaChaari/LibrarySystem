<?php
	include 'functions.php';
    session_start();
    $cat_id = "";
	$cat_name = "";
	$query = "select * from category where cat_id = $_GET[cid]";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$cat_name = $row['cat_name'];
		$cat_id = $row['cat_id'];
	}
    if(isset($_POST['update_cat'])){
		$query = "update category set cat_name = '$_POST[cat_name]' where cat_id = $_GET[cid]";
		$query_run = mysqli_query($connection,$query);
		if ($query_run) {
            $_SESSION['success_message'] = 'Category updated successfully.';
            header("location:manage_cat.php");
            exit();
        }
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit category</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'headerAdmin.php'; ?>

		<center><h4>Edit Book</h4><br></center>
		<div class="row container-fluid">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="post">
					<div class="form-group">
						<label for="name">Category Name:</label>
						<input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>" required>
					</div>
					<button type="submit" name="update_cat" class="btn btn-primary">Update Catogry</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>
