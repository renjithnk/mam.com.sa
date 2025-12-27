<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$sub_menu_id = $_POST["sub_menu_id"];
	$caption = mysqli_real_escape_string($db->conn,$_POST["caption"]);
	$description =  mysqli_real_escape_string($db->conn,$_POST["description"]);
	
	$sql = "INSERT INTO sub_pages_faq (sub_menu_id,caption, description) VALUES ('$sub_menu_id','$caption', '" . $description . "')";
    
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
		$sql = "UPDATE sub_pages_faq set status=2 where id=$id";
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
		$caption = mysqli_real_escape_string($db->conn,$_POST["caption"]);
		$description =  mysqli_real_escape_string($db->conn,$_POST["description"]);
		$sql = "UPDATE sub_pages_faq set sub_menu_id='$sub_menu_id',caption='$caption',description='$description' where id=$id";
		
		
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