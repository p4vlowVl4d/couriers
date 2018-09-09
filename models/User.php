<?php
/**
* 
*/
class User
{
	use Db;

	public static function checkUserData($params)
	{
		$db = Db::getConnection();

		$sql = 'SELECT id, fname, role FROM couriers WHERE email=:email AND password=:password';

		$result= $db->prepare($sql);
		$result->bindParam(':email', $params['email'], PDO::PARAM_STR);
		$result->bindParam(':password', $params['pass'], PDO::PARAM_STR);
		
		if($result->execute()){
			$data = $result->fetch();

			return $data;
		}
		return false;
	}
	public static function auth($data)
	{
		$_SESSION['user_id'] = $data['id'];
		$_SESSION['user_first_name'] = $data['fname'];
		$_SESSION['role'] = $data['role'];
	}
	public static function isAdmin()
	{
		if(isset($_SESSION['user_id'])){
			if($_SESSION['role'] == 1) return true;
		}
		return false;
	}
	public static function createCourier($params)
	{
		$db = Db::getConnection();

		$sql = 'INSERT INTO couriers '
		.'(email, password, fname, lname, patr)'
		.'VALUES'
		.'(:email, :password, :fname, :lname, :patr)';
		$result = $db->prepare($sql);
		$result->bindParam(':email',$params['email'], PDO::PARAM_STR);
		$result->bindParam(':password',$params['password'], PDO::PARAM_STR);
		$result->bindParam(':lname',$params['lname'], PDO::PARAM_STR);
		$result->bindParam(':fname',$params['fname'], PDO::PARAM_STR);
		$result->bindParam(':patr',$params['patr'], PDO::PARAM_STR);
		if($result->execute()){
			return $db->lastInsertId();
		}
		return false;

	}
	public static function deleteCourier($id)
	{
		$id = intval($id);
		$db = Db::getConnection();

		$sql = 'DELETE FROM couriers WHERE id=:id';
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}
	public static function getCourierList()
	{
		$db = Db::getConnection();

		$result = $db->query('SELECT * FROM couriers WHERE role != 1 ORDER BY id ASC');
		$list = array();
		$i = 0;
		while($row = $result->fetch()){
			$list[$i]['id'] = $row['id'];
			$list[$i]['fname'] = $row['fname'];
			$list[$i]['lname'] = $row['lname'];
			$list[$i]['patr'] = $row['patr'];
			$i++;
		}
		return $list;
	} 
}