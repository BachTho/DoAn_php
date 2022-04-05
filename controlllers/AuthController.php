<?php
require_once('controlllers/BaseController.php');
require_once('models/User.php');
class AuthController extends BaseController
{
	public function login()
	{
		$this->view('auth/login.php');
	}

	public function handlelogin()
	{
		$user = new User();

		if (empty($_POST['email']) || empty($_POST['password'])) {
			$_SESSION['empty']['thongtin'] = 'Nhập đầy đủ thông tin bạn ơi';
			$this->redirect('index.php?mod=auth&act=login');
		} else {

			if ($user->checkLogin($_POST['email'], $_POST['password'])) {

				$_SESSION['success']['thongtin'] = 'Chào mừng bạn trở lại <33';
				$this->redirect('index.php?mod=home&act=index');
			} else {

				$_SESSION['error']['saitkmk'] = 'Tài khoản hoặc mật khẩu bạn sai rồi!!!';
				$this->redirect('index.php?mod=auth&act=login');
			}
		}
	}

	public function logoutFrontend()
	{
		unset($_SESSION['auth']);
		$this->redirect('index.php?mod=home&act=index');
	}

	public function logout()
	{
		unset($_SESSION['auth']);
		$this->redirect('index.php?mod=auth&act=login');
	}

	public function reset()
	{
		$this->view('auth/changepassword.php');
	}

	public function update()
	{
		$data = $_POST;
		if ($data['oldpass'] == '') {
			$_SESSION['error']['oldpass'] = "Mật khẩu không được để trống !";
			$this->view('auth/changepassword.php');
		} else if ($data['oldpass'] != $_SESSION['auth']['password']) {
			$_SESSION['error']['checkoldpass'] = "Mật khẩu của bạn sai!";
			$this->view('auth/changepassword.php');
		} else if ($data['newpass'] == '') {
			$_SESSION['error']['newpass'] = "Mật khẩu thay đổi không được để trống !";
			$this->view('auth/changepassword.php');
		} else if ($data['confirmpass'] == '') {
			$_SESSION['error']['confirmpass'] = "Xác nhận mật khẩu không được để trống !";
			$this->view('auth/changepassword.php');
		} else if ($data['confirmpass'] != $data['newpass']) {
			$_SESSION['error']['checkpass'] = "Xác nhận mật khẩu phải giống mật khẩu mới!";
			$this->view('auth/changepassword.php');
		} else {
			$data_Arry['id'] = $data['id'];
			$data_Arry['password'] = $data['confirmpass'];
			$user = new User();
			$update = $user->update($data_Arry);

			if ($update) {
				$_SESSION['success']['changepass'] = "Cập nhật mật khẩu mới thành công!";
			}
			$_SESSION['auth']['password'] = $data_Arry['password'];
			header('Location:index.php?mod=home&act=index');
		}
	}

	public function resetadmin()
	{
		$this->view('auth/changepasswordadmin.php');
	}

	public function updateadmin()
	{
		$data = $_POST;

		if ($data['oldpass'] == '') {
			$_SESSION['error']['oldpass'] = "Mật khẩu không được để trống !";
			$this->view('auth/changepasswordadmin.php');
		} else if ($data['oldpass'] != $_SESSION['auth']['password']) {
			$_SESSION['error']['checkoldpass'] = "Mật khẩu của bạn sai!";
			$this->view('auth/changepasswordadmin.php');
		} else if ($data['newpass'] == '') {
			$_SESSION['error']['newpass'] = "Mật khẩu thay đổi không được để trống !";
			$this->view('auth/changepassword.php');
		} else if ($data['confirmpass'] == '') {
			$_SESSION['error']['confirmpass'] = "Xác nhận mật khẩu không được để trống !";
			$this->view('auth/changepasswordadmin.php');
		} else if ($data['confirmpass'] != $data['newpass']) {
			$_SESSION['error']['checkpass'] = "Xác nhận mật khẩu phải giống mật khẩu mới!";
			$this->view('auth/changepasswordadmin.php');
		} else {
			$data_Arry['id'] = $data['id'];
			$data_Arry['password'] = $data['confirmpass'];

			$user = new User();
			$update = $user->update($data_Arry);

			$_SESSION['auth']['password'] = $data_Arry['password'];
			if ($update) {
				$_SESSION['success']['changepass'] = "Cập nhật mật khẩu mới thành công!";
			}

			header('Location:index.php?mod=category&act=index');
		}
	}

	public  function create()
	{
		$this->view('auth/register.php');
	}

	public  function storeuser()
	{
		$data = $_POST;
		$data['status'] = 1;
		$data['role_id'] = 2;

		$target_dir = "assets/image/";  // thư mục chứa file upload
		$target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên 
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
			$img = array('image' => $_FILES["image"]["name"]);
			$data = array_merge($data, $img);
		} else { // Upload file có lỗi
			echo "Sorry, there was an error uploading your file.";
		}


		$user = new User();
		if ($data['fullname'] == '') {
			$_SESSION['error']['name'] = "Nhập tên của bạn đi!";
			$this->redirect('index.php?mod=auth&act=create');
		} else if ($data['email'] == '') {
			$_SESSION['error']['email'] = "Email không được để trống!";
			$this->redirect('index.php?mod=auth&act=create');
		} else if ($user->checkRegister($_POST['email'])) {
			$_SESSION['error']['email'] = 'Email đã tồn tại';
			$this->redirect('index.php?mod=auth&act=create');
		} else if ($data['password'] == '') {
			$_SESSION['error']['pass'] = "Mật khẩu không được để trống!";
			$this->redirect('index.php?mod=auth&act=create');
		} else {
			$success = $user->create($data);

			if ($success) {
				$_SESSION['success']['thongtin'] = "Nhập tài khoản";
			}
			$this->redirect('index.php?mod=auth&act=login');
		}
	}
}
