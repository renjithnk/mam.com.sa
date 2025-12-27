<?php
require_once '../includes/database.php';
$db = new Database();
if(@$_POST["add"]=="add")
{
	$landingpage_id=$_POST["landingpage_id"];
	$caption = mysqli_real_escape_string($db->conn,$_POST["caption"]);
	$description =  mysqli_real_escape_string($db->conn,$_POST["description"]);
	$short_description=mysqli_real_escape_string($db->conn,$_POST["short_description"]);
	// File Upload Handling
	$uploadDir =  "../uploads/landingpagesservice/";  // Specify the directory where you want to store uploaded files
	$uploadedFile = $_FILES["image"]["name"];
	$tempFile = $_FILES["image"]["tmp_name"];
	$targetFile = $uploadDir . $uploadedFile;
	move_uploaded_file($tempFile, $targetFile);
	
	
	
	$alt = $_POST["alt"];
	$sql = "INSERT INTO landingpagesservice (page_id,caption, description,short_description,image,alt) VALUES ('$landingpage_id','$caption', '$description','$short_description','$uploadedFile','$alt')";
    
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
		$sql = "UPDATE landingpagesservice set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$landingpage_id=$_POST["landingpage_id"];
		$caption = mysqli_real_escape_string($db->conn,$_POST["caption"]);
		$description =  mysqli_real_escape_string($db->conn,$_POST["description"]);
		$short_description=mysqli_real_escape_string($db->conn,$_POST["short_description"]);
		if(isset($_FILES["image"]["name"]))
		{
			$uploadDir = "../uploads/landingpagesservice/"; 
			$uploadedFile = $_FILES["image"]["name"];
			$tempFile = $_FILES["image"]["tmp_name"];
			$targetFile = $uploadDir . $uploadedFile;
			move_uploaded_file($tempFile, $targetFile);
		}
		$alt = $_POST["alt"];
		
		
		if(@$uploadedFile != "")
		{
		  $sql = "UPDATE landingpagesservice set page_id='$landingpage_id',caption='$caption',description='$description',short_description='$short_description',image='$uploadedFile', alt='$alt' where id=$id";
		}
		else
		{
			$sql = "UPDATE landingpagesservice set page_id='$landingpage_id',caption='$caption',description='$description',short_description='$short_description', alt='$alt' where id=$id";
		}
		
		$db->query($sql);
		if($db->query($sql) === TRUE) 
		{
			$msg="Updated successfully.";
		}
		else
		{
		   $msg="Error: " . $sql;
		}
		echo $msg;
	}
}
?>