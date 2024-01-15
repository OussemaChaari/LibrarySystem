<?php
include 'connect.php';
session_start();
$msgSuccess = array(); // Array to store messages
$msgError = array();
if (isset($_POST['update'])) {
    $old_password = mysqli_real_escape_string($connection, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($connection, $_POST['new_password']);
    $user_id = $_SESSION['id'];
    $query = "SELECT password FROM users WHERE id = '$user_id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
        $password = $row['password'];
        if ($old_password == $password) {
            $update_query = "UPDATE users SET password = '$new_password' WHERE id = '$user_id'";
            $update_query_run = mysqli_query($connection, $update_query);
            if ($update_query_run) {
                $msgSuccess[] = "Update Password successful.";
            }
        } else {
            $msgError[] = "Wrong Password.";
        }
    } 
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Change password</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>

    <center>
        <h4>Change Student Password</h4><br>
    </center>
    <div class="row container-fluid">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php include 'messages.php'; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="password">Enter Password:</label>
                    <input type="password" class="form-control" name="old_password">
                </div>
                <div class="form-group">
                    <label for="New Password">Enter New Password:</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Password</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>