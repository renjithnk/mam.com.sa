<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE enquiries set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>