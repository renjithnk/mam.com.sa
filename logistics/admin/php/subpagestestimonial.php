<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$sub_menu_id = $_POST["sub_menu_id"];
	$name = mysqli_real_escape_string($db->conn,$_POST["name"]);
	$location = mysqli_real_escape_string($db->conn,$_POST["location"]);
	$comment = mysqli_real_escape_string($db->conn,$_POST["comment"]);
	$sql = "INSERT INTO sub_pages_testimonial (sub_menu_id, name, location, comment) VALUES ('$sub_menu_id', '$name', '$location', '$comment')";
    
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
     	$sub_menu_id = $_POST["sub_menu_id"];
		$name = mysqli_real_escape_string($db->conn,$_POST["name"]);
		$location = mysqli_real_escape_string($db->conn,$_POST["location"]);
		$comment = mysqli_real_escape_string($db->conn,$_POST["comment"]);
		$sql = "UPDATE sub_pages_testimonial set sub_menu_id='$sub_menu_id', name='$name',location='$location',comment='$comment' where id=$id";
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
		$sql = "UPDATE sub_pages_testimonial set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>