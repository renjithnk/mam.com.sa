<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$service_id = $_POST["service_id"];
	$page_name=$_POST["pageName"];
	$video_url=$_POST["video_url"];
	
	$sql = "INSERT INTO videos (service_id,page_name,video_url) VALUES ('$service_id','" . $page_name . "', '" . $video_url . "')";
    
    if($db->query($sql) === TRUE) 
	{
        echo "New record created successfully.";
    }
	else
	{
       echo "Error: " . $sql;
    }
}


if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE videos set status=2 where id=$id";
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
		$page_name=$_POST["pageName"];
		$video_url=$_POST["video_url"];
		$sql = "UPDATE videos set service_id='$service_id',page_name='$page_name',video_url='$video_url' where id=$id";
		
		
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