<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$sub_menu_id = $_POST["sub_menu_id"];
	$video_url=$_POST["video_url"];
	
	$sql = "INSERT INTO sub_pages_videos (sub_menu_id,video_url) VALUES ('$sub_menu_id','" . $video_url . "')";
    
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
		$sql = "UPDATE sub_pages_videos set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
	    $sub_menu_id = $_POST["sub_menu_id"];
		$video_url=$_POST["video_url"];
		$sql = "UPDATE sub_pages_videos set sub_menu_id='$sub_menu_id',video_url='$video_url' where id=$id";
		
		
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