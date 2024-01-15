<?php
include 'functions.php';
session_start();
// $name = "";
// $email = "";
// $mobile = "";
// $query = "select * from admins where email = '$_SESSION[email]'";
// $query_run = mysqli_query($connection, $query);
// while ($row = mysqli_fetch_assoc($query_run)) {
//     $name = $row['name'];
//     $email = $row['email'];
//     $mobile = $row['mobile'];
// }
$categories = get_all_rows('category');
$authors = get_all_rows('Authors');
$msgSuccess = array();
if (isset($_POST['add_book'])) {
    $query = "insert into books values(null,'$_POST[book_name]','$_POST[author]','$_POST[category]',$_POST[book_no],$_POST[book_price])";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $msgSuccess[] = "Book added successfully";

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add New Book</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <center>
        <h4>Add a new Book</h4><br>
    </center>
    <div class="row container-fluid">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php include '../messages.php'; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Book Name:</label>
                    <input type="text" name="book_name" class="form-control" required>
                </div>
                <div class="form-group">
                    
                    <select name="author" class="form-control" required>
                        <option value="">Select Author</option>
                        <?php foreach ($authors as $author): ?>
                            <option value="<?php echo $author['author_id']; ?>">
                                <?php echo $author['author_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="category" class="form-control" required>
                    <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['cat_id']; ?>">
                                <?php echo $category['cat_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mobile">Book Number:</label>
                    <input type="text" name="book_no" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Book Price:</label>
                    <input type="text" name="book_price" class="form-control" required>
                </div>
                <button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>