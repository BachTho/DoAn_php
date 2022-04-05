<?php 
class Connection{
	private $servername = "127.0.0.1";
	private $username = "root";
	private $password ="";
	private $dbname ="nhom_predator";

	public function connect(){
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if( $conn->connect_errno ){
			echo "Failed to connect to Mysql: " .$conn->connect_error;
			exit();
		}
		return $conn;
	}
}

 ?>