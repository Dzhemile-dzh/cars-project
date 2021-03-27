<?php
	class Vehicles{
	public $ve_id, $ve_br_id, $ve_mo_id, $ve_bo_id, $ve_en_id, $ve_co_id, $ve_im_id, $ve_version, $ve_info, $ve_status, $ve_created_date, $ve_modified_date;
		function insert($ve){
			$ve = new Vehicles;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$ve->$key = implode(',',$data);
				}else{
					$ve->$key = $data;
				}
			}
			$allowed = get_object_vars($this);
			$params = [];
			$setStr = "";
			$setParams = "";
			foreach ($allowed as $key => $allow){
				if (strstr($key, 've_') && $key != 've_id' && $ve->$key != "")
					{
						$setStr .= "`".str_replace("`", "``", $key)."`,";
						$setParams .= ":".$key.",";
						$params[$key] = $ve->$key;
					}
			}

			$servername = "51.91.16.72";
			$username = "dev19";
			$password = "HkJ8Jzw&z#";
			$conn = new PDO("mysql:host=$servername;dbname=dev19", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$setStr = rtrim($setStr, ",");
			$setParams = rtrim($setParams, ",");
			$query = $conn->prepare("INSERT INTO ve_vehicles ($setStr) VALUES ($setParams)")->execute($params);
			return $conn->lastInsertId();
			
		}
		function update($ve){
			$ve = new Vehicles;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$ve->$key = implode(',',$data);
				}else{
					$ve->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 've_') && $key != 've_id' && $ve->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $ve->$key;
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
	        $params['ve_id'] = $ve->ve_id;
	        $conn->prepare("UPDATE ve_vehicles SET $setStr WHERE ve_id = :ve_id")->execute($params);
	        header("Location: https://dev19.webinteractive.bg/includes/pages/all-vehicles.php");
		}

	}
?>	