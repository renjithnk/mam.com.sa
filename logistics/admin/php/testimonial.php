<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$name = $_POST["name"];
	$location = $_POST["location"];
	$comment = $_POST["comment"];
	$sql = "INSERT INTO testimonial (name, location, comment) VALUES ('$name', '$location', '$comment')";
    
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
		$name = $_POST["name"];
		$location = $_POST["location"];
		$comment = $_POST["comment"];
		$sql = "UPDATE testimonial set name='$name',location='$location',comment='$comment' where id=$id";
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
		$sql = "UPDATE testimonial set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>