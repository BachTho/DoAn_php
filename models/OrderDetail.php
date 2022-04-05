<?php
require_once('models/Connection.php');
require_once('models/Query.php');
class OrderDetail extends Query
{
    var $table = "order_detail";
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {

        $order = $this->select($this->table, ['id', 'product_name', 'product_image', 'price', 'amount', 'total', 'order_id']);

        return $order;
    }

    public function create($data)
    {
        $status = $this->insert($this->table, $data);
        return $status;
    }

    // lay du lieu orderdetail theo id order
    public function getOrderDetailbyid($id)
    {
        $query = "SELECT order_detail.*  FROM order_detail inner join orders on order_detail.order_id = orders.id
	WHERE order_detail.order_id =" . $id;
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
