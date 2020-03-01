<?php
include "header.php";
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <p><a class="btn btn-lg btn btn-outline-light" href="#" role="button">Sale up to 70%</a></p>
                        </div>
                    </div>
                    <img src="https://media3.scdn.vn/img3/2019/4_19/fs7H9j.jpg" style="width: 100%;height: 290px" >
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <p><a class="btn btn-lg btn-outline-light" href="#" role="button">Sale up to 70%</a></p>
                        </div>
                    </div>
                    <img src="https://media3.scdn.vn/img3/2019/4_17/LJUfPO.jpg" style="width: 100%;height: 290px" >
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <p><a class="btn btn-lg btn-outline-light" href="#" role="button">Sale up to 70%</a></p>
                        </div>
                    </div>
                    <img src="https://media3.scdn.vn/img3/2019/4_22/p9Mcs9.jpg" style="width: 100%;height: 290px" >
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
        <div id="showCategoryProduct">
            <div class="row col-auto">
                <?php
                // Tổng số bản ghi trong 1 trang và tính tổng số trang

                $getIdCategory = addslashes($_GET['id']);
                $number_page = $data->number_page("SELECT COUNT(id) AS total FROM products WHERE id_category = '$getIdCategory'", 8);
                // Trang hiện tại
                $current_page = $data->checkCurrent_page("SELECT COUNT(id) AS total FROM products WHERE id_category ='$getIdCategory'",8);
                // Xác định bản ghi đầu tiên của trang
                $start = $data->countStart("SELECT COUNT(id) AS total FROM products WHERE id_category = '$getIdCategory'",8);
                if (isset($getId) && $data->checkNumber($getIdCategory) && $data->checkNull($getIdCategory))
                { //truy vấn và hiển thị nội dung của trang
                    $data->select("SELECT * FROM products WHERE id_category = '$getIdCategory' LIMIT $start, 8");
                    while ($getProduct = $data->fetch())
                    {
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
                                <div class=\"text-muted\">Giá: <strike>$getUnit_price</strike></div>
                                <div class=\"mb-1 text-danger\">Giá khuyến mại: $getPromotion_price</div>
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
                                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"showCategory.php?id=$getIdCategory&page=$prev\">Prev</a></li>";
                            }
                            // Nút số
                            for ($i = 1; $i <= $number_page; $i++) {
                                if ($current_page != $i) {
                                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"showCategory.php?id=$getIdCategory&page=$i\">$i</a></li>";
                                } else echo "<li class=\"page-item\"><a class=\"page-link\">$i</a></li>";
                            }
                            // Next
                            if ($current_page < $number_page) {
                                $next = $current_page + 1;
                                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"showCategory.php?id=$getIdCategory&page=$next\">Next</a></li>";
                            }
                            ?>
                        </ul>
                    </nav></div>
            </div>
        </div>
    </main>
<?php
include "footer.php";?>