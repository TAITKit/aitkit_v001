<?php
session_start();
include('model/model.php');
if($_SESSION['user'] == ""){
	include('view/login.html');
}else{
	include('view/page_head.html');
	switch($_GET['item']){
		case "News":
			include('view/news.html');
		break;
		case "DeepLearningMethods":
			include('view/deepLearningMethods.html');
		break;
		case "Login":
			include('view/praetorLogin.html');
		break;
		case "NewMethod":
			include('view/NewMethod.html');
		break;
		case "ShowAlgorithm":
			include('view/ShowAlgorithm.html');
		break;
		case "addNewMethod":
			include('model/newMethod.php');
		break;
		
		default:
		break;
	}
}
	

?>