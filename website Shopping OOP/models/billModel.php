<?php
require_once '../models/dbModel.php';
class billModel extends database
{
    public function getBill()
    {
        $bills = array();
        $this->select("SELECT * FROM bills");
        while ($getBill = $this->fetch())
        {
            $bills[]= $getBill;
        }
        return $bills;
    }
    public function deleteBill($id)
    {
        $status = $this->crud("DELETE FROM bills WHERE id ='$id'");
        return $status;
    }
    public function countBill()
    {
        $count = $this->count("SELECT COUNT(id) AS total FROM bills");
        return $count;
    }
}
