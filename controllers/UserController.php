<?php
/**
* 
*/
class UserController
{
	public function actionLogin()
	{
		$title = 'Войти';
		$errors = false;
		if(isset($_POST['submit'])){
			$params['email'] = trim($_POST['email']);
			$params['pass'] = trim($_POST['password']);
			$data = User::checkUserData($params);
			if(is_array($data)){
				User::auth($data);
				header('Location:/admin/');
			}else{
				$errors[] = 'Неправильные данные для входа';
			}

		}
		require_once(ROOT.'/views/user/login.php');
		return true;
	}
}