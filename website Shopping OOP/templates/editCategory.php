<?php include "header.php";  ?>
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class=" pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Category </h1>
        </div>
        <div class="container">
            <form class="needs-validation" action="?controller=category&action=getEdit&id=<?=$category['id']?>" method="post">
                <div class="mb-3">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" id="email" name="name" value="<?= $category['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Category:</label>
                    <select name="id_parent" required>
                        <option value="0">Macbook</option>
                        <option value="1">Laptop</option>
                        <option value="2">Thiết bị di động</option>
                        <option value="3">Thiết bị IT</option>
                    </select>
                </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Continue to ADD</button>
        </form>
    </main>
<?php include "footer.php"; ?>