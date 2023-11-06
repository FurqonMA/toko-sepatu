<div class="container-fluid my-5">
    <?php 
    if ($is_processed == true) {
        ?>
        <div class="alert alert-success">
            <p class="text-center align-middle"><?= $berhasil ?></p>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger">
            <p class="text-center align-middle"><?= $message ?></p>
        </div>
        <?php
    }
    ?>
</div>

