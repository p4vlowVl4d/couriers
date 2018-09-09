<?php

trait Db{

	public static function getConnection()
	{
		$path = ROOT.'/config/db_params.php';
		$params = include($path);
		$dsn = "mysql:host={$params['host']};dbname={$params['db_name']}";
		$db = new PDO($dsn, $params['user'], $params['password']);
    	$db->exec('set names utf8');
		return $db;
	}
}