<?php
include '../connect.php';

session_start();
$name = "";
$email = "";
$mobile = "";
$query = "select * from admins where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
}

if(isset($_POST['update'])){
    $query = "update admins set name = '$_POST[name]',email = '$_POST[email]',mobile = '$_POST[mobile]'";
    $query_run = mysqli_query($connection,$query);
    if ($query_run) {
        $msgSuccess[] = "Update successful.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>edit profile</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php include 'headerAdmin.php'; ?>

    <center>
        <h4>Admin Profile Detail</h4><br>
    </center>
    <div class="row container-fluid">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <?php include '../messages.php'; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>