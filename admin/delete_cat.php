<?php
require("functions.php");
$query = "delete from category where cat_id = $_GET[cid]";
$query_run = mysqli_query($connection, $query);
if($query_run){
    header("location:manage_cat.php");
}
?>