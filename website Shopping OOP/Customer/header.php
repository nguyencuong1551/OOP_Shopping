<?php
include "../data.php";
$data = new databaseShopping();
?>

<!doctype html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

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

    <link href="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

        <?php
        $getUser_name = $_COOKIE['nameUser'];
        $getUser_id = $_COOKIE['idUser'];
        $getUser_role = $_COOKIE['roleUser'];
        if(isset($getUser_id))
        {
            if($getUser_role == 'admin')  // hàm isset chỉ là hàm check tồm tại chứ không phải biến;
            {
                echo "
             <ul class=\"navbar-nav px-3\">
            <li class=\"nav-item text-nowrap\">
                        <a class=\"nav-link\" href=\"../Admin/admin.php\">$getUser_name</a>
                    </li>
                    </ul>
                     <ul class=\"navbar-nav px-3\">
                    <li class=\"nav-item text-nowrap\">
                        <a class=\"nav-link\" href=\"logout.php\">Logout</a>
                    </li></ul>
                    ";
            }else{
                echo "
                 <ul class=\"navbar-nav px-3\">
                <li class=\"nav-item text-nowrap\">
                            <a class=\"nav-link\" href=\"logout.php\">Logout</a>
                        </li></ul>";
            }
        }else {
            echo " <ul class=\"navbar-nav px-3\"><li class=\"nav-item text-nowrap\">
            <a class=\"nav-link\" href=\"login.php\">Login</a>
        </li> </ul>";
        }
        ?>

</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="layers"></span>
                            Danh Mục Sản Phẩm <span class="sr-only">(current)</span>
                        </a>
                    </li>


                        <?php
                            $data->select("SELECT * FROM categories WHERE id = 1");
                            $getCategory =$data->fetch();
                            $getId =   $getCategory['id'];
                            $getName = $getCategory['name'];
                        echo "
 <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"Macbook.php?id=$getId\"><span data-feather=\"shopping-cart\"></span>

                            $getName</a></li>";
                        ?>



                    <li class="nav-item dropright">
                        <a class="nav-link dropdown-toggle"  href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="shopping-cart"></span>Laptop</a>
                        <div class="dropdown-menu" >
                            <?php
                            $data->select("SELECT * FROM categories WHERE id_parent = 1");
                            $getCategory = $data->fetch();
                            while ($getCategory = $data->fetch())
                            {
                                $getName = $getCategory['name'];
                                $getId = $getCategory['id'];
                                echo "<a class=\"dropdown-item\" href=\"showCategory.php?id=$getId\">$getName</a>";
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item dropright">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="shopping-cart"></span>Thiết bị di động</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php
                            $data->select("SELECT * FROM categories WHERE id_parent = 2");
                            while ($getCategory = $data->fetch())
                            {
                                $getName = $getCategory['name'];
                                $getId = $getCategory['id'];
                                echo "<a class=\"dropdown-item\" href=\"showCategory.php?id=$getId\">$getName</a>";
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item dropright">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="shopping-cart"></span>Thiết bị IT</a>
                        <div class="dropdown-menu">
                            <?php
                            $data->select("SELECT * FROM categories WHERE id_parent = 3");
                            while ($getCategory = $data->fetch())
                            {
                                $getName = $getCategory['name'];
                                $getId = $getCategory['id'];
                                echo "<a class=\"dropdown-item\" href=\"showCategory.php?id=$getId\">$getName</a>";
                            }
                            ?>
                        </div>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                </ul>
            </div>
        </nav>