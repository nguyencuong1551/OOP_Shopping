<?php
class homeController
{
    public function countAll()
    {
        require '../models/productModel.php';
        $productModel = new productModel();
        $countProducts = $productModel->countProduct();
        require '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $countCategories = $categoryModel->countCategory();
        require '../models/eventModel.php';
        $eventModel = new eventModel();
        $countEvents = $eventModel->countEvent();
        require '../models/billModel.php';
        $billModel = new billModel();
        $countBills = $billModel->countBill();
        $count = array(
            'products' => $countProducts,
            'categories' => $countCategories,
            'events'=>$countEvents,
            'bills'=>$countBills
        );
        require_once '../views/homeView.php';
        $homeView = new homeView();
        $homeView->page_admin($count);
    }
}
