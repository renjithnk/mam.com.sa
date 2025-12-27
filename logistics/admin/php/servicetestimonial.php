<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$service_id = $_POST["service_id"];
	$name = mysqli_real_escape_string($db->conn,$_POST["name"]);
	$location = mysqli_real_escape_string($db->conn,$_POST["location"]);
	$comment = mysqli_real_escape_string($db->conn,$_POST["comment"]);
	$sql = "INSERT INTO service_pages_testimonial (service_id, name, location, comment) VALUES ('$service_id', '$name', '$location', '$comment')";
    
    if($db->query($sql) === TRUE) 
	{
        echo "New Record Added Successfully.";
    }
	else
	{
       echo "Error: " . $sql . "<br>";
    }
	// header("Location : testimonial.php");
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
     	$service_id = $_POST["service_id"];
		$name = mysqli_real_escape_string($db->conn,$_POST["name"]);
		$location = mysqli_real_escape_string($db->conn,$_POST["location"]);
		$comment = mysqli_real_escape_string($db->conn,$_POST["comment"]);
		$sql = "UPDATE service_pages_testimonial set service_id='$service_id', name='$name',location='$location',comment='$comment' where id=$id";
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

if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE service_pages_testimonial set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>