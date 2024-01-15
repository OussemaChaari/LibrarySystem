<?php
require("functions.php");
session_start();
$books = get_all_rows('books');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Book</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <center>
        <h4>Manage Books</h4><br>
    </center>
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
                        <th>Author</th>
                        <th>Category</th>
                        <th>ISBN No.</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['book_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['author_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['cat_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['book_no']; ?>
                            </td>
                            <td>
                                <?php echo $row['book_price']; ?>
                            </td>
                            <td><button class="btn" name=""><a
                                        href="edit_book.php?bn=<?php echo $row['book_no']; ?>">Edit</a></button>
                                <button class="btn"><a
                                        href="delete_book.php?bn=<?php echo $row['book_no']; ?>">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>