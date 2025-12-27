<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$service_id = $_POST["service_id"];
	$name = mysqli_real_escape_string($db->conn,$_POST["name"]);
	
	$sql = "INSERT INTO submenu (service_id,name) VALUES ('$service_id','$name')";
    
    if($db->query($sql) === TRUE) 
	{
        echo "New record created successfully.";
    }
	else
	{
       echo "Error: " . $sql . "<br>";
    }
}


if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE submenu set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
	    $service_id = $_POST["service_id"];
		$name = mysqli_real_escape_string($db->conn,$_POST["name"]);
		$sql = "UPDATE submenu set service_id='$service_id',name='$name' where id=$id";
		
		
		$db->query($sql);
		if($db->query($sql) === TRUE) 
		{
			$msg="Updated successfully.";
		}
		else
		{
		   $msg="Error: " . $sql . "<br>";
		}
		echo $msg;
	}
}
?>