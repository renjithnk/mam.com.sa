<?php
ob_start();
session_start();
require_once '../includes/database.php';
require_once '../includes/config.php';
$db = new Database();
$msg="";
$username = $_POST["username"];
$password = md5($_POST["password"]);
if(($username != "") && ($password != ""))
{
		$sql="select * from settings where username='$username' and password='$password'";
		$result=$db->query($sql);
		if($result->num_rows > 0)
		{
			$_SESSION['admin_username']=$username;
			header('Location: dashboard.php');
		}
		else
		{
		   $msg="Please check username/password you typed";
		}
}
else
{
  $msg="Please check username/password you typed";
}
$_SESSION['errmsg']=$msg;
if($_SESSION['errmsg'] != "")
{
	header('Location: ../index.php');
}
ob_flush();
?>