<?php
class categoryController
{
    public function __construct()
    {

    }
    public function getCategory()
    {
        require_once '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $categories = $categoryModel->getCategory();
        require_once '../views/categoryView.php';
        $categoryView = new categoryView();
        $categoryView->getCategory($categories);
    }
    public function deleteCategory()
    {
        $getCategory_id = $_GET['id'];
        require_once '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $status = $categoryModel->deleteCategory($getCategory_id);
        require_once '../views/categoryView.php';
        $categoryView = new categoryView();
        $categoryView->deleteCategory($status);
    }
    public function addCategory()
    {
        require_once '../views/categoryView.php';
        $categoryView = new categoryView();
        $categoryView->addCategory();
    }
    public function getAdd()
    {
        $getCategory_name = $_POST['name'];
        $getCategory_id_parent = $_POST['id_parent'];
        $category = array(
            'name' => $getCategory_name,
            'id_parent'=>$getCategory_id_parent
        );
        require_once '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $status = $categoryModel->getAdd($category);
        require_once '../views/categoryView.php';
        $categoryView = new categoryView();
        $categoryView->getAdd($status);
    }
    public function editCategory()
    {
        $id = $_GET['id'];
        require_once '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $category = $categoryModel->editCategory($id);
        require_once '../views/categoryView.php';
        $categoryView = new categoryView();
        $categoryView->editCategory($category);
    }
    public function getEdit()
    {
        $getCategory_id = $_GET['id'];
        $getCategory_name = $_POST['name'];
        $getCategory_id_parent = $_POST['id_parent'];
        $category = array(
            'id' => $getCategory_id,
            'name' => $getCategory_name,
            'id_parent'=>$getCategory_id_parent
        );
        require_once '../models/categoryModel.php';
        $categoryModel = new categoryModel();
        $status = $categoryModel->getEdit($category);
        require_once '../views/categoryView.php';
        $categoryView = new categoryView();
        $categoryView->getEdit($status);
    }
}
