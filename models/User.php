<?php 
require_once("models/Query.php");
class User extends Query
{
	 public $table = 'users';

	public function checkRegister($email){
		$users = $this->where($this->table,
			['email'=> $email]);
		$user = $users[0];
		if(count($users) > 0){
			return true;
		}else{
			return false;
		}
	}


	public function getList()
	{
		$users = $this->select($this->table, ['id','fullname','email','password','image','status','sdt','address','role_id']);
		return $users; 
	}

	public function create($data){
		
		$status=$this->insert($this->table,$data);
		return $status;
	}

	public function checkLogin($email,$password)
	{
		$users = $this->where($this->table, ['email'=>$email, 'password' =>$password]);
	
		if(count($users)>0){
			$user = $users[0];
			$_SESSION['auth']=['id'=> $user['id'],
			'fullname'=>$user['fullname'],
			'image'=>$user['image'],
			'password'=>$user['password'],
			'role_id'=>$user['role_id']];
			
			return true;
		}else {
			return false;
		}
	}
	public function find($id){
		$user = $this->getId($this->table, $id);
		return $user;
	}

	public function xoa($id){
		$delete1 = $this->delete($this->table, $id);
		return $delete1;
	}

	// tim theo search trag admin
	public function findUseradmin($id){
		
		$users = $this->whereLike($this->table,['fullname' =>"$id"]);

		return $users;
	}

}
?>
