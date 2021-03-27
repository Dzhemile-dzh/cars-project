<?php
	class Bodyworks{
	public $bo_id, $bo_name, $bo_status, $bo_created_date, $bo_modified_date, $bo_md_id;
		function insert($bo){
			$bo = new Bodyworks;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$bo->$key = implode(',',$data);
				}else{
					$bo->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'bo_') && $key != 'bo_id' && $bo->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $bo->$key;
					}
			}
	
			$servername = "51.91.16.72";
			$username = "dev19";
			$password = "HkJ8Jzw&z#";
			$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = $conn->prepare("INSERT INTO bo_bodyworks ($setStr) VALUES ($setParams)")->execute($params);
			return $conn->lastInsertId();
			
		}
		function update($bo){
			$bo = new Bodyworks;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$bo->$key = implode(',',$data);
				}else{
					$bo->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'bo_') && $key != 'bo_id' && $bo->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $bo->$key;
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
	        $params['bo_id'] = $bo->bo_id;
	        $conn->prepare("UPDATE bo_bodyworks SET $setStr WHERE bo_id = :bo_id")->execute($params);
	        header("Location: https://dev19.webinteractive.bg/includes/pages/all-bodyworks.php");
		}

	}
?>