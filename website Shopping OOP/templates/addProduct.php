<?php include "header.php";  ?>
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class=" pb-2 mb-3 border-bottom">
                <h1 class="h2">Add Product </h1>
        </div>
    <div class="container">
        <form class="needs-validation" action="?controller=product&action=getAdd" method="post">
            <div class="mb-3">
                <label for="email">Name:</label>
                <input type="text" class="form-control" id="email" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email">Image:</label>
                <input type="text" class="form-control" id="email"  name="image" required>
            </div>
            <div class="mb-3">
                <label for="email">Image1:</label>
                <input type="text" class="form-control" id="email"  name="image1" required>
            </div>
            <div class="mb-3">
                <label for="email">Image2:</label>
                <input type="text" class="form-control" id="email"  name="image2" required>
            </div>
            <div class="mb-3">
                <label for="email">Image3:</label>
                <input type="text" class="form-control" id="email" name="image3" required>
            </div>
            <div class="mb-3">
                <label for="email">Description:</label>
                <textarea name="description" cols="10" rows="1" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="email">Unit_price:</label>
                <input type="text" class="form-control" id="email"  name="unit_price" required>
            </div>
            <div class="mb-3">
                <label for="email">Promotion_price:</label>
                <input type="text" class="form-control" id="email"  name="promotion_price" required>
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