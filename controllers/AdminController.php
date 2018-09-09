<?php
/**
* 
*/
class AdminController
{
	
	public function actionIndex()
	{
		if(!User::isAdmin()){
			header('Location: /');
		}
		$title = 'Админпанель';
		$timetable = Delivery::getDeliveryList();
		
		require_once(ROOT.'/views/admin/index.php');
		return true;
	}
	public function actionCreateCourier()
	{
		if(!User::isAdmin()){
			header('Location: /');
		}
		$title = 'Добавить курьера';

		require_once(ROOT.'/views/admin/courier/create.php');
		return true;
	}
	public function actionAjaxCreateCourier()
	{
		$params['fname'] = $_POST['first_name'];
		$params['lname'] = $_POST['last_name'];
		$params['patr'] = $_POST['patronymic'];
		$params['email'] = $_POST['email'];
		$params['password'] = $_POST['password'];
		$result = User::createCourier($params);
		if($result){
			echo $result;
		}else{
			echo 'fail';
		}
		return true;
	}
	public function actionCreateDelivery()
	{
		if(!User::isAdmin()){
			header('Location: /');
		}
		$title = 'Добавить поездку';
		$couriers = User::getCourierList();
		$regions = Delivery::getRegionList();
		require_once(ROOT.'/views/admin/delivery/create.php');
		return true;
	}
	public function actionAjaxCreateDelivery()
	{
		if($_POST['courier'] != 'null' && $_POST['region'] != 'null'){
			$params['courier'] = $_POST['courier'];
			$params['code'] = $_POST['region'];
			$params['courier'] = $_POST['courier'];
			$params['begin_time'] = preg_replace('%([0-9]{4})-([0-9]{2})-([0-9]{2})T%is', '',$_POST['date']);
			$params['begin_time'] = preg_replace('%([0-9]+):([0-9]+)%', '$1$2', $params['begin_time']);
			$params['begin_time'] = $params['begin_time'].'00';
			$params['begin_date'] = preg_replace('%T([0-9]+):([0-9]+)%', '',$_POST['date']);
			$params['begin_date'] = preg_replace('%([0-9]{2})-([0-9]{2})-([0-9]{4})%', '$3$2$1', $params['begin_date']);
		 	$result = Delivery::createDelivery($params);
			if($result != 0){
				echo $result;
			}else{
				echo 'database fail';
			}
		}else{
			echo 'fail';
		}
		return true;
	}
	public function actionListCourier()
	{	
		if(!User::isAdmin()){
			header('Location: /');
		}
		$title = 'Список курьеров';
		$couriersList = array();
		$couriersList = User::getCourierList();
		require_once(ROOT.'/views/admin/courier/list.php');
		return true;
	}
	public function actionDeleteCourier($id)
	{
		echo User::deleteCourier($id);
		return true;
	}
	public function actionView($code)
	{
		if(!User::isAdmin()){
			header('Location: /');
		}
		$title = 'Доставка -'.$code;
		$viewed = Delivery::getDelivToCode($code);

		require_once(ROOT.'/views/admin/delivery/view.php');
		return true;

	}
	public function actionSortDev()
	{
		if(isset($_POST['d_code'])){
			$params['type'] = 1;
			$params['code'] = strtolower($_POST['d_code']);
			echo json_encode(Delivery::getDevListByParam($params));
		}else{
			$params['type'] = 0;
			$params['in_date'] = preg_replace('%([0-9]{2})-([0-9]{2})-([0-9]{4})%', '$3-$2-$1', $_POST['date-in']);
			$params['to_date'] = preg_replace('%([0-9]{2})-([0-9]{2})-([0-9]{4})%', '$3-$2-$1', $_POST['date-to']);
			echo json_encode(Delivery::getDevListByParam($params));
		}
		return true;
	}
}