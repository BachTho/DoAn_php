<?php
require_once('controlllers/AdminController.php');

require_once('models/User.php');
class UserController extends AdminController
{

	// khi bật cái này thì lại ko cần login
	public function __construct()
	{
		parent::__construct();
		if (isset($_SESSION['auth']) && ($_SESSION['auth']['role_id'] == 2 || $_SESSION['auth']['role_id'] == 1)) {
			echo 'Bạn không được phép truy cập';
			exit();
		}
		
	}

	public function index()
	{
	
		$usermodle = new User();
		if (isset($_POST['fullname'])) {
			$id = $_POST['fullname'];
			$users = $usermodle->findUseradmin($id);
		} else {
			$users = $usermodle->getList();
		}

		//require_once('Views/auth/list.php');
		$this->view('auth/list.php',[
					'users' =>$users,
				]);
	}

	public  function createadmin()
	{
		$this->view('auth/create.php');
	}

	public  function store()
	{
		$data = $_POST;
		$data['status'] = 1;
		$data['password'] = '1';
		$target_dir = "assets/image/";  // thư mục chứa file upload
		$target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên 
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
			$img = array('image' => $_FILES["image"]["name"]);
			$data = array_merge($data, $img);
		} else { // Upload file có lỗi
			echo "Sorry, there was an error uploading your file.";
		}

		$user = new User();
		if ($user->checkRegister($_POST['email'])) {
			$_SESSION['error']['email'] = 'Email đã tồn tại';
			$this->redirect('index.php?mod=user&act=createadmin');
		} else {
		
			$success = $user->create($data);

			if ($success) {
				setcookie('success', 'Thêm mới thành công', time() + 3);
			}
			$this->redirect('index.php?mod=user&act=index');
		}
	}



	public function edit()
	{
		$id = $_GET['id'];
		$user = new User();
		$success = $user->find($id);
		require_once('Views/auth/edit.php');
	}

	public function update()
	{
		$data = $_POST;
		
		$target_dir = "assets/image/";  // thư mục chứa file upload
		$target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên 
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
			$img = array('image' => $_FILES["image"]["name"]);
			$data = array_merge($data, $img);
		} else { // Upload file có lỗi
			echo "Sorry, there was an error uploading your file.";
		}
		$user = new User();
		$update = $user->update($data);

		if ($update) {
			setcookie('update', 'Cập nhật thành công', time() + 3);
		}
		header('Location:index.php?mod=user&act=index');
	}
	public function delete()
	{
		$id = (isset($_GET['id']) ? $_GET['id'] : 0);
		$user = new User();
		$delete = $user->xoa($id);
		if ($delete) {
			setcookie('delete', 'Xóa thành công', time() + 3);
		}
		$this->redirect('index.php?mod=user&act=index');
	}

	



}
