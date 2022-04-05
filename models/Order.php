<?php
require_once('models/Connection.php');
require_once('models/Query.php');
class Order extends Query
{
    var $table = "orders";
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {

        $order = $this->select($this->table, ['id', 'user_id', 'total', 'status', 'create_at']);

        return $order;
    }

    public function create($data)
    {
        $status = $this->insert($this->table, $data);
        return $status;
    }

    // lay du lieu order theo status dang chờ duyệt
    public function findOrderByStatusProcessing()
    {
        $orders = $this->whereLike($this->table, ['status' => "0"]);

        return $orders;
    }

    // lay du lieu order theo status đã duyệt
    public function findOrderByStatusProcessed()
    {
        $orders = $this->whereLike($this->table, ['status' => "1"]);

        return $orders;
    }

    // lay du lieu order theo status đang giao
    public function findOrderByStatusDelivering()
    {
        $orders = $this->whereLike($this->table, ['status' => "2"]);

        return $orders;
    }

    // lay du lieu order theo status đã hoàn thành
    public function findOrderByStatusComplete()
    {
        $orders = $this->whereLike($this->table, ['status' => "3"]);

        return $orders;
    }

    // tìm kiếm
    public function find($id)
	{
		$orders = $this->getId($this->table, $id);
		// var_dump($products);
		// die();
		return $orders;
	}

    public function getOrderbyiduser($id)
	{
		$query = "SELECT orders.*  FROM orders inner join users on orders.user_id = users.id
	WHERE orders.user_id =" . $id;

		$result = $this->conn->query($query);
		// Buoc 3
		// Tạo 1 mảng để chứa dữ liệu
		$data = array();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		};
		return $data;
	}

}
