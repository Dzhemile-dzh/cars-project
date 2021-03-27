<?php
	class Engines{
	public $en_id, $en_name, $en_created_date, $en_modified_date;
		function insert($en){
			$en = new Engines;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$en->$key = implode(',',$data);
				}else{
					$en->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'en_') && $key != 'en_id' && $en->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $en->$key;
					}
			}
	
			$servername = "51.91.16.72";
			$username = "dev19";
			$password = "HkJ8Jzw&z#";
			$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = $conn->prepare("INSERT INTO en_engines ($setStr) VALUES ($setParams)")->execute($params);
			return $conn->lastInsertId();
			
		}
		function update($en){
			$en = new Engines;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$en->$key = implode(',',$data);
				}else{
					$en->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'en_') && $key != 'en_id' && $en->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $en->$key;
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
	        $params['en_id'] = $en->en_id;
	        $conn->prepare("UPDATE en_engines SET $setStr WHERE en_id = :en_id")->execute($params);
	        header("Location: https://dev19.webinteractive.bg/includes/pages/all-engines.php");
		}

	}
?>