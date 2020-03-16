<?php
include "../data.php";
$data = new databaseShopping();
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72"
         height="72">
    <?php if (isset($_SESSION['status'])): ?>
    <p class="alert alert-success"><?= $_SESSION['status']?></p>
    <?php else: ?>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <?php endif; unset($_SESSION['status'])?>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" class="form-control" placeholder="Email address" name="user">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="pass">
    <div class="checkbox mb-3">
        <label>
            <a href="register.php"><i>Chưa có tài khoản?</i></a>
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
<?php
$user = addslashes($_POST['user']);
$pass = addslashes($_POST['pass']);
$pass = md5($pass);
if (isset($_POST['submit']))
{
    if ($data->checkNull($user) && $data->checkNull($pass)) {
        $data->select("SELECT * FROM users WHERE email = '$user' AND password = '$pass'");
        $getUser = $data->fetch();
        if ($getUser) {
            $getName = $getUser['name'];
            $getRole = $getUser['role'];
            $getEmail = $getUser['email'];
            $getId = $getUser['id'];
            if ($getRole == 'admin') {
                $_SESSION['idUser'] = $getId;
                $_SESSION['nameUser'] = $getName;
                $_SESSION['roleUser'] = $getRole;
                $_SESSION['emailUser'] = $getEmail;
                header("location:../Admin/admin.php?controller=home&action=countAll");
            } else {
                $_SESSION['idUser'] = $getId;
                $_SESSION['nameUser'] = $getName;
                $_SESSION['roleUser'] = $getRole;
                $_SESSION['emailUser'] = $getEmail;
                header("location:index.php");
            }
        }else return $error = "<p class='alert alert-danger'>Nhập sai email hoặc password</p>";
    } else echo "<p class='alert alert-danger'>Không được để trống user & pass</p>";
}
?>
</body>
</html>

