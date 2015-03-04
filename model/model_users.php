<?php
require_once "../includes/PDOConnector.php";

class Model_users extends PDOConnector{
	
	//-----Get a single User from tbl_users --//
	public function getUsersWhereId($id){
		$this->connect();
		$result = null;
		try{
			$sql = "SELECT * FROM tbl_users WHERE id = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $id);
			$stmt->execute();
			
			$result = $stmt->fetch();
		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();
		return $result;
	}
	/*
		function getUsersWhere
		param: $username, $password
		return: $result (dataType array)
		use: for login
	*/
	public function getUsersWhere($username, $password){
		$this->connect();
		$result = null;
		try{
			$sql = "SELECT * FROM tbl_users WHERE username = ? AND password = ?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $password);
			$stmt->execute();
			
			$result = $stmt->fetch();
		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();
		return $result;
	}
	
	/*
		function addUser
		param: $data (dataType array)
		$data['name'];
		$data['username']
		$data['password']
		use: for signup
	*/
	public function addUser($data){ 
		$this->connect();
		try{
			$sql = "INSERT INTO tbl_users(name, username, password) VALUES (?, ?, ?)";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $data['name']);
			$stmt->bindParam(2, $data['username']);
			$stmt->bindParam(3, $data['password']);
			$stmt->execute();
		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();
	}
	
}