<?php
include "../data.php";
$data = new databaseShopping();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../Customer/index.php">Shopping</a>
    <form class="w-100" action="?controller=product&action=searchProduct"  method="post">
        <input class="form-control form-control-dark " name="key" type="text" placeholder="Search" aria-label="Search">
    </form>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <?php
            if (isset($_COOKIE['roleUser']) == 'admin')
            {
                echo "<a class=\"nav-link\" href=\"../Customer/logout.php\">Sign out</a>";
            }
            else echo "";
            ?>

        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="../Admin/admin.php?controller=home&action=countAll">
                            <span data-feather="home"></span>
                            Home <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/admin.php?controller=product&action=getProduct">
                            <span data-feather="file-text"></span>
                            Quản lý sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/admin.php?controller=category&action=getCategory">
                            <span data-feather="file-text"></span>
                            Quản lý danh mục
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/admin.php?controller=event&action=getEvent">
                            <span data-feather="file-text"></span>
                            Quản lý sự kiện
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/admin.php?controller=bill&action=getBill">
                            <span data-feather="file-text"></span>
                            Quản lý đơn hàng
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

