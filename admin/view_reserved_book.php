<?php
include '../connect.php';

session_start();
$book_name = "";
$author = "";
$book_no = "";
$student_name = "";
$query = "select reservation.book_name,reservation.book_number,reservation.reserved_date,reservation.finished_date,users.name from reservation left join users on reservation.student_id = users.id";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Issued Books</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include 'headerAdmin.php'; ?>

	<center>
		<h4>Issued Book's Detail</h4><br>
	</center>
	<div class="row container-fluid">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form>
				<table class="table-bordered" width="900px" style="text-align: center">
					<tr>
						<th>Name</th>
						<th>Number</th>
						<th>Student Name</th>
						<th>Date Reserved</th>
						<th>Date Finished</th>
					</tr>

					<?php
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						?>
						<tr>
							<td>
								<?php echo $row['book_name']; ?>
							</td>
							<td>
								<?php echo $row['book_number']; ?>
							</td>
							<td>
								<?php echo $row['name']; ?>
							</td>
							<td>
								<?php echo $row['reserved_date']; ?>
							</td>
							<td>
								<?php echo $row['finished_date']; ?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>

</html>