<?php 
require_once('helpers/helpers.php');

// require_once('controlllers/PostController.php');
// require_once('controlllers/CategoryController.php');
session_start();

// var_dump($_SESSION['auth']);
// die();
$mod="home";
$act="index";
if(isset($_GET['mod'])){
	$mod = $_GET['mod'];
}
if(isset($_GET['act'])){
	$act = $_GET['act'];
}

$class_name = ucfirst($mod) ."Controller";
$path = __DIR__ ."/controlllers/" .$class_name . ".php";
if(!file_exists($path)){
	echo "File $path không tồn tại";
	exit();
}
require_once($path);
// $controller_obj = new CategoryController();
// $controller_obj->index();

$controller_obj = new $class_name();
$controller_obj->$act();
?>