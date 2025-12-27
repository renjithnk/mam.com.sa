<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$sub_menu_id = $_POST["sub_menu_id"];
	$caption = mysqli_real_escape_string($db->conn,$_POST["caption"]);
	$description =  mysqli_real_escape_string($db->conn,$_POST["description"]);
	$uploadDir =  "../uploads/page/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	$alt = $_POST["alt"];
	
	$sql = "INSERT INTO pages (sub_menu_id,caption, description, image,alt) VALUES ('$sub_menu_id','$caption', '" . $description . "','$uploadedFile','$alt')";
    
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
		$sql = "UPDATE pages set status=2 where id=$id";
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
		if(isset($_FILES["image"]["name"]))
		{
			$uploadDir = "../uploads/page/"; 
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		$alt = $_POST["alt"];
		
		if(@$uploadedFile != "")
		{
		    $sql = "UPDATE pages set sub_menu_id='$sub_menu_id',caption='$caption',description='$description',image='$uploadedFile', alt='$alt' where id=$id";
		}
		else
		{
			$sql = "UPDATE pages set sub_menu_id='$sub_menu_id',caption='$caption',description='$description', alt='$alt' where id=$id";
		}
		
		
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