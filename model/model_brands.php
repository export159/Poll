<?php 
require_once "../includes/PDOConnector.php";

class Model_brands extends PDOConnector{
	
	/*
		get all brands in tbl_brands
		
		return: $result (dataType: multiarray)
	*/
	public function getAllBrands(){
		$this->connect();
		$result = null;
		$counter = 0;
		try{
			$sql = "SELECT * FROM tbl_brands";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute();
			while($rs = $stmt->fetch()){
				$result[$counter]['id'] = $rs['id'];
				$result[$counter]['name'] = $rs['name'];
				$counter++;
			}
			
		}catch(PDOException $e){
			print_r($e);
		}
		
		$this->close();
		return $result;
	}
}