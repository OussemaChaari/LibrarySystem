<?php
include 'functions.php';
session_start();
$book_name = "";
$book_no = "";
$author_id = "";
$cat_id = "";
$book_price = "";
$query = "select * from books where book_no = $_GET[bn]";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $book_name = $row['book_name'];
    $book_no = $row['book_no'];
    $author_id = $row['author_id'];
    $cat_id = $row['cat_id'];
    $book_price = $row['book_price'];
}
$categories = get_all_rows('category');
$authors = get_all_rows('Authors');
if (isset($_POST['update'])) {
    $query = "update books set book_name = '$_POST[book_name]',author_id = $_POST[author],cat_id = $_POST[category],book_price = $_POST[book_price] where book_no = $_GET[bn]";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success_message'] = 'Book updated successfully.';
        header("location:manage_book.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit book</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'headerAdmin.php'; ?>

    <center>
        <h4>Edit Book</h4><br>
    </center>
    <div class="row container-fluid">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="mobile">Book Number:</label>
                    <input type="text" name="book_no" value="<?php echo $book_no; ?>" class="form-control" disabled
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Book Name:</label>
                    <input type="text" name="book_name" value="<?php echo $book_name; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <select name="author" class="form-control" required>
                        <option value="">Select Author</option>
                        <?php foreach ($authors as $author): ?>
                            <option value="<?php echo $author['author_id']; ?>" <?php echo ($author['author_id'] == $author_id) ? 'selected' : ''; ?>>
                                <?php echo $author['author_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['cat_id']; ?>" <?php echo ($category['cat_id'] == $cat_id) ? 'selected' : ''; ?>>
                                <?php echo $category['cat_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mobile">Book Price:</label>
                    <input type="text" name="book_price" value="<?php echo $book_price; ?>" class="form-control"
                        required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Book</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>