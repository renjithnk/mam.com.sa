<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["update"] == 'update')
{
		$password = md5($_POST["password"]);
		$new_password = $_POST["new_password"];
		$confirm_password = $_POST["confirm_password"];
		
		$selPasswordSql="select password from settings where password='$password'";
		$selPasswordResult=$db->query($selPasswordSql);
		$msg="";
		if(@$selPasswordResult->num_rows > 0) 
		{
				$new_password=md5($new_password);
				$updatePasswordSql = "UPDATE settings set password='$new_password'";
				$db->query($updatePasswordSql);
				if($db->query($updatePasswordSql) === TRUE) 
				{
					$msg="Updated successfully.";
				}
				else
				{
				   $msg="Error: " . $sql . "<br>";
				}
		}
		else
		{
		
		        $msg="Incorrect Password";
		}
		
		echo $msg;
}
?>