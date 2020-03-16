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
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please register</h1>

    <label class="sr-only">Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name" required><br>

    <label  class="sr-only">Email address</label>
    <input type="email" class="form-control" placeholder="Email address" name="email" value="example@gmail.com"  required><br>

    <label  class="sr-only">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="pass" required><br>


    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
<?php
    $getUser_name = addslashes($_POST['name']);
    $getUser_email = addslashes($_POST['email']);
    $getUser_pass = addslashes($_POST['pass']);
    $getUser_pass = md5($getUser_pass);
    if (isset($_POST['submit']))
    {
        $data->crud("INSERT INTO users VALUES (null ,'$getUser_name','$getUser_email',null ,'$getUser_pass','user',null ,current_timestamp (),current_timestamp ())");
        $_SESSION['status'] = "Tạo tài khoản thành công";
        header("location:login.php");
    }
?>
</body>
</html>
