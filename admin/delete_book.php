<?php
require("functions.php");
$query = "delete from books where book_no = $_GET[bn]";
$query_run = mysqli_query($connection, $query);
?>