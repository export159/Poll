<?php
require_once "../includes/PDOConnector.php";

class Model_Poll extends PDOConnector.php{
	
	/*
		function addPoll
		params: $user_id <--an iya value an id han naka login na user
				$brand_id
		return: void
		use: for adding votes
	*/
	public function addPoll($user_id, $brand_id){
		$this->connect();
		try{
			$sql = 'INSERT INTO tbl_votes(brand_id, user_id) VALUES(?, ?)';
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(1, $user_id);
			$stmt->bindParam(2, $brand_id);
			$stmt->execute();
		}catch(PDOException $e){
			print_r($e);
		}
		$this->close();
	}
	
	
}
