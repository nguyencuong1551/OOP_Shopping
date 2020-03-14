<?php include("header.php");
?>
<br>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3 class="h2">Quản lý danh mục</h3>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="../Admin/admin.php?controller=category&action=addCategory">
            <span data-feather="calendar"></span>
            ADD
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Id_parent</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td><?= $category['id_parent'] ?></td>
                    <td>
                        <a href="?controller=category&action=editCategory&id=<?=$category['id']?>" class="btn btn-info">Edit</a>
                        <a href="?controller=category&action=deleteCategory&id=<?=$category['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include("footer.php");?>
