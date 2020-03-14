<?php
class homeController
{
    public function countAll()
    {
        require '../models/productModel.php';
        $productModel = new productModel();
        $products = $productModel->getProduct();
        require '../views/homeView.php';
        $admin = new homeView();
        $admin->page_admin($products);
    }
}
