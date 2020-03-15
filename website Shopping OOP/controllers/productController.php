<?php
class productController
{
    public function getProduct()
    {
        require '../models/productModel.php';
        $productModel = new productModel();
        $products =  $productModel->getProduct();
        require '../views/productView.php';
        $productView = new productView();
        $productView->showAllProduct($products);
    }
    public function addProduct()
    {
        require '../models/eventModel.php';
        $evenModel = new eventModel();
        $events = $evenModel->getEvent();
        require '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $categories = $categoryModel->getCategory();
        require '../views/productView.php';
        $productView = new productView();
        $productView->addProduct($events,$categories);
    }
    public function getAdd()
    {
        $getProduct_name = $_POST['name'];
        $getProduct_image = $_POST['image'];
        $getProduct_image1 = $_POST['image1'];
        $getProduct_image2 = $_POST['image2'];
        $getProduct_image3 = $_POST['image3'];
        $getProduct_description = $_POST['description'];
        $getProduct_unit_price = $_POST['unit_price'];
        $getProduct_promotion_price = $_POST['promotion_price'];
        $getProduct_id_category = $_POST['id_category'];
        $getProduct_id_event = $_POST['id_event'];
        $product = array(
            'name'=>$getProduct_name,
            'image' => $getProduct_image,
            'image1'=>$getProduct_image1,
            'image2'=>$getProduct_image2,
            'image3'=>$getProduct_image3,
            'description'=>$getProduct_description,
            'unit_price'=>$getProduct_unit_price,
            'promotion_price'=>$getProduct_promotion_price,
            'id_category'=>$getProduct_id_category,
            'id_event'=>$getProduct_id_event
        );
        require '../models/productModel.php';
        $productModel = new productModel();
        $status = $productModel->addProduct($product);
        require '../views/productView.php';
        $productView = new productView();
        $productView->getAdd($status);
    }
    public function deleteProduct()
    {
        $getProduct_id = $_GET['id'];
        require '../models/productModel.php';
        $productModel = new productModel();
        $status = $productModel->deleteProduct($getProduct_id);
        require '../views/productView.php';
        $productView = new productView();
        $productView->deleteProduct($status);
    }
    public function editProduct()
    {
        $getProduct_id = $_GET['id'];
        require '../models/productModel.php';
        $productModel = new productModel();
        $product = $productModel->editProduct($getProduct_id);
        require '../models/eventModel.php';
        $evenModel = new eventModel();
        $events = $evenModel->getEvent();
        require '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $categories = $categoryModel->getCategory();
        require '../views/productView.php';
        $productView = new productView();
        $productView->editProduct($product,$events,$categories);
    }
    public function getEdit()
    {
        $getProduct_id = $_GET['id'];
        $getProduct_name = $_POST['name'];
        $getProduct_image = $_POST['image'];
        $getProduct_image1 = $_POST['image1'];
        $getProduct_image2 = $_POST['image2'];
        $getProduct_image3 = $_POST['image3'];
        $getProduct_description = $_POST['description'];
        $getProduct_unit_price = $_POST['unit_price'];
        $getProduct_promotion_price = $_POST['promotion_price'];
        $getProduct_id_category = $_POST['id_category'];
        $getProduct_id_event = $_POST['id_event'];
        $product = array(
            'name'=>$getProduct_name,
            'image' => $getProduct_image,
            'image1'=>$getProduct_image1,
            'image2'=>$getProduct_image2,
            'image3'=>$getProduct_image3,
            'description'=>$getProduct_description,
            'unit_price'=>$getProduct_unit_price,
            'promotion_price'=>$getProduct_promotion_price,
            'id_category'=>$getProduct_id_category,
            'id_event'=>$getProduct_id_event
        );
        require '../models/productModel.php';
        $productModel = new productModel();
        $status = $productModel->getEdit($product,$getProduct_id);
        require '../views/productView.php';
        $productView = new productView();
        $productView->getEdit($status);
    }
    public function searchProduct()
    {
        $key = $_POST['key'];
        require_once '../models/productModel.php';
        $productModel = new productModel();
        $products = $productModel->searchProduct($key);
        require_once '../views/productView.php';
        $productView = new productView();
        $productView->searchProduct($products,$key);
    }
}
