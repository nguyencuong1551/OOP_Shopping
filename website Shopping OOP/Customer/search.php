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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Shopping</a>
        <form class="w-100"  method="get">
            <input class="form-control form-control-dark " name="key" type="text" placeholder="Search" aria-label="Search">
        </form>
        <?php
        $key = addslashes($_GET['key']);
        ?>
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
                        <a class=\"nav-link\" href=\"#\">$getUser_name</a>
                    </li>
                    </ul>
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
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $data->select("SELECT * FROM events");
                    while ($getEvent = $data->fetch())
                    {
                        $getEvent_id = $getEvent['id'];
                        $getEvent_name = $getEvent['nameEvent'];
                        $getEvent_image = $getEvent['imageEvent'];
                        $getEvent_percent = $getEvent['percent'];
                        echo "<div class=\"carousel-item \">
                        <div class=\"container\">
                            <div class=\"carousel-caption text-right\">
                                <p><a class=\"btn btn-lg btn btn-outline-light\" href=\"showEvent.php?id=$getEvent_id\" role=\"button\">Sale up to $getEvent_percent%</a></p>
                            </div>
                        </div>
                        <img src=\"$getEvent_image\" style=\"width: 100%;height: 290px\" >
                    </div>";
                    }
                    ?>
                    <div class="carousel-item active">
                        <img src="https://www.ecopetit.cat/wpic/mpic/146-1462390_one-piece-wallpaper-4k.jpg" style="width: 100%;height: 290px" >
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr class="featurette-divider">
            <?php
                $countProduct = $data->count("SELECT COUNT(id) AS total FROM products WHERE name LIKE '%$key%'");
                echo " <h2 class='text-danger'>Tìm thấy $countProduct cho từ khóa: '$key'</h2>"
            ?>
            <div id="showCategoryProduct">
                <div class="row col-auto">
                    <?php
                    // Tổng số bản ghi trong 1 trang
                    // Trang hiện tại
                    // Xác định bản ghi đầu tiên của trang
                    $current_page = $data->checkCurrent_page
                    ("SELECT COUNT(id) AS total FROM products WHERE name like '%$key%'",16);

                    $number_page = $data->number_page
                    ("SELECT COUNT(id) AS total FROM products WHERE name like '%$key%'",16);

                    $start = $data->countStart
                    ("SELECT COUNT(id) AS total FROM products WHERE name like '%$key%'",16);
                    //truy vấn và hiển thị nội dung của trang
                    $data->select("SELECT * FROM products WHERE name like '%$key%' LIMIT $start, 16");
                    while ($getProduct = $data->fetch()) {
                        $getId = $getProduct['id'];
                        $getName = $getProduct['name'];
                        $getImage = $getProduct['image'];
                        $getUnit_price = $getProduct['unit_price'];
                        $getPromotion_price = $getProduct['promotion_price'];
                        echo "<div class=\"col-3\">
                        <div class=\"card flex-row mb-2 shadow-sm h-md-150\">
                            <div class=\"card-body d-flex flex-column align-items-start\">
                                <center><a href=\"\"><img
                                            src=\"$getImage\"
                                            height=\"130\" width=\"180\"></a></center>
                                <br>
                                <strong class=\"d-inline-block mb-2 text-dark\">$getName</strong>
                                <div class=\"text-muted\">Giá: <strike>$getUnit_price$</strike></div>
                                <div class=\"mb-1 text-danger\">Giá khuyến mại: $getPromotion_price$</div>
                                <br>
                                <p>
                                    <a class=\"btn btn-outline-dark mb-1\"
                                       href=\"detailProduct.php?id=$getId\">Thông tin &raquo</a>
                                    <a class=\"btn btn-outline-dark mb-1\"
                                       href=\"#\">
                                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"38\" height=\"23\"
                                             viewBox=\"0 0 24 24\">
                                            <path d=\"M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z\"/>
                                        </svg>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                </div>
                <hr class="featurette-divider">
                <div class="d-flex justify-content-between align-items-center">
                    <div></div>
                    <div><nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                if ($current_page > 1) {
                                    $prev = $current_page - 1;
                                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page=$prev\">Prev</a></li>";
                                }
                                // Nút số
                                for ($i = 1; $i <= $number_page; $i++) {
                                    if ($current_page != $i) {
                                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page=$i\">$i</a></li>";
                                    } else echo "<li class=\"page-item\"><a class=\"page-link\">$i</a></li>";
                                }
                                // Next
                                if ($current_page < $number_page) {
                                    $next = $current_page + 1;
                                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page=$next\">Next</a></li>";
                                }
                                ?>
                            </ul>
                        </nav></div>
                </div>
            </div>
        </main>
    </div>
</div>
    <hr class="featurette-divider">
    <!-- FOOTER -->
    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"
                     stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2"
                     role="img"
                     viewBox="0 0 24 24" focusable="false"
                     href="https://www.facebook.com/profile.php?id=100007509827423"><title>Product</title>
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
                </svg>
                <small class="d-block mb-3 text-muted">&copy; 2018-2019</small>
            </div>
            <div class="col-6 col-md">
                <h5>Admin</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="{{Route('home')}}">Nguyễn Mạnh Cường</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Số Điện Thoại</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted">038.343.8868</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Địa Chỉ</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted">Hà Nội</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Kết Nối Với Shop</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted"
                           href="https://www.facebook.com/profile.php?id=100007509827423">
                            <img src="https://banner2.kisspng.com/20171216/213/facebook-logo-png-5a35528eaa4f08.7998622015134439826976.jpg"
                                 width="60" height="35">
                        </a>
                        <a class="text-muted"
                           href="https://www.instagram.com/cuongit151097/?hl=vi">
                            <img src="https://img.freepik.com/free-vector/instagram-icon_1057-2227.jpg?size=338&ext=jpg"
                                 width="35" height="35">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    </body>
</html>
