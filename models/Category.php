<?php
require_once('models/Connection.php');
require_once('models/Query.php');
class Category extends Query
{
	var $table = "categories";

	public function __construct()
	{
		parent::__construct();
	}

	// lay du lieu category theo id tim kiem
	public function findCategoriesAdmin($id)
	{
		$categories = $this->whereLike($this->table,['category_name' =>"$id"]);

		return $categories;
	}

	 // lay du lieu theo status =1(kích hoat)
	 public function getListCategoriesByStatus()
	 {
		 $orders = $this->whereLike($this->table, ['status' => "1"]);
 
		 return $orders;
	 }

	public function getList()
	{
		$categories = $this->select($this->table, ['id', 'category_name', 'status', 'category_slug']);

		return $categories;
	}

	public function create($data)
	{
		$status = $this->insert($this->table, $data);
		return $status;
	}

	public function find($id)
	{
		$category = $this->getId($this->table, $id);
		return $category;
	}

	public function xoa($id)
	{
		$delete1 = $this->delete($this->table, $id);
		return $delete1;
	}


}
?>
