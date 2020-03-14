<?php
session_start();
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
        body {
            position: relative;
        }
        .btn {
            border: 2px solid black;
            background-color: white;
            color: black;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
        }
        /* Green */
        .success {
            border-color: #4CAF50;
            color: green;
        }
        .success:hover {
            background-color: #4CAF50;
            color: white;
        }
        /* Blue */
        .info {
            border-color: #2196F3;
            color: dodgerblue
        }
        .info:hover {
            background: #2196F3;
            color: white;
        }
        /* Orange */
        .warning {
            border-color: #ff9800;
            color: orange;
        }
        .warning:hover {
            background: #ff9800;
            color: white;
        }
        /* Red */
        .danger {
            border-color: #f44336;
            color: red
        }
        .danger:hover {
            background: #f44336;
            color: white;
        }
        /* Gray */
        .default {
            border-color: #e7e7e7;
            color: black;
        }
        .default:hover {
            background: #e7e7e7;
        }
        p.indent {
            padding-left: 1.8em
        }
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
        p.lineThrough {
            text-decoration: line-through;
        }
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
    <link href=" https://getbootstrap.com/docs/4.4/examples/album/album.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Shopping</a>
    <?php
    $getUser_name = $_COOKIE['nameUser'];
    $getUser_id = $_COOKIE['idUser'];
    $getUser_role = $_COOKIE['roleUser'];
    if(isset($getUser_id))
    {
        if($getUser_role == 'admin')  // hàm isset chỉ là hàm check tồn tại chứ không phải biến;
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
<main role="main">
    <br><br><br>
    <div class="container marketing">
        <!-- START THE FEATURETTES -->
        <?php
        $getId_product = $_GET['id'];
        $data->select("SELECT * FROM products WHERE id = '$getId_product'");
        $getProduct = $data->fetch();
        $getProduct_id = $getProduct['id'];
        $getProduct_name = $getProduct['name'];
        $getProduct_image = $getProduct['image'];
        $getProduct_image1 = $getProduct['image1'];
        $getProduct_image2 = $getProduct['image2'];
        $getProduct_image3 = $getProduct['image3'];
        $getProduct_description = $getProduct['description'];
        $getProduct_unit_price = $getProduct['unit_price'];
        $getProduct_promotion_price = $getProduct['promotion_price'];
        $getProduct_id_category = $getProduct['id_category'];
        $data->select("SELECT name FROM categories WHERE id = '$getProduct_id_category'");
        $getCategory = $data->fetch();
        $getCategory_name = $getCategory['name'];
        echo " <div class=\"row\">
            <div class=\"col-md-1 order-md-2\"></div>
            <div class=\"col-md-7 order-md-2\">
             
                 <div class=\"row\">
                   <div class=\"col-md-6\">
                    <h3 class=\"featurette-heading\">$getProduct_name</h3>
</div>
<div class=\"col-md-6\">
                   <p>Danh mục: <a href='showCategory.php?id=$getProduct_id_category'>$getCategory_name</a></p>
</div>
</div>
                <hr class=\"mb-4\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <h5 class=\"mb-1 text-muted\">Giá: <strike>$getProduct_unit_price$</strike></h5>
                        <h4 class=\"mb-1 text-danger\">Giá khuyến mại: $getProduct_promotion_price$</h4>
                        <br>
                        <h6 class=\"mb-1 text-muted\"><img
                                src=\"https://kienanh.vn/wp-content/uploads/2018/11/dich-vu-chat-luong.png\"
                                width=\"25\"
                                height=\"25\"> Hàng chính hãng 100%</h6>
                        <h6 class=\"mb-1 text-muted\"><img
                                src=\"https://salt.tikicdn.com/assets/events/nha-ban-le/wd-kingston/img/feature-icon-4.jpg\"
                                width=\"25\"
                                height=\"25\"> 7 ngày miễn phí trả hàng</h6>
                        <br>
                     <a class=\"btn btn-lg btn-warning\" href=\"{{Route('homepay)}}\"
                              role=\"button\" style=\"width: 100%\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"60\" height=\"30\" viewBox=\"0 0 24 24\">
                                    <path d=\"M6 23.73l-3-2.122v-14.2l3 1.359v14.963zm2-14.855v15.125l13-1.954v-15.046l-13 1.875zm5.963-7.875c-2.097 0-3.958 2.005-3.962 4.266l-.001 1.683c0 .305.273.54.575.494.244-.037.425-.247.425-.494v-1.681c.003-1.71 1.416-3.268 2.963-3.268.537 0 1.016.195 1.384.564.422.423.654 1.035.653 1.727v1.747c0 .305.273.54.575.494.243-.037.423-.246.423-.492l.002-1.749c.002-1.904-1.32-3.291-3.037-3.291zm-6.39 5.995c.245-.037.427-.247.427-.495v-2.232c.002-1.71 1.416-3.268 2.963-3.268l.162.015c.366-.283.765-.513 1.188-.683-.405-.207-.858-.332-1.35-.332-2.096 0-3.958 2.005-3.962 4.266v2.235c0 .306.272.538.572.494z\"/>
                                </svg>
                                <strong>Đặt hàng</strong>
                            </a>
                    </div>
                    <div class=\"col-md-6\">
                        <ul class=\"list-group bg-dark\">
                            <li class=\"list-group-item d-flex justify-content-between lh-condensed bg-light\">
                                <div class=\"row\">
                                    <div class=\"col-md-3\">
                                        <img src=\"http://cdn.nhanh.vn/cdn/store/26/art/article_1479956944_813.jpg\"
                                             width=\"100%\" height=\"35\">
                                    </div>
                                    <div class=\"col-md-9\">
                                        <h6 class=\"text-muted text-sm-left\">
                                            <span><strong>Giao hàng miễn phí</strong> cho đơn hàng trên 10$</span>
                                        </h6>
                                        <h6 class=\"text-muted text-sm-left\"><span>Nhận hàng từ 6 đến 24h sau khi đặt hàng</span>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                            <li class=\"list-group-item d-flex justify-content-between lh-condensed bg-light\">
                                <div class=\"row\">
                                    <div class=\"col-md-3\">
                                        <img src=\"https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/phone-call-active-512.png\"
                                             width=\"30\" height=\"30\">
                                    </div>
                                    <div class=\"col-md-9\">
                                        <h6 class=\"text-sm-left\"><strong>Liên hệ</strong></h6>
                                        <h6 class=\"text-muted text-sm-left\"><span>Hotline đặt hàng <br>1800 6963 (Miễn phí, 8-21h cả T7, CN)</span>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4 order-md-1\">
                <div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
                    <div class=\"carousel-inner\">
                        <div class=\"carousel-item active\">
                            <center><img src=\"$getProduct_image\" width=\"270\" height=\"200\"></center>
                        </div>
                        <div class=\"carousel-item\">
                            <center><img src=\"$getProduct_image1\" width=\"270\" height=\"200\"></center>
                        </div>
                        <div class=\"carousel-item\">
                            <center><img src=\"$getProduct_image2\" width=\"270\" height=\"200\"></center>
                        </div>
                        <div class=\"carousel-item\">
                            <center><img src=\"$getProduct_image3\" width=\"270\" height=\"200\"></center>
                        </div>
                    </div>
                </div>
                <hr class=\"mb-4\">
                <ol class=\"carousel-indicators\">
                    <div class=\"row\">
                        <div class=\"col-md-3\">
                            <a data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"><img
                                    src=\"$getProduct_image\"
                                    width=\"45\" height=\"35\"></a>
                        </div>
                        <div class=\"col-md-3\">
                            <a data-target=\"#myCarousel\" data-slide-to=\"1\" class=\"active\"><img
                                    src=\"$getProduct_image1\"
                                    width=\"45\" height=\"35\"></a>
                        </div>
                        <div class=\"col-md-3\">
                            <a data-target=\"#myCarousel\" data-slide-to=\"2\" class=\"active\"><img
                                    src=\"$getProduct_image2\"
                                    width=\"45\" height=\"35\"></a>
                        </div>
                        <div class=\"col-md-3\">
                            <a data-target=\"#myCarousel\" data-slide-to=\"3\" class=\"active\"><img
                                    src=\"$getProduct_image3\"
                                    width=\"45\" height=\"35\"></a>
                        </div>
                    </div>
                </ol>

            </div>
        </div>
        <hr class=\"featurette-divider\">
        <div class=\"row featurette\">
            <div class=\"col-md-12\">
                <h2 class=\"featurette-heading\">Mô tả sản phẩm</h2><br>
                <div class=\"row featurette\">
                    <div class=\"col-md-12\">
                        <p><span><h4> Đang cập nhật... $getProduct_description</h4></span></p>
                        <br>
                        <div id=\"Carousel1\" class=\"carousel slide\" data-ride=\"carousel\">
                            <div class=\"carousel-inner\">
                                <div class=\"carousel-item active\">
                                    <center><img src=\"$getProduct_image\" width=\"600\" height=\"400\"></center>
                                </div>
                                <div class=\"carousel-item \">
                                    <center><img src=\"$getProduct_image1\" width=\"600\" height=\"400\"></center>
                                </div>
                                <div class=\"carousel-item \">
                                    <center><img src=\"$getProduct_image2\" width=\"600\" height=\"400\"></center>
                                </div>
                                <div class=\"carousel-item \">
                                    <center><img src=\"$getProduct_image3\" width=\"600\" height=\"400\"></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        ?>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-12 order-md-2">
                <h2 class="featurette-heading">Đánh giá sản phẩm</h2>
                <h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                <?php
                $number_page = $data->number_page("SELECT COUNT(id) AS total FROM comments WHERE id_product = '$getId_product'", 5);
                $current_page = $data->checkCurrent_page("SELECT COUNT(id) AS total FROM comments WHERE id_product = '$getId_product'", 5);
                    $start = $data->countStart
                    ("SELECT COUNT(id) AS total FROM comments WHERE id_product = '$getId_product'", 5);
                    $data->select("SELECT * FROM comments WHERE id_product = '$getId_product' LIMIT $start, 5 ");
                    while ($getComment = $data->fetch())
                    {
                        $getComment_name_user = $getComment['name_user'];
                        $getComment_id = $getComment['id'];
                        $getComment_vote = $getComment['vote'];
                        $getComment_description = $getComment['description'];
                        $getComment_created_at = $getComment['created_at'];
                        $getComment_role_user = $getComment['roleUser'];
                        if ($getComment_role_user  == "admin")
                        {
                            echo "
                    <div class=\"media text-muted pt-3\">
                        <img src='https://img.atpsoftware.vn/2019/04/1-160-350x250.png' width='40' height='28'>
                        <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">
                            <strong class=\"d-block text-danger\">$getComment_name_user</strong>
                             <i>$getComment_description</i>
                        </p>
                         $getComment_created_at
                    </div>
                ";
                        }elseif ($_COOKIE['roleUser']  == "admin")
                        {
                            echo "
                    <div class=\"media text-muted pt-3\">
                        <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect width=\"100%\" height=\"100%\" fill=\"#6f42c1\"/><text x=\"50%\" y=\"50%\" fill=\"#6f42c1\" dy=\".3em\">32x32</text></svg>
                        <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">
                            <strong class=\"d-block text-gray-dark\">
                            $getComment_name_user &nbsp;&nbsp;&nbsp;&nbsp; <span class='text-info'>$getComment_vote</span></strong>
                          $getComment_description
                        </p>
                        $getComment_created_at <br> 
                       <a class='btn-danger' href='deleteComment.php?id=$getComment_id&idSp=$getId_product&page=$current_page'>X</a>
                    </div>
                ";
                        }else{
                            echo "
                    <div class=\"media text-muted pt-3\">
                        <svg class=\"bd-placeholder-img mr-2 rounded\" width=\"32\" height=\"32\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: 32x32\"><title>Placeholder</title><rect width=\"100%\" height=\"100%\" fill=\"#6f42c1\"/><text x=\"50%\" y=\"50%\" fill=\"#6f42c1\" dy=\".3em\">32x32</text></svg>
                        <p class=\"media-body pb-3 mb-0 small lh-125 border-bottom border-gray\">
                            <strong class=\"d-block text-gray-dark\">
                            $getComment_name_user &nbsp;&nbsp;&nbsp;&nbsp; <span class='text-info'>$getComment_vote</span></strong>
                          $getComment_description
                        </p>
                        $getComment_created_at
                    </div>
                ";
                        }


                    }
                    ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <div></div>
                        <div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    if ($current_page > 1) {
                                        $prev = $current_page - 1;
                                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"detailProduct.php?id=$getId_product&page=$prev\">Prev</a></li>";
                                    }
                                    // Nút số
                                    for ($i = 1; $i <= $number_page; $i++) {
                                        if ($current_page != $i) {
                                            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"detailProduct.php?id=$getId_product&page=$i\">$i</a></li>";
                                        } else echo "<li class=\"page-item\"><a class=\"page-link\">$i</a></li>";
                                    }
                                    // Next
                                    if ($current_page < $number_page)
                                    {
                                        $next = $current_page + 1;
                                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"detailProduct.php?id=$getId_product&page=$next\">Next</a></li>";
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                </div>
                    <hr class="featurette-divider">
                    <div class="col-md-12">
                    <?php
                    if (isset($_COOKIE['nameUser']))
                    {
                        echo "
                    <form class=\"needs-validation\" method='post' >
                        <h5>Vote: </h5>
                        <div class=\"row\">
                            <div class=\"col-md-2 mb-3\">
                                <div class=\"custom-control custom-radio\">
                                    <input value=\"Rất Tốt\" id=\"credit\" name=\"vote\" type=\"radio\" class=\"custom-control-input\" required>
                                    <label class=\"custom-control-label\" for=\"credit\">Rất Tốt</label>
                                </div>
                            </div>
                            <div class=\"col-md-2 mb-3\">
                                <div class=\"custom-control custom-radio\">
                                    <input value=\"Bình thường\" id=\"debit\" name=\"vote\" type=\"radio\" class=\"custom-control-input\" required>
                                    <label class=\"custom-control-label\" for=\"debit\">Bình thường</label>
                                </div>
                            </div>
                            <div class=\"col-md-2 mb-3\">
                                <div class=\"custom-control custom-radio\">
                                    <input value=\"Rất tệ\" id=\"paypal\" name=\"vote\" type=\"radio\" class=\"custom-control-input\" required>
                                    <label class=\"custom-control-label\" for=\"paypal\">Rất tệ</label>
                                </div>
                            </div>
                        </div>
                        <div class=\"mb-3\">
                            <label for=\"username\"><strong>Viết Bình luận ...</strong></label>
                            <div class=\"input-group\">
                                <textarea type=\"text\" class=\"form-control\" placeholder=\"...\" required
                                            name=\"description\" id=\"\" cols=\"30\" rows=\"1\"></textarea>
                                <div class=\"invalid-feedback\" style=\"width: 100%;\">
                                    Your username is required.
                                </div>
                                <div class=\"input-group-prepend\">
                                    <a href=\"\"><span class=\"input-group-text\">@</span></a>
                                </div>
                            </div>
                        </div>
                        <button class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" name='submit'>Continue to comment</button>
                    </form>";
                    }else echo "";
                        if (isset($_POST['submit']))
                        {
                            $vote = $_POST['vote'];
                            $description = $_POST['description'];
                            $id_product = $_GET['id'];
                            $name_user = $_COOKIE['nameUser'];
                            $role_user = $_COOKIE['roleUser'];
                            $data->crud("INSERT INTO comments VALUES (null, '$description', '$name_user', '$id_product',
 '$role_user','$vote', current_timestamp(), current_timestamp())");
                        }
                    ?>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
    </div>
    <!-- FOOTER -->
    <footer class="container">
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
                    <li><p class="text-muted">038.343.8868</p></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Địa Chỉ</h5>
                <ul class="list-unstyled text-small">
                    <li><p class="text-muted">Hà Nội</p></li>
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
</main>
<hr class="featurette-divider">
<!-- FOOTER -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>
</body>
</html>
