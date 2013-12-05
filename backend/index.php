<?php
//error_reporting("E_ALL");
spl_autoload_register('apiAutoload');
function apiAutoload($classname)
{
	if (preg_match('/[a-zA-Z]+Controller$/', $classname)) {
		include __DIR__ . '/controllers/' . $classname . '.php';
		return true;
	} elseif (preg_match('/[a-zA-Z]+Model$/', $classname)) {
		include __DIR__ . '/models/' . $classname . '.php';
		return true;
	} elseif (preg_match('/[a-zA-Z]+View$/', $classname)) {
		include __DIR__ . '/views/' . $classname . '.php';
		return true;
	} else {
		include __DIR__ . '/library/' . str_replace('_', DIRECTORY_SEPARATOR, $classname) . '.php';
		return true;
	}
	return false;
}

$request = new Request();

$controller_name = ucfirst($request->url_elements[0]) . 'Controller';
if (class_exists($controller_name)) {
	$controller = new $controller_name();
	$action_name = strtolower($request->verb) . 'Action';
	$result = $controller->$action_name($request);
	$view_name = ucfirst($request->format) . 'View';

	$data = $request->parameters;
	if(isset($data['callback'])) $result['callback'] = $data['callback'];
	if(class_exists($view_name)) {
		$view = new $view_name();
		$view->render($result);
	}
}

?>