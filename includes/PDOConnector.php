<?php 
class PDOConnector{
	private $db_name  = "db_poll";
	private $db_host  = "localhost";
	private $username = "root";
	private $password = "";
	
	protected $dbh = null;
	
	protected function connect(){
		try{
			$this->dbh = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->username, $this->password);
		}catch(PDOException $e){
			print_r($e);
		}
		print_r($this->dbh);
	}
}