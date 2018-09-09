<?php 
/**
* 
*/
/**
* 
*/
class Delivery
{
	
	public static function getRegionList()
	{
		$db = Db::getConnection();
		$result = $db->query('SELECT*FROM regions');
		$resultList = array();
		for($i=0; $row = $result->fetch();$i++){
			$resultList[$i]['code'] = $row['code'];
			$resultList[$i]['name'] = $row['name'];
			$resultList[$i]['gmt'] = $row['gmt'];
			$resultList[$i]['travel'] = $row['travel'];
		}
		return $resultList;
	}
	public static function createDelivery($params)
	{
		$db = Db::getConnection();

		$sql = 'INSERT INTO timetable'
		.'(id, code, begin_date, begin_time, d_code)'
		.'VALUES (:id, :code, :begin_date, :begin_time, :d_code)';
		$params['delivery_code'] = bin2hex(random_bytes(5));
		$result=$db->prepare($sql);
		$result->bindParam(':id', $params['courier'], PDO::PARAM_INT);
		$result->bindParam(':code', $params['code'], PDO::PARAM_INT);
		$result->bindParam(':begin_date', $params['begin_date'], PDO::PARAM_INT);
		$result->bindParam(':begin_time', $params['begin_time'], PDO::PARAM_INT);
		$result->bindParam(':d_code', $params['d_code'], PDO::PARAM_STR);
		if($result->execute()){
			return $params['delivery_code'];
		}
		return 0;
	}
	private static function getRegionInfo($code)
	{
		$db = Db::getConnection();

		$result = $db->query('SELECT name FROM regions WHERE code='.$code);

		$info = $result->fetch();
		return $info;
	}
	public static function getDeliveryList()
	{
		$db = Db::getConnection();
		$result = $db->query('SELECT t.d_code, t.code, r.name, c.fname, c.lname, t.begin_date, t.midpoint, t.begin_time, t.end_date FROM couriers c INNER JOIN timetable t ON c.id = t.id INNER JOIN regions r ON r.code = t.code');
		

			$i=0;
			$list = array();
			while($row = $result->fetch()){
				$list[$i]['d_code'] = $row['d_code'];
				$list[$i]['code'] = $row['code'];
				$list[$i]['name']=	$row['name'];
				$list[$i]['fname']=	$row['fname'];
				$list[$i]['lname']=	$row['lname'];
				$list[$i]['begin_date'] = $row['begin_date'];
				$list[$i]['begin_time'] = $row['begin_time'];
				$list[$i]['midpoint'] = $row['midpoint'];
				$list[$i]['end_date'] = $row['end_date'];
				$i++;
			}
			return $list;
		
		
	}
	public static function getDelivToCode($code)
	{
		$db = Db::getConnection();
		$info = array();
		$sql = "SELECT t.d_code, t.code, t.id, t.begin_date, t.begin_time, t.midpoint, t.mid_time, t.end_date, t.end_time, c.fname, c.lname, r.name, r.gmt, r.travel FROM timetable t INNER JOIN couriers c ON t.id = c.id INNER JOIN regions r ON t.code = r.code WHERE t.d_code='$code'";

		$result = $db->query($sql);
		$info = $result->fetch(PDO::FETCH_ASSOC);
		return $info;
	}
	public static function getDevListByParam($params)
	{
		$db = Db::getConnection();
		$data = array();
		$sql = '';
		if($params['type'] == 1){
			$sql = "SELECT t.d_code, t.code, r.name, c.fname, c.lname, t.begin_date, t.midpoint, t.begin_time, t.end_date FROM couriers c INNER JOIN timetable t ON c.id = t.id INNER JOIN regions r ON r.code = t.code WHERE t.d_code = '".$params['code']."'";
		}else{
			$sql = "SELECT t.d_code, t.code, r.name, c.fname, c.lname, t.begin_date, t.midpoint, t.begin_time, t.end_date FROM couriers c INNER JOIN timetable t ON c.id = t.id INNER JOIN regions r ON r.code = t.code WHERE t.begin_date >= '".$params['in_date']."' AND t.begin_date <= '".$params['to_date']."'";
		}
		
		$result = $db->query($sql);
		$data = $result->fetch(PDO::FETCH_ASSOC);
		return $data;
	}
}