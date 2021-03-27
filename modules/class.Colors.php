<?php
	class Colors{
	public $co_id, $co_name,$co_metalic;
		function insert($co){
			$co = new Colors;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$co->$key = implode(',',$data);
				}else{
					$co->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 'co_') && $key != 'co_id' && $co->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $co->$key;
					}
			}
	
			$servername = "51.91.16.72";
			$username = "dev19";
			$password = "HkJ8Jzw&z#";
			$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = $conn->prepare("INSERT INTO co_colors ($setStr) VALUES ($setParams)")->execute($params);
			return $conn->lastInsertId();
			
		}
		function update($co){
			$co = new Colors;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$co->$key = implode(',',$data);
				}else{
					$co->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'co_') && $key != 'co_id' && $co->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $co->$key;
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
	        $params['co_id'] = $co->co_id;
	        $conn->prepare("UPDATE co_colors SET $setStr WHERE co_id = :co_id")->execute($params);
	        header("Location: https://dev19.webinteractive.bg/includes/pages/all-colors.php");
		}

	}
?>