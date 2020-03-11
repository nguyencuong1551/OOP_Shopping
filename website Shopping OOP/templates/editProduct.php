<?php include "header.php";  ?>
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class=" pb-2 mb-3 border-bottom">

            <h1 class="h2">Edit Product </h1>
        </div>
        <div class="container">
            <form class="needs-validation" action="?controller=product&action=getEdit&id=<?= $_GET['id']?>" method="post">
                <div class="mb-3">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" id="email" name="name" value="<?= $product['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Image:</label> <img src="<?= $product['image'] ?>" width="100" height="50" alt="">
                    <input type="text" class="form-control" id="email"  name="image" value="<?= $product['image'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Image1:</label> <img src="<?= $product['image1'] ?>" width="100" height="50" alt="">
                    <input type="text" class="form-control" id="email"  name="image1" value="<?= $product['image1'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Image2:</label> <img src="<?= $product['image2'] ?>" width="100" height="50" alt="">
                    <input type="text" class="form-control" id="email"  name="image2" value="<?= $product['image2'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Image3:</label> <img src="<?= $product['image3'] ?>" width="100" height="50" alt="">
                    <input type="text" class="form-control" id="email" name="image3" value="<?= $product['image3'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Description:</label>
                    <input name="description"  class="form-control" value="<?= $product['description'] ?>"  required>
                </div>
                <div class="mb-3">
                    <label for="email">Unit_price:</label>
                    <input type="text" class="form-control" id="email"  name="unit_price" value="<?= $product['unit_price'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Promotion_price:</label>
                    <input type="text" class="form-control" id="email"  name="promotion_price" value="<?= $product['promotion_price'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Category:</label>
                    <select name="id_category" required>
                        <?php foreach ($categories as $category):?>
                            <option value="<?= $category['id'] ?>"><?= $category['name']?></option>
                        <?php endforeach;?>
                    </select>
                    <label for="email">Event:</label>
                    <select name= "id_event" required>
                        <option value="0">Không thuộc sự kiện nào</option>
                        <?php foreach ($events as $event):?>
                            <option value="<?= $event['id'] ?>"><?= $event['percent']?>%</option>
                        <?php endforeach;?>
                    </select>
                </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Continue to ADD</button>
        </form>
    </main>
<?php include "footer.php"; ?>