<?php
	require("functions.php");
    session_start();
    $categories = get_all_rows('category');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Category</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>

		<center><h4>Manage Category</h4><br></center>
		<div class="row container-fluid">
			<div class="col-md-2"></div>
			<div class="col-md-8">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success" role="alert">';
                echo $_SESSION['success_message'];
                echo '</div>';
                unset($_SESSION['success_message']);
            }
            ?>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
                    <tbody>
                    <?php foreach ($categories as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['cat_name']; ?>
                            </td>
                            <td><button class="btn"><a href="edit_cat.php?cid=<?php echo $row['cat_id'];?>">Edit</a></button>
								<button class="btn"><a href="delete_cat.php?cid=<?php echo $row['cat_id'];?>">Delete</a></button></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
					
				</table>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>

