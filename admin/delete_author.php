<?php
	require("functions.php");

	$query = "delete from authors where author_id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
    if($query_run){
        header("location:manage_author.php");
    }
?>
