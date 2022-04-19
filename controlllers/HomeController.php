<?php
require_once('models/User.php');
require_once('models/Category.php');
require_once('models/Product.php');
require_once('models/Order.php');
require_once('models/OrderDetail.php');

require_once('controlllers/BaseController.php');

class HomeController extends BaseController
{
	// home
	public function index()
	{
		$ProductModel = new Product();
		$CategoryModel = new Category();
		// lấy ra 3 san phẩm bán nhiều nhất
		$ListProductsTop3ByViewCount =  $ProductModel->GetTop3ByViewCount();
		// 4 san phẩm bán chạy sao top 1
		$ListProductsTop4ByCreated =  $ProductModel->GetTop4ByCreate();
		// top1 tạo theo thời gian
		$products =  $ProductModel->GetTop1ByCreate();
		$ListProductsTop1ByCreated = array();
		foreach ($products as $product) {
			$idcategory = $product['category_id'];
			$category = $CategoryModel->find($idcategory);
			$product['categoryname'] = $category['category_name'];
			$ListProductsTop1ByCreated[] = $product;
		}

		require_once('views/home/list.php');
	}
	// danh sach product
	public function listProduct()
	{
		require_once('views/home/listproduct.php');
	}

	// danh sach product theo category
	public function productbycategory()
	{
		$id = $_GET['id'];
		$ProductModel = new Product();
		$ListProductsByCategory = $ProductModel->getPostsbyid($id);
		require_once('views/home/listProductsByCategory.php');
	}
	// chi tiết post
	public function detailProduct()
	{
		$id = $_GET['id'];
		$ProductModel = new Product();
		$CategoryModel = new Category();
		$DetailProduct = $ProductModel->find($id);

		$idcategory = $DetailProduct['category_id'];
		$category = $CategoryModel->find($idcategory);
		$DetailProduct['categoryname'] = $category['category_name'];
		$DetailProduct['id_product'] = $DetailProduct['id'];

		require_once('views/home/detailproduct.php');
	}

	// danh sach product theo tìm kiếm 
	public function listProductBySearch()
	{
		$id = $_POST['product_name'];
		$ProductModel = new Product();
		$ListProductsBySearch = $ProductModel->findproductsFrontEnd($id);
		$success = $ListProductsBySearch;
		if ($success) {
			setcookie('success', 'Thêm mới thành công', time() + 3);
		}
		require_once('views/home/listProductBySearch.php');
	}

	// danh sach sản phẩm theo bộ lọc
	public function listproductByFilter()
	{
		$ProductModel = new Product();
		$filter = 0;
		if (isset($_GET['filter'])) {
			$filter = $_GET['filter'];
		}

		switch ($filter) {
			case 3:
				$listproductByFilter = $ProductModel->GetListByName();
				break;
			case 2:
				$listproductByFilter = $ProductModel->GetListByPriceDesc();
				break;
			case 1:
				$listproductByFilter = $ProductModel->GetListByPriceAsc();
				break;
			case 4:
				$listproductByFilter = $ProductModel->GetListByViewCount();
				break;
			default:
				$listproductByFilter = $ProductModel->getList();
				break;
		}

		require_once('views/home/listProductByFilter.php');
	}

	// danh sach category trên footer
	public function listCart()
	{
		
		// session_destroy();
		// 	die();
		if (isset($_GET['action'])) {
			$action = $_GET['action'];
		}
		$ProductModel = new Product();

		if (isset($_GET['msp'])) {
			$msp = $_GET['msp'];
			$products = $ProductModel->find($msp);
			switch ($action) {
				case 1:

					if (!isset($_SESSION['carts']) || empty($_SESSION['carts'])) {
						$_SESSION['carts'][$msp] = $products;
						$_SESSION['carts'][$msp]['soluong'] = 1;
					} else {
						// ham nay dung de kiem tra id có chua neu co tang sl len
						if (array_key_exists($msp, $_SESSION['carts'])) {
							$_SESSION['carts'][$msp]['soluong']++;
						} else {
							$_SESSION['carts'][$msp] = $products;
							$_SESSION['carts'][$msp]['soluong'] = 1;
						}
					}
					$_SESSION['success']['cart'] = 'Sản phẩm đã thêm thành công';
					break;
				case 2:
					if ($_SESSION['carts'][$msp]['soluong'] > 1) {
						$_SESSION['carts'][$msp]['soluong']--;
						$_SESSION['success']['cart'] = 'Số lượng sản phẩm đã giảm đi một';
					} else {
						unset($_SESSION['carts'][$msp]);
						$_SESSION['success']['cart'] = 'Sản phẩm đã bị xóa khỏi giỏi hàng';
					}

					break;
				case 3:
					unset($_SESSION['carts'][$msp]);
					$_SESSION['success']['cart'] = 'Sản phẩm đã bị xóa khỏi giỏi hàng';
					break;
			}
		}
		if (isset($_SESSION['carts'])) {
			$ListCarts = $_SESSION['carts'];
		} else {
			$ListCarts = [];
		}
		require_once('views/home/listCart.php');
	}
	public function notification()
	{
		$_SESSION['error']['cart'] =  'Sản phẩm đã vượt quá số lượng trong kho';
		$this->redirect('index.php?mod=home&act=listCart');
	}
	// Xác nhận đơn hàng vs địa chỉ giao
	public function Order()
	{
		foreach ($_POST['products'] as $id) {
			if ($_SESSION['carts'][$id]['soluong'] < $_SESSION['carts'][$id]['amount']) {
				$items[$id] = $_SESSION['carts'][$id];
			} else {
				$this->redirect('index.php?mod=home&act=notification');
			
			}
		}
		$data = $_POST;
		if (isset($_SESSION['auth']['id'])) {
			$UserModel = new User();
			$User = $UserModel->find($data['id_username']);
		} else {
			$this->redirect('index.php?mod=auth&act=login');
		}
		$this->view('home/order.php', [
			'item' => $items,
			'User' => $User,
			'Data' => $data['tong'],
		]);
	}

	public function store()
	{
		$ProductModel = new Product();
		$datauser['id'] = $_POST['user_id'];
		$datauser['sdt'] = $_POST['phone'];
		$datauser['address'] = $_POST['address'];
		$datauser['fullname'] = $_POST['name'];

		// dung de cap nhat dia chỉ thong tin
		$user = new User();
		$update = $user->update($datauser);

		// dung de cap nhat trang don hang
		$data['user_id'] = $_POST['user_id'];
		$data['total'] = $_POST['tong'];
		$data['status'] = 0;

		$OrderModel = new Order();
		$LastId = $OrderModel->create($data);
		// dung de tao trang chi tiet don hang
		$item = array();
		for ($i = 0; $i < sizeof($_POST['masp']); $i++) {
			$products = $ProductModel->find($_POST['masp'][$i]);
		
			$products['amount']= $products['amount'] - $_POST['soluong'][$i];
			$products['sold']= $products['sold'] + $_POST['soluong'][$i];
			$ProductModel = new Product();
			$ProductModel->update($products);
		
			$item[$i]['product_name'] = $products['product_name'];
			$item[$i]['product_image'] = $products['image'];
			$item[$i]['price'] = $products['promotionalprice'];
			$item[$i]['amount'] = $_POST['soluong'][$i];
			$item[$i]['total'] = $products['promotionalprice'] * $_POST['soluong'][$i];
			$item[$i]['order_id'] = $LastId;


			$OrderDetailModel = new Orderdetail();
			$success = $OrderDetailModel->create($item[$i]);
		}
		$_SESSION['success']['cart'] = 'Đơn hàng đang được xử lý';
		// dat thành công thì xóa di giỏ hàng
		unset($_SESSION['carts']);
		if ($success) {
			setcookie('success', 'Thêm mới thành công', time() + 3);
		}
		$this->redirect('index.php?mod=home&act=index');
	}

	// danh sách don hang của user
	public function listOrder()
	{

		$OrderModel = new Order();
		if (isset($_GET['id_user'])) {
			$id_user = $_GET['id_user'];
			$ListOrders = $OrderModel->getOrderbyiduser($id_user);
		}
		if (isset($ListOrders)) {
			for ($i = 0; $i < sizeof($ListOrders); $i++) {
				if ($ListOrders[$i]['status'] == 0) {
					$ListOrders[$i]['status'] = 'Đang chờ duyệt';
				}
				if ($ListOrders[$i]['status'] == 1) {
					$ListOrders[$i]['status'] = 'Đã duyệt';
				}
				if ($ListOrders[$i]['status'] == 2) {
					$ListOrders[$i]['status'] = 'Đang giao hàng';
				}
				if ($ListOrders[$i]['status'] == 3) {
					$ListOrders[$i]['status'] = 'Giao thành công';
				}
			}
		}

		require_once('views/home/listorder.php');
	}

	public function update()
	{
		$OrderModel = new Order();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$Order = $OrderModel->find($id);

			$Order['status'] = 3;
		}

		$OrderModel->update($Order);
	
		$_SESSION['success']['delivery'] =  'Hy vọng bạn sẽ tiếp tục ủng hộ shop <3';
		$this->redirect('index.php?mod=home&act=index');
	}

	// chi tiet cac san pham da dat
	public function detailOrder()
	{

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		}
		$OrderModel = new Order();
		$Order = $OrderModel->find($id);
		$OrderDetailModel = new OrderDetail();
		$ListOrderDetails = $OrderDetailModel->getOrderDetailbyid($id);
		require_once('views/home/detailorder.php');
	}

	// chức năng livestream
	public function livestream(){
		require_once('views/home/livestream.php');
	}

	// về chúng tôi
	public function about()
	{
		require_once('views/home/about.php');
	}
}
