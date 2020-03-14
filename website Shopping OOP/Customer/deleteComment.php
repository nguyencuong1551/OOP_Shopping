<?php
include "../data.php";
$data = new databaseShopping();
$id = $_GET['id'];
$idSp = $_GET['idSp'];
$page = $_GET['page'];
$data->crud("DELETE FROM comments WHERE id='$id'");
header("location:detailProduct.php?id=$idSp&page=$page");

