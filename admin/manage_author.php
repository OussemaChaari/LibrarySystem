<?php
	require("functions.php");
	session_start();
    $authors = get_all_rows('Authors');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Author</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>

		<center><h4>Manage Author</h4><br></center>
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
							<th>Author ID</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
                    <tbody>
                    <?php foreach ($authors as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['author_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['author_name']; ?>
                            </td>
                            <td><button class="btn"><a href="edit_author.php?aid=<?php echo $row['author_id'];?>">Edit</a></button>
								<button class="btn"><a href="delete_author.php?aid=<?php echo $row['author_id'];?>">Delete</a></button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
				</table>
			</div>
			<div class="col-md-2"></div>
		</div>
</body>
</html>

