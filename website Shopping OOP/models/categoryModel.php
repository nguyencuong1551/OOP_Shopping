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
}
