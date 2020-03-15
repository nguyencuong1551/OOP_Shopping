<?php
require_once "../models/dbModel.php";
class productModel extends database
{
    public function getProduct()
    {
        $products = array();
        $this->select("SELECT * FROM products");
        while ($getProduct = $this->fetch())
        {
            $products[] = $getProduct;
        }
        return $products;
    }
    public function addProduct($product)
    {
            $getProduct_name = $product['name'];
            $getProduct_image = $product['image'];
            $getProduct_image1 = $product['image1'];
            $getProduct_image2 = $product['image2'];
            $getProduct_image3 = $product['image3'];
            $getProduct_description = $product['description'];
            $getProduct_unit_price = $product['unit_price'];
            $getProduct_promotion_price = $product['promotion_price'];
            $getProduct_id_category = $product['id_category'];
            $getProduct_id_event = $product['id_event'];
            $status = $this->crud("INSERT INTO products VALUES (null,'$getProduct_name','$getProduct_image','$getProduct_image1',
'$getProduct_image2','$getProduct_image3','$getProduct_description','$getProduct_unit_price','$getProduct_promotion_price',
'$getProduct_id_category','$getProduct_id_event',current_timestamp(),current_timestamp ())");
            return $status;
    }
    public function deleteProduct($getProduct_id)
    {
        $status =$this->crud("DELETE FROM products WHERE id = '$getProduct_id'");
        return $status;
    }
    public function editProduct($getProduct_id)
    {
        $this->select("SELECT * FROM products WHERE id = '$getProduct_id'");
        $product = $this->fetch();
        return $product;
    }
    public function getEdit($product,$getProduct_id)
    {
        $getProduct_name = $product['name'];
        $getProduct_image = $product['image'];
        $getProduct_image1 = $product['image1'];
        $getProduct_image2 = $product['image2'];
        $getProduct_image3 = $product['image3'];
        $getProduct_description = $product['description'];
        $getProduct_unit_price = $product['unit_price'];
        $getProduct_promotion_price = $product['promotion_price'];
        $getProduct_id_category = $product['id_category'];
        $getProduct_id_event = $product['id_event'];
        $status = $this->crud("UPDATE products SET name='$getProduct_name',image='$getProduct_image',image1='$getProduct_image1',
image2='$getProduct_image2',image3='$getProduct_image3',description='$getProduct_description',unit_price='$getProduct_unit_price',promotion_price='$getProduct_promotion_price',
id_category='$getProduct_id_category',id_event='$getProduct_id_event'WHERE id = '$getProduct_id'");
        return $status;
    }
    public function searchProduct($key)
    {
        $products = array();
        $this->select("SELECT * FROM products WHERE name like '%$key%'");
        while ($getProduct = $this->fetch())
        {
            $products[] = $getProduct;
        }
        return $products;
    }
    public function countProduct()
    {
        $countProducts = $this->count("SELECT COUNT(id) AS total FROM products");
        return $countProducts;
    }
}
