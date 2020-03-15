<?php
class productView
{
    public function showAllProduct($products)
    {
        require '../templates/allProduct.php';
    }
    public function addProduct($events,$categories)
    {
        require '../templates/addProduct.php';
    }
    public function getAdd($status)
    {
        require '../templates/getAdd.php';
    }
    public function deleteProduct($status)
    {
        require '../templates/getAdd.php';
    }
    public function editProduct($product,$events,$categories)
    {
        require '../templates/editProduct.php';
    }
    public function getEdit($status)
    {
        require '../templates/getAdd.php';
    }
    public function searchProduct($products,$key)
    {
        require_once '../templates/searchProduct.php';
    }
}
