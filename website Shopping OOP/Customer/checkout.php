<?php
session_start();

if(empty($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}
$_SESSION['cart'][] = $_GET['id'];

header("location:index.php");