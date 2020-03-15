<?php include("header.php");
?>
<br>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3 class="h2">Quản lý sản phẩm</h3>
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
                <th>Phone</th>
                <th>address</th>
                <th>email</th>
                <th>payment</th>
                <th>nameSP</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bills as $bill): ?>
                <tr>
                    <td><?= $bill['id'] ?></td>
                    <td><?= $bill['name'] ?></td>
                    <td><?= $bill['phone'] ?></td>
                    <td><?= $bill['address'] ?></td>
                    <td><?= $bill['email'] ?></td>
                    <td><?= $bill['payment'] ?></td>
                    <td><?= $bill['nameSP'] ?></td>
                    <td><?= $bill['promotion_price'] ?></td>
                    <td><?= $bill['quantity'] ?></td>
                    <td><?= $bill['note'] ?></td>
                    <td>
                        <a href="?controller=bill&action=deleteBill&id=<?=$bill['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include("footer.php");?>
