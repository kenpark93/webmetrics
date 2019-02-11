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
if($action=="putpose"){
	$response = $myClass->putpose($json);
	echo $response;
}
if($action=="putvisu"){
	$response = $myClass->putvisu($json);
	echo $response;
}
if($action=="hand"){
	$response = $myClass->hand($json);
	echo $response;
}
if($action=="avto"){
	$response = $myClass->avto($json);
	echo $response;
}
if($action=="data"){
	$response = $myClass->data();
	echo $response;
}
if($action=="rating"){
	$response = $myClass->rating($json);
	echo $response;
}
if($action=="ratingpok"){
	$response = $myClass->ratingpok($json);
	echo $response;
}
if($action=="final"){
	$response = $myClass->finale($json);
	echo $response;
}
if($action=="proverka"){
	$response = $myClass->proverka($json);
	echo $response;
}
if($action=="perepis"){
	$response = $myClass->perepis($json);
	echo $response;
}
?>