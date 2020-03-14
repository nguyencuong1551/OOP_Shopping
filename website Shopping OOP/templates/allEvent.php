<?php include("header.php");
?>
<br>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3 class="h2">Quản lý sự kiện</h3>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="../Admin/admin.php?controller=event&action=addEvent">
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
                <th>percent</th>
                <th>image</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= $event['id'] ?></td>
                    <td><?= $event['nameEvent'] ?></td>
                    <td><?= $event['percent'] ?></td>
                    <td><?= $event['imageEvent'] ?></td>
                    <td>
                        <a href="?controller=event&action=editEvent&id=<?=$event['id']?>" class="btn btn-info">Edit</a>
                        <a href="?controller=event&action=deleteEvent&id=<?=$event['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include("footer.php");?>
