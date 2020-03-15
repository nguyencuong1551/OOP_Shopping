<?php
class billController
{
    public function getBill()
    {
        require_once '../models/billModel.php';
        $billModel = new billModel();
        $bills = $billModel->getBill();
        require_once '../views/billView.php';
        $billView = new billView();
        $billView->getBill($bills);
    }
    public function deleteBill()
    {
        $id = $_GET['id'];
        require_once '../models/billModel.php';
        $billModel = new billModel();
        $status = $billModel->deleteBill($id);
        require_once '../views/billView.php';
        $billView = new billView();
        $billView->deleteBill($status);
    }
}
