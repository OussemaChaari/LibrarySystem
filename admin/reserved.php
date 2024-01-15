<?php
include 'functions.php';
session_start();
$users = get_all_rows('users');
$msgSuccess = array();
if (isset($_POST['reserved_book'])) {
    $bookName = mysqli_real_escape_string($connection, $_POST['book_name']);
    $bookNo = mysqli_real_escape_string($connection, $_POST['book_no']);
    $studentId = mysqli_real_escape_string($connection, $_POST['student_id']);
    $reservedDate = date("Y-m-d", strtotime($_POST['reserved_date']));
    $finishedDate = date("Y-m-d", strtotime($_POST['finished_date']));
    $query = "INSERT INTO reservation (book_name, book_number, student_id, reserved_date, finished_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssiss", $bookName, $bookNo, $studentId, $reservedDate, $finishedDate);
    $query_run = mysqli_stmt_execute($stmt);
    if ($query_run) {
        $msgSuccess[] = "Book reserved successfully!";
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Reserved a Book</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include 'navbar.php'; ?>
    <center>
        <h4>Reserved a Book</h4><br>
    </center>
    <div class="row container-fluid">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php include '../messages.php'; ?>
            <form action="" method="post">
                <div class="form-group">
                    <select class="form-control" name="book_name">
                        <option>-Select book name-</option>
                        <?php
                        $query = "select book_name from books";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                            <option>
                                <?php echo $row['book_name']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="book_no">
                        <option>-Select book number-</option>
                        <?php
                        $query = "select book_no from books";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                            <option>
                                <?php echo $row['book_no']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="student_id" class="form-control" required>
                        <option value="">Select students</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['id']; ?>">
                                <?php echo $user['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" id="datepicker_reserved" name="reserved_date" class="form-control"
                        placeholder="reserved Date" required />

                </div>
                <div class="form-group">
                    <input type="text" id="datepicker_finished" name="finished_date" class="form-control"
                        placeholder="finished Date" required />
                </div>
                <button type="submit" name="reserved_book" class="btn btn-primary">Reserved</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script>
        $(document).ready(function () {
            $('#datepicker_reserved').datepicker({
                uiLibrary: 'bootstrap4',
            });

            $('#datepicker_finished').datepicker({
                uiLibrary: 'bootstrap4',
            });
        });
    </script>
</body>

</html>