<?php
class databaseShopping
{
    private $conn = null;
    private $result = null;
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $datatable = "KLTN";
    public function connect()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->datatable) or die("Fail");
    }
    public function select($sql)
    {
        $this->connect();
        $this->result = $this->conn->query($sql);
    }
    public function fetch()
    {
        if ($this->result->num_rows > 0)
        {
            $rows = $this->result->fetch_assoc();
        }else $rows = 0;
        return $rows;
    }
    public function crud($sql)
    {
        $this->connect();
        $this->conn->query($sql);
    }
    public function checkNull($check)
    {
        if (!empty($check))
        {
            return true;
        }else return false;
    }
    public function checkNumber($check)
    {
        if (is_numeric($check))
        {
            return true;
        }else return false;
    }
    public function number_page($sqlCountRecord,$limit)
    {
        $this->select($sqlCountRecord);
        $row = $this->fetch();
        $total_record = $row['total'];
        if($total_record > $limit)
        {
            $number_page = ceil($total_record/$limit);
        }
        return $number_page;
    }
    public function checkCurrent_page($sqlCountRecord, $limit)
    {
        if (isset($_GET['page']) && $_GET['page'] >= 1
            && $_GET['page'] <= $this->number_page($sqlCountRecord, $limit)
            && $this->checkNumber($_GET['page']))
        {
            $current_page = $_GET['page'];
        }else $current_page = 1;
        return $current_page;
    }
    public function countStart($sqlCountRecord, $limit)
    {
        $start = ($this->checkCurrent_page($sqlCountRecord, $limit)-1)*$limit;
        return $start;
    }
}