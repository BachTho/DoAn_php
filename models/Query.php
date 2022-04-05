<?php
require_once('models/Connection.php');
class Query
{
	protected $conn;
	public function __construct()
	{
		$connection = new connection();
		$this->conn = $connection->connect();
	}

	public function select($table, $columns = '*')
	{

		if ($columns == '*') {
			$query = "SELECT * FROM " . $table;
		} elseif (is_array($columns)) {
			$sub_string = '';
			foreach ($columns as $i => $column) {
				$sub_string .= '`' . $column . '`';

				if ($i + 1 != count($columns)) {
					$sub_string .= ',';
				}
			}

			$query = "SELECT " . $sub_string . " FROM " . '`' . $table . '`';
		} else {
			exit();
		}

		$result = $this->conn->query($query);
		// Buoc 3
		// Tạo 1 mảng để chứa dữ liệu
		$data = array();

		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		};
		return $data;
	}

	protected function insert($table, $data)
	{
		$query = "INSERT INTO $table";
		$string_1 = '';
		$string_2 = '';
		$i = 0;

		foreach ($data as $column => $value) {
			$i++;

			$string_1 .= $column;
			if ($i != count($data)) { // Nếu không phải là cột cuối cùng thì mới thêm dấu ,
				$string_1 .= ',';
			}

			$string_2 .= "'" . $value . "'";
			if ($i != count($data)) { // Nếu không phải là giá trị cuối cùng thì mới thêm dấu ,
				$string_2 .= ',';
			}
		}
		$string = ' (' . $string_1 . ')' . ' VALUES ' . '(' . $string_2 . ')';
		$query = $query . $string;
		
		$status = $this->conn->query($query);
		$lastid = mysqli_insert_id($this->conn); 
	
		// var_dump($status);
        // die();
	
		return $lastid;
	}



	//  where like
	protected function whereLike($table, $where = [])
	{

		$query = "SELECT * from $table WHERE ";
		$string = '';
		$i = 0;

		foreach ($where as $column => $value) {

			$i++;
			$string .= "$column like " . " '%" . $value . "%'";

			if ($i != count($where)) { // Nếu không phải là giá trị cuối cùng thì mới thêm dấu ,
				$string .= " AND ";
			}
		}

		$query .= $string;


		$result = $this->conn->query($query);

		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	// HÀM sắp xếp sản phẩm
	protected function Arrange($table, $lệnh, $where = [])
	{
		$query = "SELECT * from $table ORDER BY ";
		$string = '';
		$i = 0;
		foreach ($where as $column) {
			$i++;
			$string .= "$column $lệnh ";

			if ($i != count($where)) { // Nếu không phải là giá trị cuối cùng thì mới thêm dấu ,
				$string .= " AND ";
			}
		}

		$query .= $string;

		$result = $this->conn->query($query);
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}


	// HÀM LẤY RA TOP 
	protected function OrderTop($table, $lệnh, $where = [])
	{
		$query = "SELECT * from $table ORDER BY ";
		$string = '';
		$i = 0;
		foreach ($where as $column => $value) {
			$i++;
			$string .= "$column $lệnh "  . $value;

			if ($i != count($where)) { // Nếu không phải là giá trị cuối cùng thì mới thêm dấu ,
				$string .= " AND ";
			}
		}

		$query .= $string;

		$result = $this->conn->query($query);
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	//  truy van
	protected function where($table, $where = [])
	{
		$query = "SELECT * from $table WHERE ";
		$string = '';
		$i = 0;
		foreach ($where as $column => $value) {
			$i++;
			$string .= "$column=" . "'" . $value . "'";

			if ($i != count($where)) { // Nếu không phải là giá trị cuối cùng thì mới thêm dấu ,
				$string .= " AND ";
			}
		}
		$query .= $string;
		$result = $this->conn->query($query);
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}


	protected function delete($table, $id)
	{
		$query = "DELETE FROM " . $table . " WHERE id = " . $id;
		$result = $this->conn->query($query);
		return $result;
	}
	// update
	public function update($data)
	{
		$values = '';
		foreach ($data as $key => $value) {
			$values .= $key . "='" . $value . "',";
		}
		$values = trim($values, ',');
		$query =  "UPDATE " . $this->table . " SET " . $values . " WHERE id = '" . $data['id'] . "' ";
		// echo $query;
		// die();
		return $this->conn->query($query);
	}


	//   // lay du lieu theo id
	protected function getId($table, $id)
	{
		$query = "SELECT * from $table WHERE id = " . $id;
		
		// Thực thi câu lệnh
		$result =  $this->conn->query($query);

		// Trả về 1 bản ghi
		$row = $result->fetch_assoc();

		return $row;
	}
	//   // lay du lieu theo id
	protected function getCartByUsername($table, $id)
	{
		$query = "SELECT * from $table WHERE user_id = " . $id;
	
		// var_dump($query);
		// die();
		// Thực thi câu lệnh
		$result =  $this->conn->query($query);

		// Trả về 1 bản ghi
		$row = $result->fetch_assoc();

		return $row;
	}
}
