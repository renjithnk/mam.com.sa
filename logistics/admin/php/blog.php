<?php
require_once '../includes/database.php';
$blogDBCconn = new mysqli($blogHost, $blogDBUsername, $blogDBPassword, $blogDBName);
if(@$_POST["update"] == 'update')
{
	// echo $_POST["ids"];
	$includedids=explode(",",$_POST["includedids"]);
	// print_r($ids);
	$msg="";
	foreach($includedids as $id)
	{
			// echo $id;
			// exit;
			if($id  != "")
			{
				$blogSql = "UPDATE wp_posts set wp_posts_dispay=1 where ID=$id";
				if($blogDBCconn->query($blogSql) === TRUE) 
				{
					 $msg="Updated successfully";
				}
				else
				{
					 $msg="Error: " . $blogSql . "<br>";
				}
			}
	}
	
	$excludedids=explode(",",$_POST["excludedids"]);
	foreach($excludedids as $id)
	{
			if($id  != "")
			{
				$blogSql = "UPDATE wp_posts set wp_posts_dispay=2 where ID=$id";
				$blogDBCconn->query($blogSql);
				if($blogDBCconn->query($blogSql) === TRUE) 
				{
					 $msg="Updated successfully";
				}
				else
				{
					 $msg="Error: " . $blogSql . "<br>";
				}
			}
	}
	echo $msg;
}
?>