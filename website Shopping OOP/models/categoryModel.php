<?php
require_once "../models/dbModel.php";
class categoryModel extends database
{
    public function getCategory()
    {
        $categories = array();
        $this->select("SELECT * FROM categories");
       while ($getCategory = $this->fetch())
       {
           $categories[] = $getCategory;
       }
        return $categories;
    }
    public function deleteCategory($getCategory_id)
    {
         $status = $this->crud("DELETE FROM categories WHERE id = '$getCategory_id' ");
        return $status;
    }
    public function getAdd($category)
    {
        $getCategory_name = $category['name'];
        $getCategory_id_parent = $category['id_parent'];
        $status = $this->crud
        ("INSERT INTO categories VALUES (null ,'$getCategory_name','$getCategory_id_parent',current_timestamp (),current_timestamp())");
        return $status;
    }
    public function editCategory($id)
    {
        $this->select("SELECT * FROM categories WHERE id = '$id'");
        $category = $this->fetch();
        return $category;
    }
    public function getEdit($category)
    {
        $getCategory_id = $category['id'];
        $getCategory_name = $category['name'];
        $getCategory_id_parent = $category['id_parent'];
        $status = $this->crud
    ("UPDATE categories SET name = '$getCategory_name',id_parent='$getCategory_id_parent' WHERE id ='$getCategory_id' ");
        return $status;
    }
}
