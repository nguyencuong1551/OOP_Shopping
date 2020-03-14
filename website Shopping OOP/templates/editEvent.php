<?php include "header.php";  ?>
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class=" pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Event </h1>
        </div>
        <div class="container">
            <form class="needs-validation" action="?controller=event&action=getEdit&id=<?=$_GET['id']?>" method="post">
                <div class="mb-3">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" id="email" name="name" value="<?= $event['nameEvent'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Percent:</label>
                    <input type="number" class="form-control" value="<?= $event['percent'] ?>"  name="percent" min="1" max="100" required>
                </div>
                <div class="mb-3">
                    <label for="email">Image :</label>  <img src="<?= $event['imageEvent'] ?>" width="200" height="50" alt="">
                    <input type="text" class="form-control" id="email" value="<?= $event['imageEvent'] ?>"  name="image" required>
                </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Continue to ADD</button>
        </form>
    </main>
<?php include "footer.php"; ?>