<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$landingpage_id=$_POST["landingpage_id"];
	$name = $_POST["name"];
	$location = $_POST["location"];
	$comment = $_POST["comment"];
	$sql = "INSERT INTO landingpagestestimonial (page_id, name, location, comment) VALUES ('$landingpage_id', '$name', '$location', '$comment')";
    
    if($db->query($sql) === TRUE) 
	{
        echo "New Record Added Successfully.";
    }
	else
	{
       echo "Error: " . $sql . "<br>";
    }
	// header("Location : landingpagestestimonial.php");
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$landingpage_id=$_POST["landingpage_id"];
		$name = $_POST["name"];
		$location = $_POST["location"];
		$comment = $_POST["comment"];
		$sql = "UPDATE landingpagestestimonial set name='$name',location='$location',comment='$comment', page_id='$landingpage_id' where id=$id";
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
		$sql = "UPDATE landingpagestestimonial set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>