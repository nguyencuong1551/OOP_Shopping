<?php
class categoryView
{
    public function getCategory($categories)
    {
        require_once '../templates/allCategory.php';
    }
    public function deleteCategory($status)
    {
        require_once '../templates/getAdd.php';
    }
    public function addCategory()
    {
        require_once '../templates/addCategory.php';
    }
    public function getAdd($status)
    {
        require_once '../templates/getAdd.php';
    }
    public function editCategory($category)
    {
        require_once '../templates/editCategory.php';
    }
    public function getEdit($status)
    {
        require_once '../templates/getAdd.php';
    }
}
