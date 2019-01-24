<?php
include_once('functions.php');
include_once('config.php');
header("Content-Type: application/json");
$json = json_decode(stripslashes(file_get_contents("php://input")));
$action=$json->action;
$myClass = new myClass();
if($action=="getdat"){
	$response = $myClass->getdat($json);
	echo json_encode($response);
}
?>