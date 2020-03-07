<?php
session_start();
include "../data.php";
$data = new databaseShopping();
$id = $_GET['id'];
$data->select("SELECT * FROM products WHERE id = $id");
$getProduct = $data->fetch();
    if (isset($_SESSION['cart'])) {
        //kiem tra xem sp da ton tai trong gio hang hay chua
        if (isset($_SESSION['cart'][$id]['qty'])) {
            $_SESSION['cart'][$id]['qty'] += 1;

        } else {
            $_SESSION['cart'][$id]['qty'] = 1;
        }
        $_SESSION['cart'][$id]['name'] = $getProduct['name'];
        $_SESSION['cart'][$id]['unit_price'] = $getProduct['unit_price'];
        $_SESSION['status'] = "Đã thêm vào giỏ hàng";
    } else {
        $_SESSION['cart'][$id]['qty'] = 1;
        $_SESSION['cart'][$id]['name'] = $getProduct['name'];
        $_SESSION['cart'][$id]['unit_price'] = $getProduct['unit_price'];
        $_SESSION['status'] = "Đã tạo giỏ hàng";
    }
    header("location:index.php ");