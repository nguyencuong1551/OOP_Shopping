<?php
include "header.php";
?>
<br>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Danh mục</th>
                <th>Sự kiện</th>
                <th>Đơn hàng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td><?= count($products) ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
<?php include "footer.php"; ?>
