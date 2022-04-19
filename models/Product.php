<?php
require_once("models/Query.php");
require_once('models/Connection.php');

class Product extends Query
{
	var $table = "products";

	public function __construct()
	{
		parent::__construct();
	}

	// lay du lieu post theo id category
	public function getPostsbyid($id)
	{
		$query = "SELECT products.*  FROM products inner join categories on products.category_id = categories.id
	WHERE products.status = 1 and products.amount  > 0  and products.category_id =" . $id;


		$result = $this->conn->query($query);
		// Buoc 3
		// Tạo 1 mảng để chứa dữ liệu
		$data = array();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		};
		return $data;
	}

		// lay du lieu post theo so luong con
		public function getPostsbyAmount()
		{
			$query = "SELECT products.*  FROM products inner join categories on products.category_id = categories.id
		WHERE products.amount  > 0 and products.status = 1 ";
			$result = $this->conn->query($query);
			// Buoc 3
			// Tạo 1 mảng để chứa dữ liệu
			$data = array();
	
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			};
			return $data;
		}


	// lay ra 3 sản phẩm có lượt xem nhiều nhất
	public function GetTop3ByViewCount()
	{
		$products = $this->OrderTop($this->table, ' desc limit ', ['sold' => "3"]);

		return $products;
	}

	public function GetTop1ByCreate()
	{
		$products = $this->OrderTop($this->table, ' desc limit ', ['create_at' => "1"]);

		return $products;
	}


	public function GetListByViewCount()
	{
		$products = $this->Arrange($this->table, ' desc ', ['view_count']);

		return $products;
	}
	// sap xep theo gia tang dan
	public function GetListByPriceAsc()
	{
		$products = $this->Arrange($this->table, ' asc ', ['promotionalprice']);

		return $products;
	}
	// sap xep theo gia giam dan
	public function GetListByPriceDesc()
	{
		$products = $this->Arrange($this->table, ' desc ', ['promotionalprice']);

		return $products;
	}

	public function GetListByName()
	{
		$products = $this->Arrange($this->table, ' desc ', ['product_name']);

		return $products;
	}

	public function GetTop4ByCreate()
	{
		$products = $this->OrderTop($this->table, ' desc limit 1,', ['create_at' => "4"]);

		return $products;
	}

	// lay ra toàn bộ sản phẩm
	public function getList()
	{
		$products = $this->select($this->table, ['id', 'product_name', 'image', 'image1', 'image2', 'content', 'originalprice', 'promotionalprice', 'amount','sold', 'status', 'product_slug', 'view_count', 'create_at', 'user_id', 'category_id']);
		return $products;
	}

	public function create($data)
	{
		$status = $this->insert($this->table, $data);
		return $status;
	}

	public function xoa($id)
	{
		$delete1 = $this->delete($this->table, $id);
		return $delete1;
	}

	public function find($id)
	{
		$products = $this->getId($this->table, $id);
		// var_dump($products);
		// die();
		return $products;
	}


	
	// tim theo search trag admin
	public function findproductsadmin($id)
	{
		$products = $this->whereLike($this->table, ['product_name' => "$id"]);

		return $products;
	}

// tim theo search trag front end
public function findproductsFrontEnd($id)
{
	$products = $this->whereLikeFrontEnd($this->table, ['product_name' => "$id"]);

	return $products;
}

	//   // lay du lieu theo id
	public function getSum($id)
	{
		$query = "SELECT * FROM products  WHERE products.status = 1 and category_id =" . $id;

		// Thực thi câu lệnh
		$result =  $this->conn->query($query);
		// var_dump($result->num_rows);
		// die();
		// Trả về 1 bản ghi
		//$row = $result->fetch_assoc();
		return $result->num_rows ;
	}
}
