<?php include "header.php";  ?>
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php if(isset($status)): ?>
            <center><p class="alert alert-success"><?= $status ?></p></center>
        <?php endif; unset($status) ?>
    </main>
<?php include "footer.php"; ?>