<?php include("header.php");
?>
<br>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3 class="h2 text-danger">Tìm thấy <?= count($products) ?> Kết quả cho từ khóa '<?=$key?>'</h3>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="../Admin/admin.php?controller=product&action=addProduct">
            <span data-feather="calendar"></span>
            ADD
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Unit_price</th>
                <th>Promotion_price</th>
                <th>Id_category</th>
                <th>Id_event</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><center><img src="<?= $product['image'] ?>" width="100" height="70"></center></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['unit_price'] ?></td>
                    <td><?= $product['promotion_price'] ?></td>
                    <td><?= $product['id_category'] ?></td>
                    <td><?= $product['id_event'] ?></td>
                    <td>
                        <a href="?controller=product&action=editProduct&id=<?=$product['id']?>" class="btn btn-info">Edit</a>
                        <a href="?controller=product&action=deleteProduct&id=<?=$product['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include("footer.php");?>
