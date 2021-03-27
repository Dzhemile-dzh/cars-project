<?
	class Images {
	public $im_id,$im_filename;
	function update($im){
			$im = new Images;
			foreach ($_POST as $key => $data) {
				if (is_array($data) && count($data) > 0){
					$im->$key = implode(',',$data);
				}else{
					$im->$key = $data;
				}
			}
	        $allowed = get_object_vars($this);
	        $params = [];
	        $setStr = "";
	        foreach ($allowed as $key => $allow){
	            if (strstr($key, 'im_') && $key != 'im_id' && $im->$key != "")
	            {
	                $setStr .= "`".str_replace("`", "``", $key)."` = :".$key.",";
	                $params[$key] = $im->$key;
	            }
	        }
	        $setStr = rtrim($setStr, ",");
	        $params['im_id'] = $im->im_id;
	        $conn->prepare("UPDATE im_images SET $setStr WHERE im_id = :im_id")->execute($params);
		}

	function insert($im_filename){

		$im = new Images;
		$params['im_filename'] = $im_filename;
		$setStr = "`im_filename`";
		$setParams = ":im_filename";
		$query = $conn->prepare("INSERT INTO im_images ($setStr) VALUES ($setParams)")->execute($params);
		return $conn->lastInsertId();
	}

	function getImage(){
		$result = DB::query("SELECT * FROM im_images")->fetchAll();
		return $result;	
	}
}

?>