<?php include "header.php";  ?>
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php if(isset($status)): ?>
            <center><p class="alert alert-success"><?= $status ?></p></center>
        <?php endif; unset($status) ?>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="../Admin/admin.php?controller=product&action=addProduct">
                <span data-feather="calendar"></span>
                ADD
            </a>
        </div>
    </main>
<?php include "footer.php"; ?>