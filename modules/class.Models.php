<?php
	class Models{
	public $mo_id, $mo_name,$mo_status, $mo_created_date, $mo_modified_date, $mo_br_id;
		function insert($mo){
			$mo = new Models;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$mo->$key = implode(',',$data);
				}else{
					$mo->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'mo_') && $key != 'mo_id' && $mo->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $mo->$key;
					}
			}
			$servername = "51.91.16.72";
			$username = "dev19";
			$password = "HkJ8Jzw&z#";
			$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = $conn->prepare("INSERT INTO mo_models ($setStr) VALUES ($setParams)")->execute($params);
			return $conn->lastInsertId();
			
		}
		function update($mo){
			$mo = new Models;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$mo->$key = implode(',',$data);
				}else{
					$mo->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'mo_') && $key != 'mo_id' && $mo->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $mo->$key;
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
	        $params['mo_id'] = $mo->mo_id;
	        $conn->prepare("UPDATE mo_models SET $setStr WHERE mo_id = :mo_id")->execute($params);
	        header("Location: https://dev19.webinteractive.bg/includes/pages/all-models.php");
		}
	}
?>