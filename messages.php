<?php
if (isset($msgSuccess) && !empty($msgSuccess)) {
    foreach ($msgSuccess as $message) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
        <?php
    }
}

if (isset($msgError) && !empty($msgError)) {
    foreach ($msgError as $message) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $message; ?>
        </div>
        <?php
    }
}
?>
