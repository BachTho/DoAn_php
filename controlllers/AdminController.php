<?php 
require_once('controlllers/BaseController.php');

class AdminController extends BaseController
{
	public function __construct(){
		if ( !$this->checkLogin() ){
			$this->redirect('index.php?mod=auth&act=login');
		}
		else if ($_SESSION['auth']['role_id'] == 2){
			echo 'Bạn không được phép truy cập';
		    exit();
		}
	}
	protected function checkLogin()
	{
		if(isset($_SESSION['auth'])){
		
			return true;
		}
		else{
			return false;
		}
	}
}
?>