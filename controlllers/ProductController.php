
<?php
require_once('models/Category.php');
require_once('controlllers/BaseController.php');
require_once('models/Product.php');
require_once('models/User.php');

require_once('controlllers/AdminController.php');
class ProductController extends AdminController
{

	public function index()
	{
		$productmodel = new Product();
		$categorymodel = new Category();
		$usermodel = new User();
		if (isset($_POST['product_name'])) {
			$id = $_POST['product_name'];
			$listproduct = $productmodel->findproductsadmin($id);
		} else {
			$listproduct = $productmodel->getList();
		}
		$products = array();
		foreach ($listproduct as $product) {
			$idcategory = $product['category_id'];
			$category = $categorymodel->find($idcategory);
			$product['categoryname'] = $category['category_name'];

			$iduser = $product['user_id'];
			$user = $usermodel->find($iduser);
			$product['username'] = $user['fullname'];
			$products[] = $product;
		}
		if (isset($products)) {
			for ($i = 0; $i < sizeof($products); $i++) {
				if ($products[$i]['status'] == 0) {
					$products[$i]['status'] = 'Vô hiệu';
					$products[$i]['activate'] = 'Mở khóa';
				} else {
					$products[$i]['status'] = 'Kích hoạt';
					$products[$i]['activate'] = 'Khóa';
				}
			}
		}

		require_once('views/products/list.php');
	}

	public function detail()
	{
	}

	public  function create()
	{
		$category = new Category();
		$categories = $category->getList();
		$this->view('products/create.php', ['categories' => $categories]);
	}

	public  function store()
	{
		$data = $_POST;
		if ($data['promotionalprice'] > $data['originalprice']) {
			$_SESSION['error']['price'] = "giá khuyến mãi phải nhỏ hơn giá gốc chứ!";
			$this->redirect('index.php?mod=product&act=create');
		} else {
			$data['status'] = 1;
			$data['sold'] = 0;
			$data['product_slug'] = to_slug($data['product_name']) . strtotime(date('Y-m-d H:i:s'));
			$data['user_id'] = $_SESSION['auth']['id'];
			$target_dir = "assets/image/";  // thư mục chứa file upload
			$target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên 
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
				$img = array('image' => $_FILES["image"]["name"]);
				$data = array_merge($data, $img);
			} else { // Upload file có lỗi
				echo "Sorry, there was an error uploading your file.";
			}
			$target_file = $target_dir . basename($_FILES["image1"]["name"]); // link sẽ upload file lên 
			if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
				$img = array('image1' => $_FILES["image1"]["name"]);
				$data = array_merge($data, $img);
			} else { // Upload file có lỗi
				echo "Sorry, there was an error uploading your file.";
			}
			$target_file = $target_dir . basename($_FILES["image2"]["name"]); // link sẽ upload file lên 
			if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
				$img = array('image2' => $_FILES["image2"]["name"]);
				$data = array_merge($data, $img);
			} else { // Upload file có lỗi
				echo "Sorry, there was an error uploading your file.";
			}


			$productmodel = new Product();
			$success = $productmodel->create($data);

			if ($success) {
				setcookie('success', 'Thêm mới thành công', time() + 1);
			}
			$this->redirect('index.php?mod=product&act=index');
		}
	}

	public function edit()
	{
		$id = $_GET['id'];
		$productmodel = new Product();
		// $status = $category->create($data_insert);
		$success = $productmodel->find($id);
		$category = new Category();
		$categories = $category->getList();
		require_once('Views/products/edit.php');
	}


	public function update()
	{
		$data = $_POST;

		$data['product_slug'] = to_slug($data['product_name']) . strtotime(date('Y-m-d H:i:s'));
		$data['user_id'] = $_SESSION['auth']['id'];

		$target_dir = "assets/image/";  // thư mục chứa file upload
		$target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên 
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
			$img = array('image' => $_FILES["image"]["name"]);
			$data = array_merge($data, $img);
		} else { // Upload file có lỗi
			echo "Sorry, there was an error uploading your file.";
		}

		$target_file = $target_dir . basename($_FILES["image1"]["name"]); // link sẽ upload file lên 
		if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
			$img = array('image1' => $_FILES["image1"]["name"]);
			$data = array_merge($data, $img);
		} else { // Upload file có lỗi
			echo "Sorry, there was an error uploading your file.";
		}
		$target_file = $target_dir . basename($_FILES["image2"]["name"]); // link sẽ upload file lên 
		if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
			$img = array('image2' => $_FILES["image2"]["name"]);
			$data = array_merge($data, $img);
		} else { // Upload file có lỗi
			echo "Sorry, there was an error uploading your file.";
		}



		$productmodel = new Product();

		$update = $productmodel->update($data);
		if ($update) {
			setcookie('update', 'Cập nhật thành công', time() + 1);
		}
		// $this->redirect('index.php?mod=category&act=list');
		header('Location:index.php?mod=product&act=index');
	}

	public function xoa1()
	{
		$id = (isset($_GET['id']) ? $_GET['id'] : 0);
		$productmodel = new Product();
		$delete = $productmodel->xoa($id);
		if ($delete) {
			setcookie('delete', 'Xóa thành công', time() + 1);
		}
		$this->redirect('index.php?mod=product&act=index');
	}

	public function activate()
	{
		$id  = $_GET['id'];
		
		$productmodel = new Product();
		
		$products = $productmodel->find($id);
	
		if($products['status']==0){
			$products['status'] = 1;
		}
		else {
			$products['status'] = 0;
		}
	
		
		$update = $productmodel->update($products);
		if ($update) {
			setcookie('update', 'Cập nhật trạng thái thành công', time() + 1);
		}
		header('Location:index.php?mod=product&act=index');
	}
}
?>
