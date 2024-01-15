<?php
include 'functions.php';
session_start();
$authors = get_all_rows('Authors');
$author_name = "";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Reg Authors</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php include 'headerAdmin.php'; ?>

    <center>
        <h4>Registered Authors</h4><br>
    </center>
    <div class="row container-fluid">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table-bordered" width="900px" style="text-align: center">
                <tr>
                    <th>Author Name</th>
                </tr>
                <?php foreach ($authors as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row['author_name']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>