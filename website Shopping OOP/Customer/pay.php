<?php
include "../data.php";
$data = new databaseShopping();
session_start();
$cart = implode(',', $_SESSION['cart']);
$countCart = count($_SESSION['cart']);
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
<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Shopping</a>
    <form class="w-100"  method="get">
        <input class="form-control form-control-dark " name="key" type="text" placeholder="Search" aria-label="Search">
    </form>
    <?php
    $key = addslashes($_GET['key']);
    if ($data->checkNull($key))
    {
        header("location:search.php?key=$key");
    }
    ?>
    <?php
    $getUser_name = $_COOKIE['nameUser'];
    $getUser_id = $_COOKIE['idUser'];
    $getUser_role = $_COOKIE['roleUser'];
    $countCart = count($_SESSION['cart']);
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

            echo " <ul class=\"navbar-nav px-3\"><li class=\"nav-item text-nowrap\">
            <a class=\"nav-link\" href=\"pay.php\"><strong>$countCart</strong>
            <svg xmlns=\"http:/www.w3.org/2000/svg\" width=\"38\" height=\"23\"
                                             viewBox = \"0 0 24 24\" >
                                            <path d = \"M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z\" />
                                        </svg >
            </a>
        </li> </ul>
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
            <a class=\"nav-link\" href=\"pay.php\"><strong>$countCart</strong>
            <svg xmlns=\"http:/www.w3.org/2000/svg\" width=\"38\" height=\"23\"
                                             viewBox = \"0 0 24 24\" >
                                            <path d = \"M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z\" />
                                        </svg >
            </a>
        </li> </ul>
        <ul class=\"navbar-nav px-3\"><li class=\"nav-item text-nowrap\">
            <a class=\"nav-link\" href=\"login.php\">Login</a>
        </li> </ul>";
    }
    ?>
</nav>
<div class="container">
    <br>
    <form method="post">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Sản phẩm</span>
                    <span class="badge badge-secondary badge-pill">
                        <a href='deleteCheckout.php?id=$getId' class='text-dark'>X</a>
                    </span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $data->select("SELECT * FROM products WHERE id IN ($cart)");
                    while ($getProduct =  $data->fetch()) {
                        $getId = $getProduct['id'];
                        $getName = $getProduct['name'];
                        $getImage = $getProduct['image'];
                        $getUnit_price = $getProduct['unit_price'];
                        $getPromotion_price = $getProduct['promotion_price'];
                        echo "<li class=\"list-group-item d-flex justify-content-between bg-light\">
                        <div>
                            <p><strong class=\"my-0\">$getName</strong></p>                          
                        </div>
                    </li>
                     <li class=\"list-group-item d-flex justify-content-between bg-light\">
                        <div class=\"text-success\">
                            <h6 class=\"my-0\">Giá:</h6>
                        </div>
                        <span class=\"text-success\">$getUnit_price $</span>
                    </li>
                    ";
                    }
                    ?>
                </ul>

            </div>
            <div class="col-md-8 order-md-1">
                <h3 class=" mb-3">Thông tin hóa đơn
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path d="M12.164 7.165c-1.15.191-1.702 1.233-1.231 2.328.498 1.155 1.921 1.895 3.094 1.603 1.039-.257 1.519-1.252 1.069-2.295-.471-1.095-1.784-1.827-2.932-1.636zm1.484 2.998l.104.229-.219.045-.097-.219c-.226.041-.482.035-.719-.027l-.065-.387c.195.03.438.058.623.02l.125-.041c.221-.109.152-.387-.176-.453-.245-.054-.893-.014-1.135-.552-.136-.304-.035-.621.356-.766l-.108-.239.217-.045.104.229c.159-.026.345-.036.563-.017l.087.383c-.17-.021-.353-.041-.512-.008l-.06.016c-.309.082-.21.375.064.446.453.105.994.139 1.208.612.173.385-.028.648-.36.774zm10.312 1.057l-3.766-8.22c-6.178 4.004-13.007-.318-17.951 4.454l3.765 8.22c5.298-4.492 12.519-.238 17.952-4.454zm-2.803-1.852c-.375.521-.653 1.117-.819 1.741-3.593 1.094-7.891-.201-12.018 1.241-.667-.354-1.503-.576-2.189-.556l-1.135-2.487c.432-.525.772-1.325.918-2.094 3.399-1.226 7.652.155 12.198-1.401.521.346 1.13.597 1.73.721l1.315 2.835zm2.843 5.642c-6.857 3.941-12.399-1.424-19.5 5.99l-4.5-9.97 1.402-1.463 3.807 8.406-.002.007c7.445-5.595 11.195-1.176 18.109-4.563.294.648.565 1.332.684 1.593z"/>
                    </svg>
                </h3>
                <?php
                if(isset($_COOKIE['nameUser']))
                {
                    $getUser_email = $_COOKIE['emailUser'];
                    $getUser_name = $_COOKIE['nameUser'];

                    echo "<div class=\"mb-3\">
                    <label for=\"firstName\">Họ tên</label>
                    <input name=\"name\" type=\"text\" class=\"form-control\" id=\"firstName\" value='$getUser_name'
                           required readonly>
                </div>
                <div class=\"mb-3\">
                    <label for=\"firstName\">Email</label>
                    <input name=\"email\" type=\"text\" class=\"form-control\" id=\"firstName\" placeholder=\"... \" value=\"$getUser_email\"
                           required readonly>
                </div>";
                }else
                   echo  "<div class=\"mb-3\">
                    <label for=\"firstName\">Họ tên</label>
                    <input name=\"name\" type=\"text\" class=\"form-control\" id=\"firstName\" placeholder=\"... \" value=\"\"
                           required >
                </div>
                <div class=\"mb-3\">
                    <label for=\"firstName\">Email</label>
                    <input name=\"email\" type=\"text\" class=\"form-control\" id=\"firstName\" placeholder=\"... \" value=\"\"
                           required>
                </div>";
                ?>

                <div class="mb-3">
                    <label for="firstName">Số điện thoại</label>
                    <input name="phone" type="text" class="form-control" id="firstName" placeholder="... " value=""
                           required>
                </div>
                <div class="mb-3">
                    <label for="firstName">Địa chỉ</label>
                    <input name="address" type="text" class="form-control" id="firstName" placeholder="... " value=""
                           required>
                </div>
                <div class="row">
                    <?php
                        $data->select("SELECT * FROM products WHERE id IN ($cart)");
                        while ($getProduct = $data->fetch())
                        {
                            $getId = $getProduct['id'];
                            $getName = $getProduct['name'];
                            $getImage = $getProduct['image'];
                            $getUnit_price = $getProduct['unit_price'];
                            $getPromotion_price = $getProduct['promotion_price'];
                            echo "
                            <div class=\"col-md-7 mb-3\">
                        <label for=\"firstName\">Tên sản phẩm</label>
                        <input name=\"nameSP\" type=\"text\" class=\"text-danger form-control\"
                               value=\"$getName\" required
                               readonly>
                        <div class=\"invalid-feedback\">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class=\"col-md-2 mb-3\">
                        <label for=\"lastName\">Số lượng</label>
                        <input type=\"number\" name=\"quantity\" class=\"text-danger form-control\" min=\"1\" max=\"5\" value=\"1\">
                        <div class=\"invalid-feedback\">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class=\"col-md-3 mb-3\">
                        <label for=\"lastName\">Đơn giá</label>
                        <input name=\"promotion_price\" type=\"text\" class=\"text-danger form-control\"
                               value=\"$getPromotion_price $\" required readonly>
                        <div class=\"invalid-feedback\">
                            Valid last name is required.
                        </div>
                    </div>";
                        }
                    ?>
                </div>

                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10 13h-4v-1h4v1zm2.318-4.288l3.301 3.299-4.369.989 1.068-4.288zm11.682-5.062l-7.268 7.353-3.401-3.402 7.267-7.352 3.402 3.401zm-6 8.916v.977c0 4.107-6 2.457-6 2.457s1.518 6-2.638 6h-7.362v-20h14.056l1.977-2h-18.033v24h10.189c3.163 0 9.811-7.223 9.811-9.614v-3.843l-2 2.023z"/>
                            </svg>
                            Ghi chú...</label>
                        <textarea name="note" class="form-control" rows="3" placeholder="... "></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <h4 class="mb-3">Hình thức thanh toán</h4>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input value="Thanh toán khi nhận hàng" id="debit" name="payment" type="radio"
                                       class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Thanh toán khi nhận hàng</label>
                                <br>
                                <h6 class="text-success"><img
                                        src="https://biohack.ae/wp-content/uploads/2017/01/shipping-icon.png"
                                        width="25" height="20">
                                    Miễn phí vận chuyển</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Đặt Hàng</button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit']))
    {
        $getCustomer_name = $_POST['name'];
        $getCustomer_email = $_POST['email'];
        $getCustomer_phone = $_POST['phone'];
        $getCustomer_address = $_POST['address'];
        $getCustomer_nameSP = $_POST['nameSP'];
        $getCustomer_quantity = $_POST['quantity'];
        $getCustomer_promotion = $_POST['promotion_price'];
        $getCustomer_note = $_POST['note'];
        $getCustomer_payment = $_POST['payment'];
        if ($data->checkNull($getCustomer_name) && $data->checkNull($getCustomer_email) && $data->checkNull($getCustomer_phone) &&
            $data->checkNull($getCustomer_nameSP) && $data->checkNull($getCustomer_promotion) &&
            $data->checkNull($getCustomer_quantity) && $data->checkNull($getCustomer_payment))
        {
            $data->crud("INSERT INTO bills VALUES
 (null, '$getCustomer_name', '$getCustomer_phone', '$getCustomer_address', '$getCustomer_email', '$getCustomer_payment'
 ,'$getCustomer_nameSP','$getCustomer_promotion','$getCustomer_note', null,'$getCustomer_quantity', current_timestamp(), current_timestamp())");
        }else echo "Không đc để trống";
    }
    ?>
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

