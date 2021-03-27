<?php
	class Brands{
	public $br_id, $br_name,$br_status, $br_created_date, $br_modified_date,$br_md_id;
		function insert($br){
			$br = new Brands;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$br->$key = implode(',',$data);
				}else{
					$br->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'br_') && $key != 'br_id' && $br->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $br->$key;
					}
			}
	
			$servername = "51.91.16.72";
			$username = "dev19";
			$password = "HkJ8Jzw&z#";
			$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = $conn->prepare("INSERT INTO br_brands ($setStr) VALUES ($setParams)")->execute($params);
			return $conn->lastInsertId();
			
		}
		function update($br){
			$br = new Brands;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$br->$key = implode(',',$data);
				}else{
					$br->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'br_') && $key != 'br_id' && $br->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $br->$key;
	            }
	        }
	        $servername = "51.91.16.72";
			$username = "dev19";
			$password = "HkJ8Jzw&z#";
			$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
	        $setStr = rtrim($setStr, ",");
	        $params['br_id'] = $br->br_id;
	        $conn->prepare("UPDATE br_brands SET $setStr WHERE br_id = :br_id")->execute($params);
	        header("Location: https://dev19.webinteractive.bg/includes/pages/all-brands.php");
		}
	}
?>