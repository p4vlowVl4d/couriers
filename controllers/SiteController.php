<?php
/**
* 
*/
class SiteController
{
	
	public function actionIndex()
	{
		$title = 'Расписание';
		
		require_once(ROOT.'/views/site/index.php');
		return true;
	}
}