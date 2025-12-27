<?php
global $adminPath;
if($_SERVER['HTTP_HOST'] == "localhost.alim")
{
	$_SESSION['adminPath']='http://'.$_SERVER['HTTP_HOST'] . '/logistics/admin/';
}
else if($_SERVER['HTTP_HOST'] == "localhost")
{
	$_SESSION['adminPath']='http://'.$_SERVER['HTTP_HOST'] . '/alim/logistics/admin/';
}
else
{
    $_SESSION['adminPath']='https://'.$_SERVER['SERVER_NAME'] . '/logistics/admin/';
}
$adminPath=$_SESSION['adminPath'];
?>