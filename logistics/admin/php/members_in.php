<?php
require_once '../includes/database.php';
$db = new Database();

if(@$_POST['add']=="add")
{
	$title = $_POST["title"];
	$description= $_POST["description"];
	$uploadDir =  "../uploads/members_in/";  // Specify the directory where you want to store uploaded files
	
	
	$uploadedFile1='';
	$uploadedFile1 = $_FILES["image1"]["name"];
	$tempFile1 = $_FILES["image1"]["tmp_name"];
	$targetFile1 = $uploadDir . $uploadedFile1;
	move_uploaded_file($tempFile1, $targetFile1);
	$image1_alt=$_POST['image1_alt'];
	
	
	$uploadedFile2='';
	$uploadedFile2 = $_FILES["image2"]["name"];
	$tempFile2 = $_FILES["image2"]["tmp_name"];
	$targetFile2 = $uploadDir . $uploadedFile2;
	move_uploaded_file($tempFile2, $targetFile2);
	$image2_alt=$_POST['image2_alt'];


	
	$sql = "INSERT INTO  members_in (title, description, image1,image1_alt,image2,image2_alt)  VALUES ('$title', '$description', '$uploadedFile1','$image1_alt', '$uploadedFile2','$image2_alt')";
    
    if($db->query($sql) === TRUE) 
	{
        echo "New Record Added Successfully.";
    }
	else
	{
       echo "Error: " . $sql . "<br>";
    }
}

if(@$_POST["update"] == 'update')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$title = $_POST["title"];
		$description= $_POST["description"];
		$uploadDir =  "../uploads/members_in/";  // Specify the directory where you want to store uploaded files
		
		
		$uploadedFile1='';
		$uploadedFile1 = $_FILES["image1"]["name"];
		$tempFile1 = $_FILES["image1"]["tmp_name"];
		$targetFile1 = $uploadDir . $uploadedFile1;
		move_uploaded_file($tempFile1, $targetFile1);
		$image1_alt=$_POST['image1_alt'];
	
	
		$uploadedFile2='';
		$uploadedFile2 = $_FILES["image2"]["name"];
		$tempFile2 = $_FILES["image2"]["tmp_name"];
		$targetFile2 = $uploadDir . $uploadedFile2;
		move_uploaded_file($tempFile2, $targetFile2);
		$image2_alt=$_POST['image2_alt'];
		
		
		$sql = "UPDATE members_in set title='$title',description='$description',image1_alt='$image1_alt',image2_alt='$image2_alt'";
		
		if(@$uploadedFile1 != "")
		{
			$sql = $sql . ",image1='$uploadedFile1'";
		}
		
		if(@$uploadedFile2 != "")
		{
			$sql = $sql . ",image2='$uploadedFile2'";
		}
		
		
		$sql = $sql . " where id=$id and status=0";
		
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

if(@$_POST["delete"] == 'delete')
{
	$id=$_POST["id"];
	if($id != "")
	{
		$sql = "UPDATE  members_in set status=2 where id=$id";
		$db->query($sql);
		echo "Deleted Successfully.";
	}
}
?>