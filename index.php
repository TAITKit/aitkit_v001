<?php
session_start();
include('model/model.php');
include('view/page_head.html');
if($_SESSION['user'] == ""){
	switch($_GET['item']){
		case "":
			include('view/readMe.html');
		break;
		case "News":
			include('view/news.html');
		break;
		case "DeepLearningMethods":
			include('view/deepLearningMethods.html');
		break;
		case "Login":
			include('view/login.html');
		break;
		case "Register":
			include('view/register.html');
		break;
		
		default:
		break;
	}
}else{
	
	switch($_GET['item']){
		case "":
			include('view/readMe.html');
		break;
		case "News":
			include('view/news.html');
		break;
		case "DeepLearningMethods":
			include('view/deepLearningMethods.html');
		break;
		case "praetorLogin":
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
		case "Logout":
			$_SESSION['user'] = '';
			echo "<script>alert('您已成功登出！');</script>";
			echo "<script>location.href='index.php';</script>";
		break;
		case "Register":
			include('view/register.html');
		break;
		default:
		break;
	}
}
	

?>