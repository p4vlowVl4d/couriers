<?php

/**
* 
*/
class Router
{
	private $routes;

	function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}
	private function getUri()
	{
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}
	public function run()
	{
		$uri = $this->getUri();

		foreach($this->routes as $uriPattern => $path){
			if(preg_match("%$uriPattern%", $uri)){
				// echo 'uri '.$uri;
				$internalRoute = preg_replace("%$uriPattern%", $path, $uri);

				$segments = explode("/", $internalRoute);

				// echo '<pre>';
				// echo 'segments: ';
				// print_r($segments);
				// echo '</pre>';

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				// echo 'controller '.$controllerName.'<br>';

				$actionName = 'action'.ucfirst(array_shift($segments));
				$parameters = $segments;

				// echo 'action '.$actionName.'<br>';

				$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
				
				if(file_exists($controllerFile)){
					require_once($controllerFile);
				}

				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if($result != null){
					break;
				}

			}
		}
	}
}