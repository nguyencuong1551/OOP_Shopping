<?php
class billView
{
    public function getBill($bills)
    {
        require_once '../templates/allBill.php';
    }
    public function deleteBill($status)
    {
        require_once '../templates/getAdd.php';
    }
}
