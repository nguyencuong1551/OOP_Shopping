<?php
session_start();
require '../data.php';
$data = new databaseShopping();
$id = $_GET['key'];
$qty = $_GET['value'];
?>
<!doctype html>
<html>
<head>
<title>Update
</title>
</head>
<body>
<form method="post">
    Số lượng: <input type="number" max="5" min="1" name="quantity" value="<?= $qty ?>" class="text-danger form-control">
    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Save</button>
</form>
<?php
if (isset($_POST['submit']))
{
    if (isset($_SESSION['cart']) && $data->checkNull($_POST['quantity']) && $data->checkNumber($_POST['quantity']))
    {
        $_SESSION['cart'][$id]['qty'] = (int)$_POST['quantity'];
        $_SESSION['status'] = "Sửa thành công";
    }else $_SESSION['status'] = "Fail";
    header('location:pay.php');
}
?>
</body>
</html>